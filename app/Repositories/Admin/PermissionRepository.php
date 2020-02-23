<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Permission;

use Illuminate\Support\Facades\DB;

class PermissionRepository
{
    public function find_all()
    {
       return Permission::select('id','name','slug');
    }

    public function create(array $data)
    {
        return Permission::create($data);
    }

    public function edit(Permission $permission, array $data)
    {
        return $permission->update($data);
    }

    public function delete(Permission $permission)
    {
        $permission->delete();
    }
}