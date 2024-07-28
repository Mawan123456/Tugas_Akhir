<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Galeri;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

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
    public function show($id)
    {
        return view('admin.produk.show', [
            'produk' => Produk::findOrFail($id)
        ]);
    }

    public function edit($id)
    {
        return view('admin.produk.edit', [
            'produk' => Produk::findOrFail($id)
        ]);
    }

    public function store(Request $request)
    {
        $produk = new Produk();
        $produk->nama_produk = request('nama_produk');
        $produk->berat_produk = request('berat_produk');
        $produk->varian_rasa = request('varian_rasa');
        $produk->harga_produk = request('harga_produk');
        $produk->stok_produk = request('stok_produk');
        $produk->deskripsi = request('deskripsi');
        $produk->handleUploadFoto();

        $produk->save();

        return redirect('admin/produk/')->with('success', 'Produk berhasil ditambahkan !');
    }

    public function update($id)
    {
        $produk = Produk::find($id);
        if (request('nama_produk')) $produk->nama_produk = request('nama_produk');
        if (request('berat_produk')) $produk->berat_produk = request('berat_produk');
        if (request('varian_rasa')) $produk->varian_rasa = request('varian_rasa');
        if (request('harga_produk')) $produk->harga_produk = request('harga_produk');
        if (request('stok_produk')) $produk->stok_produk = request('stok_produk');
        if (request('deskripsi')) $produk->deskripsi = request('deskripsi');
        if (request('gambar_produk')) $produk->handleUploadFoto();
        $produk->save();

        return redirect('admin/produk')->with('success', 'Produk Berhasil di Edit');
    }

    function destroy($produk)
    {
        $produk = Produk::find($produk);
        $produk->handleDeleteFoto();
        $produk->delete();

        return back()->with('danger', 'Data Berhasil Dihapus');
    }
}
