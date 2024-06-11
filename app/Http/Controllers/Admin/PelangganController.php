<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $data['list_pelanggan'] = Pelanggan::all();
        return view('admin.pelanggan.index', $data);
    }
    public function create()
    {
        return view('admin.pelanggan.create');
    }
}
