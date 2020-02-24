<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Permission;
use App\Models\Admin\PermissionRole;
use App\Models\Admin\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PermissionRoleRepository
{
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            $permissions = new Permission();
            if ($request->input('estado') == 1) {

                $permissions->find($request->input('permission_id'))->roles()->attach($request->input('role_id'));

                return 1;

            } else {

                $permissions->find($request->input('permission_id'))->roles()->detach($request->input('role_id'));

                return 0;

            }
        } 
    }

    public function get_roles()
    {
        return Role::orderBy('name','ASC')->pluck('name','id')->toArray();
    }

    public function get_permission_roles()
    {
        return Permission::with('roles')->get()->pluck('roles','id')->toArray();
        
    }

}