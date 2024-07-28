<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\ModelAuthenticate;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Laporan extends ModelAuthenticate
{
    use HasFactory;

    protected $table = "produk";
    protected $fillable = [
        'gambar_produk',
        'nama_produk',
        'berat_produk',
        'varian_rasa',
        'harga_produk',
        'stok_produk',
        'deskripsi',
    ];

    public function penjualan(): HasMany
    {
        return $this->hasMany(Penjualan::class, 'id_produk', 'id');
    }

    function handleUploadFoto()
    {
        if (request()->hasFile('gambar_produk')) {
            $this->handleDeleteFoto();
            $gambar_produk = request()->file('gambar_produk');
            $destination = "produk";
            $randomStr = Str::random(5);
            $filename = $this->id . "-" . time() . "-" . $randomStr . "." . $gambar_produk->extension();
            $url = $gambar_produk->storeAs($destination, $filename);
            $this->gambar_produk = "app/" . $url;
            $this->save;
        }
    }
    function handleDeleteFoto()
    {
        $gambar_produk = $this->gambar_produk;
        if ($gambar_produk) {
            $path = public_path($gambar_produk);
            if (file_exists($path)) {
                unlink($path);
            }
            return true;
        }
    }



    // function galeri()
    // {
    //     return $this->hasMany(Galeri::class, 'id_produk');
    // }

    // public function keranjang()
    // {
    //     return $this->hasMany(Keranjang::class, 'id_produk');
    // }

    function rupiah()
    {
        $harga = $this->harga_produk;
        return 'Rp.' . number_format($harga, 0, ',', '.');
    }
}
