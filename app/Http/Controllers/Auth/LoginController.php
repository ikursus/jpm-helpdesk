<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Dalam PHP class, kita ada visibility function sama ada public, protected atau private

    public function loginForm()
    {
        return view('authentication.template-login');
    }

    public function loginAuthenticate(Request $request)
    {
        $credentials = $request->validate([
            'nokp' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
