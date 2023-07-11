<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function loginForm()
    {
        return view('authentication.template-login');
    }

    function loginAuthenticate(Request $request)
    {
        return $request->all();
    }
}
