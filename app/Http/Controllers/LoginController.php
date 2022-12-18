<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Session};

class LoginController extends Controller
{
    public function loginForm()
    {
        if (Auth::check()) {
            return redirect('/');
        } else {
            return view('auth.login');
        }
    }

    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        Session::flash('error', 'Username atau Password Salah');
        return redirect(route('login'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
