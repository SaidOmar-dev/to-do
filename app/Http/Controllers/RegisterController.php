<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:25'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:16']
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        Auth::login(User::create($attributes));
        // ddd(auth()->user());
        return redirect('/')->with('success', 'New user is created');
    }
}
