<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{

    public function index()
    {
        $data['list_penjualan'] = Penjualan::all();
        return view('admin.penjualan.index', $data);
    }
    public function create()
    {
        return view('admin.penjualan.create');
    }
}
