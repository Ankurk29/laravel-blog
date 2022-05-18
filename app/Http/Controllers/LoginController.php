<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $this->validate(request(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if ( auth()->attempt($credentials) ) {
            return redirect('/');
        }

        return "Something wrong";
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }
}
