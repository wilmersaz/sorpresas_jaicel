<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Models\PermissionRole;
use Flash;
use Response;

class RoleController extends Controller{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('ability:admin,consultar_rol', ['only' => ['index']]);
        $this->middleware('ability:admin,crear_rol', ['only' => ['store','index']]);
        $this->middleware('ability:admin,actualizar_rol', ['only' => ['update']]);
        $this->middleware('ability:admin,eliminar_rol', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the Role.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request){
        $roles = Role::all();
        $permissions = Permission::pluck('display_name','id');
        return view('roles.index',compact('roles','permissions'));
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param CreateRoleRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleRequest $request){
        $rol = new Role;
        $rol->display_name = $request->display_name;
        $name = preg_replace('/\s+/', '_', $request->display_name);
        $name = strtolower($name);
        $rol->name = $name;
        $rol->description = $request->description;
        $save = $rol->save();
        if($save){
            $permission = $request->input('permisos');
            $permisos = implode(',', $permission);
            $permissions = explode(",",$permisos);
            foreach ($permissions as $key => $permiso) {
                $rol_per = new PermissionRole;
                $rol_per->role_id = $rol->id;
                $rol_per->permission_id = $permiso;
                $rol_per->save();
            }
        }
        return response()->json(['success' => $rol]);
    }


    /**
     * Update the specified Role in storage.
     *
     * @param  int              $id
     * @param UpdateRoleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleRequest $request){
        $rol = Role::find($id);
        if(!empty($rol)){
            $rol->display_name = $request->display_name_act;
            $rol->description = $request->description_act;
            $save = $rol->save();
            if($save){
                $permission = $request->input('permisos_act');
                $permisos = implode(',', $permission);
                $permissions = explode(",",$permisos);
                $permisosAct = PermissionRole::where('role_id', $rol->id)->delete();
                foreach ($permissions as $key => $permiso) {
                    $rol_per = new PermissionRole;
                    $rol_per->role_id = $rol->id;
                    $rol_per->permission_id = $permiso;
                    $rol_per->save();
                }
            }
        return response()->json(['success' => $rol]);
        }else{
            return 0;
        }
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id){
        $rol = Role::find($id);
        if(!empty($rol)){
            $permisosAct = PermissionRole::where('role_id', $rol->id)->delete();
            $rol->delete();
            return 1;
        }else{
            return 0;
        }
    }
}
