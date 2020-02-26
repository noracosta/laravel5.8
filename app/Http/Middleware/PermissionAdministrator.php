<?php

namespace App\Http\Middleware;

use Closure;

class PermissionAdministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->permission())
            
            return $next($request);
        
        $request->session()->invalidate();

        return redirect('authentication/login')->withErrors(['error' => 'No tiene permiso para ingresar.']);

    }

    private function permission()
    {
        /* 
        
        Para que sólo los usuarios con role_id == 1 o a 2 puedan ingresar al backend
        
        return session()->get('role_id') == '1' || '2';

        */
        
        return true;

    }
}
