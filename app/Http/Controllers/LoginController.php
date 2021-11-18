<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create()
    {
        return view('login.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:16']
        ]);

        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified'
            ]);
        }
        session()->regenerate();

        return back()->with('success', 'Welcome Back!');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/')->with('success', 'GoodBye!');
    }
}
