<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $data['user'] = Auth::user(); // atau auth()->user()
        return view('admin.profile.index', $data);
    }


    public function edit($id)
    {
        return view('admin.profile.edit', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function update($id)
    {
        $user = User::find($id);
        if (request('nama')) $user->nama = request('nama');
        if (request('username')) $user->username = request('username');
        if (request('no_hp')) $user->no_hp = request('no_hp');
        if (request('email')) $user->email = request('email');
        if (request('password')) $user->password = request('password');

        $user->save();

        return redirect('admin/profile')->with('success', 'Data berhasil ditambahkan!');
    }
}
