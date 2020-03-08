<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = ['name'];
    
    public function scopeTypeUser($q)
    {
        $user = Auth::user();

        if (session('role_id') != '1') {

            $q->where('roles.id', '<>', '1');

            return $q;
        }

        return $q;
    }

}
