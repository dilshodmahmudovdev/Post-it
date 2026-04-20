<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register (RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('login');
    }

    public function login (LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)){
            return redirect()->intended();
        }

        return back()->withErrors([
            'email' => 'Email yoki parol noto`g`ri.'
        ]);
    }

    public function logout ()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}
