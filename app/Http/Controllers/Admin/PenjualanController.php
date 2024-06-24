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
    public function show()
    {
        return view('admin.penjualan.show');
    }
    public function edit()
    {
        return view('admin.penjualan.edit');
    }

    public function store()
    {
        $penjualan = new Penjualan();
        $penjualan->nama_produk = request('nama_produk');
        $penjualan->berat_produk = request('berat');
        $penjualan->varian_rasa = request('varian_rasa');
        $penjualan->stok_terjual = request('stok_terjual');
        $penjualan->platform = request('platform');
        $penjualan->total_harga = request('total_harga');
        $penjualan->deskripsi = request('deskripsi');
        $penjualan->save();
        return redirect('admin/penjualan')->with('success', 'Data Berhasil Ditambah');
    }
}
