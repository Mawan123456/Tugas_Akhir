<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Produk;
use App\Models\Penjualan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $produk = Produk::sum('stok_produk');
        $penjualan = penjualan::sum('stok_terjual');
        $pelanggan = pelanggan::count();
        return view('admin.dashboard.index', compact('produk', 'penjualan', 'pelanggan'));
        // return view('admin.dashboard.index', compact('penjualan'));
    }
}
