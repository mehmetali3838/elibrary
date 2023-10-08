<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginUser(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email', $email)->first();
        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user);
            return redirect('/');
        } else {
            dd('Login error');
        }
    }

    public function register()
    {
        return view('register');
    }

    public function registerUser(Request $request)
    {
        $user = [
            'name_surname' => $request->input('name_surname'),
            'age' => $request->input('age'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ];

        $register = User::create($user);

        if ($register) {
            Auth::login($register);
            return redirect('/');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
