<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Role;

use Illuminate\Support\Facades\DB;

class RoleRepository
{
    public function find_all()
    {
       return Role::select('id','name');
    }

    public function create(array $data)
    {
        return Role::create($data);
    }

    public function edit(Role $role, array $data)
    {
        return $role->update($data);
    }

    public function delete(Role $role)
    {
        return $role->delete();
    }
}