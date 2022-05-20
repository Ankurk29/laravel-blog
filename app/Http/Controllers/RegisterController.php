<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct() {
        $this->middleware('guest')->only(['create', 'store']);
        $this->middleware('auth')->only('update_form');
    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        auth()->login($user);

        return redirect('/');
    }

    public function edit()
    {
        $user = auth()->user();
        return view('auth.edit')->with(compact('user'));
    }

    public function update(Request $request)
    {
        $current_user = auth()->id();

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            // 'new_password' => 'required|min:8|max:16'
        ]);

        $user = User::find($current_user);

        if ( $request->has('name') && $request->name !== null && ! empty($request->name)) {
            $user->name = $request->name;
        }

        if ( ($request->has('new_password') && $request->new_password !== null && ! empty($request->new_password)) && Hash::check( $request->password, $user->password ) ) {
            $user->password = bcrypt($request->new_password);
        }
        // TODO: check here the error
        // else {
        //     return back()->withErrors(
        //         ['message' => 'Please enter the correct password.']
        //     );
        // }

        $user->save();

        return redirect()->route('update.form');

    }
}
