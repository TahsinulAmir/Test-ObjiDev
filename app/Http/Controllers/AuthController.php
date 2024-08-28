<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    function prosesLogin(Request $request)
    {
        if (Auth::guard('user')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return response()->json(['success' => 'Success']);
        }
        return response()->json(['error' => 'Failed'], 401);
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
