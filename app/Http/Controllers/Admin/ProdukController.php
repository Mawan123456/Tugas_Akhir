<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $data['list_produk'] = Produk::all();
        return view('admin.produk.index', $data);
    }
    public function create()
    {
        return view('admin.produk.create');
    }
    public function show()
    {
        return view('admin.produk.show');
    }

    
}
