<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Menu;
use App\Models\Admin\MenuRole;
use App\Models\Admin\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MenuRoleRepository
{
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            $menus = new Menu();
            if ($request->input('estado') == 1) {

                $menus->find($request->input('menu_id'))->roles()->attach($request->input('role_id'));

                return 1;

            } else {

                $menus->find($request->input('menu_id'))->roles()->detach($request->input('role_id'));

                return 0;

            }
        } 
    }

    public function get_roles()
    {
        return Role::orderBy('name','ASC')->pluck('name','id')->toArray();
    }

    public function get_menu_roles()
    {
        return Menu::with('roles')->get()->pluck('roles','id')->toArray();
    }

}