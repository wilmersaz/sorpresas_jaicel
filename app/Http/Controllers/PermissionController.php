<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use Illuminate\Http\Request;
use App\Models\Permission;
use Flash;
use Response;

class PermissionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('ability:admin,mostrar_permiso', ['only' => ['index']]);
        $this->middleware('ability:admin,crear_permiso', ['only' => ['store']]);
        $this->middleware('ability:admin,actualizar_permiso', ['only' => ['edit','update']]);
        $this->middleware('ability:admin,eliminar_permiso', ['only' => ['destroy']]);
    }

    public function index(){
        $permissions = Permission::all();
        return view('permissions.index',compact('permissions'));
    }

    public function permissionsIndex(Request $request){
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
        $columns = array(
            0 => 'display_name',
            1 => 'description',
            2 => 'action'
        );

        $totalData = Permission::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        
        if(empty($request->input('search.value'))){
            $posts = Permission::with(['roles'])
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
            $totalFiltered = Permission::count();
        }else{
            $search = $request->input('search.value');
            $posts = Permission::with(['roles'])->
            where('display_name', 'like', "%{$search}%")
            ->orWhere('description','like',"%{$search}%")
            ->orWhere('created_at','like',"%{$search}%")
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();                                
            $totalFiltered = Permission::where('display_name', 'like', "%{$search}%")
            ->orWhere('description','like',"%{$search}%")
            ->count();
        }       

        $data = array();
        
        if($posts){
            foreach($posts as $r){
                $nestedData['display_name'] = $r->display_name;
                $nestedData['description'] = $r->description;
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
     * Store a newly created Permission in storage.
     *
     * @param CreatePermissionRequest $request
     *
     * @return Response
     */
    public function store(CreatePermissionRequest $request){
        $permission = new Permission;
        $permission->display_name = $request->display_name;
        $name = preg_replace('/\s+/', '_', $permission->display_name);
        $name = strtolower($name);
        $permisos = Permission::where('name', $name)->first();
        if(!empty($permisos)){
            return 0;
        }else{
            $permission->name = $name;
            $permission->description = $request->description;
            $permission->save();
            return response()->json(['success' => $permission]);
        }
    }


    /**
     * Update the specified Permission in storage.
     *
     * @param  int              $id
     * @param UpdatePermissionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePermissionRequest $request){
        $permission = Permission::find($id);
        $permission->display_name = $request->display_name_act;
        $name = preg_replace('/\s+/', '_', $permission->display_name);
        $name = strtolower($name);
        $permission->name = $name;
        $permission->description = $request->description_act;
        $permission->save();
        return response()->json(['success' => $permission]);
    }
}
