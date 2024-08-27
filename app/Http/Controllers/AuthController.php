<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function prosesLogin(Request $request)
    {
        if (Auth::guard('user')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]))

            return response()->json(['success' => 'Success']);
    }

    function prosesLogout()
    {
        if (Auth::guard('user')->check()) {
            (Auth::guard('user')->logout());
            return redirect('/');
        }
        return response()->json(['success' => 'Success']);
    }
}
