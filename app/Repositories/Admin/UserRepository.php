<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Role;
use App\User;

use Illuminate\Support\Facades\DB;

class UserRepository
{
    public function find_all()
    {
       return User::select('users.id','users.name','users.email','roles.name AS role')
                    ->leftJoin('users_roles','users_roles.user_id','=','users.id')
                    ->leftJoin('roles','roles.id','=','users_roles.role_id');
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
        return Role::orderBy('name','ASC')->pluck('name','id');
    }

    public function get_user_roles(User $user)
    {
        
        return User::with('roles')->findOrFail($user->id);

    }

}