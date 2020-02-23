<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Roles\CreateRoleRequest;
use App\Http\Requests\Admin\Roles\EditRoleRequest;
use App\Models\Admin\Role;
use App\Repositories\Admin\RoleRepository;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    
    private $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        return view('admin.roles.index');

    }

    public function index_data()
    {
        
        $roles = $this->roleRepository->find_all();
        return Datatables::of($roles)
            ->addColumn('action', function ($role) {
                return view('admin.roles.partials.actions-datatables', compact('role'))
                    ->render();
            })
            ->make(true);
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(CreateRoleRequest $request)
    {
        $data = $request->validated();

        if (! $this->roleRepository->create($data)) {

            flash('No se pudo crear el registro de rol.')->error();

            return back();
        }

        flash('Registro de rol creado.')->success()->important();

        return redirect()->route('roles.index');
    }

    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    public function update(Role $role, EditRoleRequest $request)
    {
        $data = $request->validated();

        if (! $this->roleRepository->edit($role, $data)) {

            flash('No se pudo editar el registro de rol.')->error();

            return back();
        }

        flash('Registro de rol actualizado.')->success()->important();

        return redirect()->back();
    }

    public function delete(Role $role)
    {
        return view('admin.roles.delete', compact('role'));
    }
    
    public function destroy(Role $role)
    {
        $this->roleRepository->delete($role);

        flash('Registro de rol eliminado.')->success()->important();

        return redirect()->route('roles.index');
    }
}
