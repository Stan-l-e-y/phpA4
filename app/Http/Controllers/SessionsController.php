<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function view()
    {
        if (auth()->guest()) {
            return view('login');
        }

        return redirect('/navigation');
    }


    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Logged out');
    }

    public function create()
    {
        return view('login');
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' => 'required|string|exists:users,username',
            'password' => 'required'
        ]);

        if (auth()->attempt($attributes)) {
            return redirect('/navigation')->with('success', 'Welcome Back!');
        }

        throw ValidationException::withMessages([
            'username' => 'Your credentials could not be verified'
        ]);
    }
}
