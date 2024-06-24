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
    public function show()
    {
        return view('admin.produk.show');
    }
    public function edit()
    {
        return view('admin.produk.edit');
    }

    public function store()
    {
        $produk = new Produk();
        $produk->nama_produk = request('nama_produk');
        $produk->berat_produk = request('berat_produk');
        $produk->varian_rasa = request('varian_rasa');
        $produk->harga_produk = request('harga_produk');
        $produk->stok_produk = request('stok_produk');
        $produk->gambar_produk = request('gambar_produk');
        $produk->deskripsi = request('deskripsi');
        $produk->handleUploadFoto();
        $produk->save();
        return redirect('admin/produk')->with('success', 'Data Berhasil Ditambah');
    }
}
