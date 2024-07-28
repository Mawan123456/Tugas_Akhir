<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $data['list_pelanggan'] = Pelanggan::all();
        return view('admin.pelanggan.index', $data);
    }

    public function create()
    {
        return view('admin.pelanggan.create');
    }

    public function edit($id)
    {
        return view('admin.pelanggan.edit', [
            'pelanggan' => Pelanggan::findOrFail($id)
        ]);
    }

    public function store()
    {
        $pelanggan = new Pelanggan();
        $pelanggan->nama_pelanggan = request('nama_pelanggan');
        $pelanggan->no_hp = request('no_hp');
        $pelanggan->alamat = request('alamat');
        $pelanggan->save();

        return redirect('admin/pelanggan')->with('success', 'Data Berhasil Ditambah');
    }

    public function update($id)
    {
        $pelanggan = Pelanggan::find($id);
        if (request('nama_pelanggan')) $pelanggan->nama_pelanggan = request('nama_pelanggan');
        if (request('no_hp')) $pelanggan->no_hp = request('no_hp');
        if (request('alamat')) $pelanggan->alamat = request('alamat');
        $pelanggan->save();

        return redirect('admin/pelanggan')->with('success', 'Data Berhasil di Edit');
    }

    function destroy($pelanggan)
    {
        $pelanggan = Pelanggan::find($pelanggan);
        $pelanggan->delete();

        return back()->with('danger', 'Data Berhasil Dihapus');
    }
}
