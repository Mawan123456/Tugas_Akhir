<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\Logo;
use App\Models\Sosmed;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    function loginProcess()
    {
        $credential = [
            'email' => request('email'),
            'password' => request('password')
        ];

        if (auth()->attempt($credential)) {
            return redirect('admin/dashboard')->with('success', 'Login Berhasil');
        } else {
            return back()->with('danger', 'Login Gagal, Silahkan Cek Email dan Password');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
