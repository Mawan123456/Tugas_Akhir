<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index()
    {
        $data['list_pembelian'] = Pembelian::all();
        return view('admin.pembelian.index', $data);
    }
    public function create()
    {
        return view('admin.pembelian.create');
    }
    public function store()
    {
        $pembelian = new pembelian();
        $pembelian->nama_bahan = request('nama_bahan');
        $pembelian->jumlah = request('jumlah');
        $pembelian->harga_satuan = request('harga_satuan');
        $pembelian->total_harga = request('total_harga');
        $pembelian->deskripsi = request('deskripsi');
        $pembelian->save();
        return redirect('admin/pembelian')->with('success', 'Data Berhasil Ditambah');
    }
}
