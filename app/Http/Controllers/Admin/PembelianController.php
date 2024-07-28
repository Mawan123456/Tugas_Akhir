<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembelian;
use App\Models\PembelianDetail;
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
        $data['pembelian'] = pembelian::all();
        return view('admin.pembelian.create');
    }
    public function edit($id)
    {
        $pembelian = Pembelian::findOrfail($id);
        return view('admin.pembelian.edit', compact('pembelian'));
    }
    public function show($id)
    {
        $pembelian_detail = PembelianDetail::all();
        $pembelian = pembelian::findOrfail($id);
        return view('admin.pembelian.show', compact('pembelian_detail', 'pembelian'));
    }

    public function store(Request $request)
    {
        $pembelian = new pembelian();
        $pembelian->deskripsi = request('deskripsi');
        $pembelian->tanggal_pembelian = request('tanggal_pembelian');
        $pembelian->judul = request('judul');
        $pembelian->save();
        return redirect('admin/pembelian')->with('success', 'Data Berhasil Ditambah');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        // $validatedData = $request->validate([
        //     'nama_bahan' => 'required|string|max:255',
        //     'jumlah' => 'required|integer',
        //     'harga_satuan' => 'required|numeric',
        //     'total_harga' => 'required|numeric',
        //     'tanggal_pembelian' => 'required|date',
        //     'judul' => 'required|string|max:255',
        //     'deskripsi' => 'nullable|string',
        // ]);

        // Cari pembelian berdasarkan ID
        $pembelian = Pembelian::findOrFail($id);

        // Update data pembelian
        $pembelian->tanggal_pembelian = $request->input('tanggal_pembelian');
        $pembelian->judul = $request->input('judul');
        $pembelian->deskripsi = $request->input('deskripsi');

        // Simpan perubahan
        $pembelian->save();

        // Redirect dengan pesan sukses
        return redirect('admin/pembelian')->with('success', 'Pembelian berhasil diupdate.');
    }
    function destroy($pembelian)
    {
        $pembelian = pembelian::find($pembelian);
        $pembelian->delete();

        return back()->with('danger', 'Data Berhasil Dihapus');
    }
}
