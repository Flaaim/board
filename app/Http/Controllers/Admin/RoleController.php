<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Http\Services\RoleService;

class RoleController extends Controller
{
    protected $service;
    public function __construct(RoleService $service){
        $this->service = $service;
    }
    public function index(){
        $roles = Role::all();
        return view('admin.roles.index', ['roles'=> $roles]);
    }


    public function create(){
        return view('admin.roles.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'alias' => 'required',
        ]);
        $this->service->save($request, new Role);
        return redirect()->route('roles.index');
    }

    public function edit(Role $role){
        return view('admin.roles.edit', ['role' => $role]);
    }

    public function update(Request $request, Role $role){
        $request->validate([
            'title' => 'required',
            'alias' => 'required',
        ]);
        $this->service->save($request, $role);
        return redirect()->route('roles.index');
    }
}
