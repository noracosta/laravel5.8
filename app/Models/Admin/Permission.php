<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $fillable = ['name','slug'];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'permissions_roles', 'permission_id', 'role_id');
    }
    
}
