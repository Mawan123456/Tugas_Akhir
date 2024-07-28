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
        $penjualan = Penjualan::findOrfail($id);
        $produk = Produk::all();
        return view('admin.penjualan.edit', compact('penjualan', 'produk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_produk' => 'required',
            'platform' => 'required',
            'stok_terjual' => 'required|numeric|min:1',
            'total_harga' => 'required|numeric',
        ]);

        $produk = Produk::find($request->id_produk);
        if ($produk->stok_produk < $request->stok_terjual) {
            return back()->withErrors(['stok_terjual' => 'Stok tidak mencukupi'])->withInput();
        }

        $produk->stok_produk -= $request->stok_terjual;
        $produk->save();

        $penjualan = new Penjualan();
        $penjualan->id_produk = request('id_produk');
        $penjualan->platform = request('platform');
        $penjualan->stok_terjual = request('stok_terjual');
        $penjualan->total_harga = request('total_harga');

        $penjualan->save();

        return redirect('admin/penjualan')->with('success', 'Data Berhasil Ditambah');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_produk' => 'required',
            'platform' => 'required',
            'stok_terjual' => 'required|numeric|min:1',
            'total_harga' => 'required|numeric',
        ]);

        $penjualan = Penjualan::find($id);
        $produk = Produk::find($penjualan->id_produk);

        // Mengembalikan stok lama ke produk sebelum update
        $produk->stok_produk += $penjualan->stok_terjual;
        $produk->save();

        // Mendapatkan produk baru
        $produkBaru = Produk::find($request->id_produk);

        // Cek stok produk baru
        if ($produkBaru->stok_produk < $request->stok_terjual) {
            return back()->withErrors(['stok_terjual' => 'Stok tidak mencukupi'])->withInput();
        }

        // Mengurangi stok produk baru
        $produkBaru->stok_produk -= $request->stok_terjual;
        $produkBaru->save();

        // Mengupdate data penjualan
        if (request('id_produk')) $penjualan->id_produk = request('id_produk');
        if (request('platform')) $penjualan->platform = request('platform');
        if (request('stok_terjual')) $penjualan->stok_terjual = request('stok_terjual');
        if (request('total_harga')) $penjualan->total_harga = request('total_harga');

        $penjualan->save();

        return redirect('admin/penjualan')->with('success', 'Data Berhasil Diperbarui');
    }


    function destroy($penjualan)
    {
        $penjualan = penjualan::find($penjualan);
        $penjualan->delete();

        return back()->with('danger', 'Data Berhasil Dihapus');
    }
}
