<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use App\Models\Admin\Permission;
use App\Repositories\Admin\PermissionRoleRepository;

class PermissionRoleController extends Controller
{
   
    private $permissionRoleRepository;

    public function __construct(PermissionRoleRepository $permissionRoleRepository)
    {
        $this->permissionRoleRepository = $permissionRoleRepository;
    }

    public function index()
    {
        $roles = $this->permissionRoleRepository->get_roles();

        $permissions = Permission::get();

        $permissions_roles = $this->permissionRoleRepository->get_permission_roles();

        return view('admin.permissions_roles.index',compact('roles','permissions','permissions_roles'));

    }

    public function store(Request $request)
    {
        if ($this->permissionRoleRepository->edit($request) == '1') {

            return 'Registro de permiso rol asignado.';
        } else {
            return 'Registro de permiso rol desasignado.';
        }    
    }
}
