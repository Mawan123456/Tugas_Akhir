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
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            if ($user->type == 'ADMIN') return redirect('admin/dashboard')->with('success', 'Berhasil Login Sebagai Admin');
            if ($user->type == 'USER') return redirect('beranda')->with('success', 'Berhasil Login');
        } else {
            return back()->with('error', 'Login Gagal, Silahkan cek email dan password anda');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
