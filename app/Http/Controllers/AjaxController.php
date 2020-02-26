<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function setSession(Request $request)
    {
        if ($request->ajax()) {
            $request->session()->put(
                [
                    'role_id' => $request->input('role_id'),
                    'role_name' => $request->input('role_name')
                ]
            );
            return response()->json(['mensaje' => 'ok']);
        } else {
            abort(404);
        }
    }
}