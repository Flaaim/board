<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.perms.index', ['roles' => $roles, 'permissions' => $permissions]);
    }

    public function store(Request $request){
        $data = $request->except('_token');
        $roles = Role::all();
        foreach($roles as $role){
            if(isset($data[$role->id])){
                $role->savePermissions($data[$role->id]);
            } else {
                $role->savePermissions([]);
            }
        }
        return redirect()->route('permissions.index');
    }


}
