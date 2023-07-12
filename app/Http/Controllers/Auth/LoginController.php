<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Dalam PHP class, kita ada visibility function sama ada public, protected atau private

    public function loginForm()
    {
        return view('authentication.template-login');
    }

    public function loginAuthenticate(Request $request)
    {
        return $request->all();
    }
}
