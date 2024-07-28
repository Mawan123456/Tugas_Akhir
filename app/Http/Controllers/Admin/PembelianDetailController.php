<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembelian;
use App\Models\PembelianDetail;
use Illuminate\Http\Request;

class PembelianDetailController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_pembelian' => 'required',
            'nama_bahan' => 'required',
            'jumlah' => 'required|numeric',
            'harga_satuan' => 'required|numeric'
        ]);

        // Buat instance baru PembelianDetail
        $detail = new PembelianDetail();
        $detail->id_pembelian = $request->input('id_pembelian');
        $detail->nama_bahan = $request->input('nama_bahan');
        $detail->jumlah = $request->input('jumlah');
        $detail->harga_satuan = $request->input('harga_satuan');

        // Hitung total harga
        $detail->total_harga = $detail->jumlah * $detail->harga_satuan;

        // Simpan ke database
        $detail->save();

        return redirect()->back()->with('success', 'Data Berhasil Ditambah');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_bahan' => 'required',
            'jumlah' => 'required|numeric',
            'harga_satuan' => 'required|numeric'
        ]);

        // Cari pembelian berdasarkan ID
        $detail = PembelianDetail::findOrFail($id);

        // Update data pembelian
        $detail->nama_bahan = $request->input('nama_bahan');
        $detail->jumlah = $request->input('jumlah');
        $detail->harga_satuan = $request->input('harga_satuan');

        // Hitung ulang total harga
        $detail->total_harga = $detail->jumlah * $detail->harga_satuan;

        // Simpan perubahan
        $detail->save();

        return redirect()->back()->with('success', 'Data berhasil diupdate.');
    }

    public function destroy($id)
    {
        $detail = PembelianDetail::find($id);
        $detail->delete();

        return back()->with('danger', 'Data Berhasil Dihapus');
    }
}
