<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Permissions\CreatePermissionRequest;
use App\Http\Requests\Admin\Permissions\EditPermissionRequest;
use App\Models\Admin\Permission;
use App\Repositories\Admin\PermissionRepository;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    
    private $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function index()
    {
        can('ver-permiso');

        return view('admin.permissions.index');
    }

    public function index_data()
    {
        
        $permissions = $this->permissionRepository->find_all();
        return Datatables::of($permissions)
            ->addColumn('action', function ($permission) {
                return view('admin.permissions.partials.actions-datatables', compact('permission'))
                    ->render();
            })
            ->make(true);
    }

    public function create()
    {
        can('agregar-permiso');

        return view('admin.permissions.create');
    }

    public function store(CreatePermissionRequest $request)
    {
        can('agregar-permiso');

        $data = $request->validated();

        if (! $this->permissionRepository->create($data)) {

            flash('No se pudo crear el registro de permiso.')->error();

            return back();
        }

        flash('Registro de permiso creado.')->success()->important();

        return redirect()->route('permissions.index');
    }

    public function show(Permission $permission)
    {
        can('ver-permiso');

        return view('admin.permissions.show', compact('permission'));
    }

    public function edit(Permission $permission)
    {
        can('editar-permiso');

        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(Permission $permission, EditPermissionRequest $request)
    {
        can('editar-permiso');

        $data = $request->validated();

        if (! $this->permissionRepository->edit($permission, $data)) {

            flash('No se pudo editar el registro de permiso.')->error();

            return back();
        }

        flash('Registro de permiso actualizado.')->success()->important();

        return redirect()->back();
    }

    public function delete(Permission $permission)
    {
        can('eliminar-permiso');

        return view('admin.permissions.delete', compact('permission'));
    }
    
    public function destroy(Permission $permission)
    {
        can('eliminar-permiso');
        
        $this->permissionRepository->delete($permission);

        flash('Registro de permiso eliminado.')->success()->important();

        return redirect()->route('permissions.index');
    }
}
