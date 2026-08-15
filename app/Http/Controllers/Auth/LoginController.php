<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('admin.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1,
            'is_deleted' => 0,
        ];


     if (Auth::attempt($credentials, $request->boolean('remember'))) {

            $request->session()->regenerate();

            $user = Auth::user();

            if ($user) {
                $user->last_login = now();
                $user->save();
            }

            return redirect()->route('admin.dashboard');
        }

        return back()
            ->withErrors([
                'email' => 'Email or password is incorrect or your account is inactive.',
            ])
            ->onlyInput('email');
    }



    public function logout(Request $request)
    {
        Auth::logout();


        $request->session()->invalidate();


        $request->session()->regenerateToken();


        return redirect()->route('admin.login');
    }

}