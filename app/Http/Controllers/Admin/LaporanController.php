<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\pembelian;
use App\Models\Penjualan;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil tahun dari request, default ke tahun saat ini
        $tahun = $request->input('selectedYear', Carbon::now()->year);

        // Mengambil data pembelian dan menghitung total harga dari detail pembelian per bulan
        $pembelian = Pembelian::whereYear('tanggal_pembelian', $tahun)
            ->with('pembelianDetail')
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->tanggal_pembelian)->format('m');
            })
            ->map(function ($rows) {
                return $rows->sum(function ($pembelian) {
                    if ($pembelian->pembelianDetail) {
                        return $pembelian->pembelianDetail->sum(function ($detail) {
                            return $detail->jumlah * $detail->harga_satuan;
                        });
                    }
                    return 0;
                });
            });

        // Mengambil data penjualan per bulan
        $penjualanPerBulan = Penjualan::selectRaw('MONTH(created_at) as bulan, SUM(total_harga) as total_penjualan')
            ->whereYear('created_at', $tahun)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // Menggabungkan data pembelian dan penjualan per bulan
        $laporanPerBulan = [];
        for ($i = 1; $i <= 12; $i++) {
            $totalPembelian = $pembelian->get(str_pad($i, 2, '0', STR_PAD_LEFT), 0);
            $totalPenjualan = $penjualanPerBulan->firstWhere('bulan', $i)->total_penjualan ?? 0;

            $laporanPerBulan[] = [
                'bulan' => Carbon::create()->month($i)->translatedFormat('F'),
                'total_pembelian' => $totalPembelian,
                'total_penjualan' => $totalPenjualan,
                'keuntungan' => $totalPenjualan - $totalPembelian,
            ];
        }
        return view('admin.laporan.index', compact('laporanPerBulan', 'tahun'));
    }

    public function getData(Request $request)
    {
        $laporan = Laporan::all(); // Sesuaikan dengan query yang sesuai untuk data laporan

        return response()->json($laporan);
    }
}
