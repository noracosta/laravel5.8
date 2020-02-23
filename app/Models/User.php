<?php

namespace App;

use App\Models\Admin\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Session;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    public function setSession($roles)
    {
        Session::put([
            'user_id' => $this->id,
            'user_name' => $this->name,
            'user_email' => $this->email
        ]);
        if (count($roles) == 1) {
            Session::put(
                [
                    'role_id' => $roles[0]['id'],
                    'role_name' => $roles[0]['name'],
                ]
            );
        } else {
            Session::put('roles', $roles);
        }
    }

}
