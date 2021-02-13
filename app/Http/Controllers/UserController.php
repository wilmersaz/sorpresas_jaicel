<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Exports\UsuarioExport;
use Illuminate\Http\Request;
use App\Models\RoleUser;
use App\Models\Empresa;
use App\Models\User;
use App\Models\Role;
use Carbon\Carbon;
use Flash;
use Response;

class UserController extends AppBaseController{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('ability:admin,consultar_user', ['only' => ['index']]);
        $this->middleware('ability:admin,crear_usuario', ['only' => ['store','index']]);
        $this->middleware('ability:admin,actualizar_user', ['only' => ['edit','update']]);
        $this->middleware('ability:admin,eliminar_user', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     * @return Response
     */
    public function index(){
        $usuarios = User::all();
        $roles = Role::orderBy('display_name')->pluck('display_name','id');
        $empresas = ['' => ''] + Empresa::orderBy('nombre')->pluck('nombre','id')->toArray();
        return view('users.index',compact('usuarios','roles', 'empresas'));
    }

    public function usersIndex(Request $request){
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
        $columns = array(
            0 => 'name',
            1 => 'username',
            2 => 'email',
            3 => 'empresa_id',
            5 => 'action'
        );

        $totalData = User::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))){
            $posts = User::with(['roles_id.nombreRol', 'empresas'])
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
            $totalFiltered = User::count();
        }else{
            $search = $request->input('search.value');
            $posts = User::with(['roles_id.nombreRol', 'empresas'])
            ->where('id', 'like', "%{$search}%")
            ->orWhere('name','like',"%{$search}%")
            ->orWhere('username','like',"%{$search}%")
            ->orWhere('email','like',"%{$search}%")
            ->orWhere('empresa_id','like',"%{$search}%")
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();                                
            $totalFiltered = User::where('id', 'like', "%{$search}%")
            ->orWhere('name','like',"%{$search}%")
            ->count();
        }       

        $data = array();
        if($posts){
            foreach($posts as $r){
                $rolesArray = [];
                $nestedData['id'] = $r->id;
                $nestedData['name'] = $r->name;
                $nestedData['username'] = $r->username;
                $nestedData['email'] = $r->email;
                $nestedData['empresa_id'] = $r->empresas->nombre;
                $nestedData['action'] = $r;
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );
        return json_encode($json_data);  
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */

    public function store(CreateUserRequest $request){
        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->empresa_id = $request->empresa;       
        $user->password = bcrypt($user->username);
        $user->email = $request->email;
        $user->cargo = $request->cargo;
        $user->estado = 1;
        if($user->save()){
            foreach ($request->rol as $key => $rol) {
                $rolUs = new RoleUser();
                $rolUs->user_id = $user->id;
                $rolUs->role_id = $rol;
                $rolUs->save();
            }
            return response()->json(['success' => $user]);
        }else{
            return 0;
        }
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request){
        $user = User::find($id);
        $user->name = $request->name_act;
        $user->username = $request->username_act;
        $user->empresa_id = $request->empresa_act;
        $user->email = $request->email_act;
        $user->cargo = $request->cargo_act;
        if(isset($request->rol_act)){
            if($user->save()){
                $rolAct = RoleUser::where('user_id', $user->id)->delete();
                foreach ($request->rol_act as $key => $rol) {
                    $rolUs = new RoleUser();
                    $rolUs->user_id = $user->id;
                    $rolUs->role_id = $rol;
                    $rolUs->save();
                }
                return response()->json(['success' => $user]);
            }else{
                return 0;
            }
        }else{
            $user->save();
            return response()->json(['success' => $user]);
        }
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show(Request $data){
        $user = User::where('username', $data->username)->first();
        if(!empty($user)){
            $mensaje = 'El nombre ya ha sido registrado';
            $codigo = 419;
        }else{
            $mensaje = 'Nombre sin registrar';
            $codigo = 200;
        }
        return response($mensaje, $codigo);
    }
    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy(Request $request){
        $id = $request->id;
        $user = User::find($id);
        if($user->estado==1){
            $user->estado = 0;
        }else{
            $user->estado = 1;
        }
        $user->save();
        return [
            'status' => true
        ];

    }
    public function reporteUsuarios(Request $request){
        $fechaActual = Carbon::now()->toDateTimeString();
        return Excel::download(new UsuarioExport($request), 'reporteUsuarios_'.$fechaActual.'.xlsx');
    }

    public function edit($id){
        $user = User::where('id', $id)->first();
        $empresas = Empresa::pluck('nombre','id');
        return view('users.edit', compact('user','empresas'));
    }

    public function actualizar(Request $request){
        $user = User::where('id', $request->id_perfil)->first();
        $user->name = $request->name_act;
        $user->email = $request->email_act;
        $user->empresa_id = $request->empresa_act;
        $user->cargo = $request->cargo_act;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json(['success' => $user]);
    }

}
