<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function actionRegister(Request $request)
    {
        if ($request->password == $request->confirm_password) {
            User::create([
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            session()->flash('success', 'Berhasil Membuat Akun!');
            return redirect('/register');
        } else {
            session()->flash('error', 'Konfirmasi Password Anda!');
            return redirect('/register');
        }
    }

    public function loginView()
    {
        if (Auth::check()) {
            return redirect('/');
        } else {
            return view('login');
        }
    }

    public function actionLogin(Request $request)
    {
        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::Attempt($data)) {
            return redirect('/');
        } else {
            session()->flash('error', 'Username atau Password Salah');

            return redirect('/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flash('success', 'Berhasil Logout');
        return redirect('/login');
    }
}
