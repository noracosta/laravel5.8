<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Role;
use App\User;

use Illuminate\Support\Facades\DB;

class UserRepository
{
    public function find_all()
    {
        return User::typeUser()->with('roles:roles.name')->get();
    }

    public function create(array $data)
    {
         $user = User::create($data);
         
         $user->roles()->attach($data['role_id']);

         return $user;
    }

    public function edit(User $user, array $data)
    {
        
        $user->roles()->sync($data['role_id']);

        return $user->update($data);

    }

    public function edit_password(User $user, array $data)
    {
        
        return $user->update($data);

    }

    public function delete(User $user)
    {
        
        $user->roles()->detach();
        
        return $user->delete();
        
    }

    public function get_roles()
    {
        return Role::typeUser()->orderBy('name','ASC')->pluck('name','id');
    }

    public function get_user_roles(User $user)
    {
        
        return User::with('roles')->findOrFail($user->id);

    }

}