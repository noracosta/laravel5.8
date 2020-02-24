<?php

use App\Models\Admin\Permission;
use Illuminate\Database\Eloquent\Builder;

if (!function_exists('getMenuActivo')) {
    function getMenuActivo($ruta)
    {
        if (request()->is($ruta) || request()->is($ruta . '/*')) {
            return 'active';
        } else {
            return '';
        }
    }
}

if (!function_exists('getMenuAbierto')) {
    function getMenuAbierto($ruta)
    {
        if (request()->is($ruta) || request()->is($ruta . '/*')) {
            return 'menu-open';
        } else {
            return '';
        }
    }
}

if (!function_exists('canUser')) {
    function can($permission, $redirect = true)
    {
        /*if (session()->get('role_id') == '1') {
            return true;
        } else {*/
            $role_id = session()->get('role_id');
            $permissions = Permission::whereHas('roles', function ($query) {
                    $query->where('role_id', session()->get('role_id'));
                })->get()->pluck('slug')->toArray();               
            
            if (!in_array($permission, $permissions)) {
                if ($redirect) {
                    if (!request()->ajax())                
                        return redirect('admin')->withErrors(['error' => 'No tiene permiso para ingresar.'])->send();
                    abort(403, 'No tiene permiso');
                } else {
                    return false;
                }
            }
            return true;
        //}
    }
}