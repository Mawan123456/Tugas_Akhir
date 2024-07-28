<?php

use App\Http\Controllers\Admin\BroadcastController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\PembelianController;
use App\Http\Controllers\Admin\PenjualanController;
use App\Http\Controllers\Admin\PelangganController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\PembelianDetailController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\AuthController;
use App\Models\Laporan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', 'login');

// Login
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginProcess']);
Route::get('logout', [AuthController::class, 'logout']);

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('produk', ProdukController::class);
    Route::resource('pembelian', PembelianController::class);
    Route::resource('penjualan', PenjualanController::class);
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('broadcast', BroadcastController::class);
    Route::resource('pembelian-detail', PembelianDetailController::class);
    Route::resource('laporan', LaporanController::class);
    Route::resource('profile', ProfileController::class);
});
