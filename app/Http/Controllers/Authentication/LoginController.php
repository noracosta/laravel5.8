<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index() {
        
        return view('admin.authentication.index');
    }

    protected function authenticated(Request $request, $user)
    {
        $roles = $user->roles()->where('state','1')->get();

        if ($roles->isNotEmpty()) {

            $user->setSession($roles->toArray());

        } else {
            $this->guard()->logout();

            $request->session()->invalidate();
            
            return redirect('authentication/login')->withErrors(['error' => 'Este usuario no tiene un rol activo']);
        }
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/admin');
    }


}
