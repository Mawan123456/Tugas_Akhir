<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use App\Models\Produk;
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
        $data['produk'] = Produk::all();
        return view('admin.penjualan.create', $data);
    }
    public function show($id)
    {
        return view('admin.penjualan.show', [
            'penjualan' => Penjualan::findOrfail($id)
        ]);
    }
    public function edit($id)
    {
        return view('admin.penjualan.edit', [
            'penjualan' => Penjualan::findOrfail($id)
        ]);
    }

    public function store(Request $request)
    {
        $penjualan = new Penjualan();
        $penjualan->id_produk = request('id_produk');
        $penjualan->id_pelanggan = request('id_pelanggan');
        $penjualan->platform = request('platform');
        $penjualan->stok_terjual = request('stok_terjual');
        $penjualan->deskripsi = request('deskripsi');
        $penjualan->total_harga = request('total_harga');

        $penjualan->save();

        return redirect('admin/penjualan')->with('success', 'Data Berhasil Ditambah');
    }

    public function update($id)
    {
        $penjualan = Penjualan::find($id);
        if (request('id_produk')) $penjualan->id_produk = request('id_produk');
        if (request('id_pelanggan')) $penjualan->id_pelanggan = request('id_pelanggan');
        if (request('platform')) $penjualan->platform = request('platform');
        if (request('stok_terjual')) $penjualan->stok_terjual = request('stok_terjual');
        if (request('deskripsi')) $penjualan->deskripsi = request('deskripsi');
        if (request('total_harga')) $penjualan->total_harga = request('total_harga');
        $penjualan->save();

        return redirect('admin/penjualan')->with('success', 'Data Berhasil di Edit');
    }

    function destroy($penjualan)
    {
        $penjualan = penjualan::find($penjualan);
        $penjualan->delete();

        return back()->with('denger', 'Data Berhasil Dihapus');
    }
}
