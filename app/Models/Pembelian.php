<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\ModelAuthenticate;

class pembelian extends ModelAuthenticate
{
    use HasFactory;

    protected $table = "pembelian";
    protected $fillable = [
        'nama_bahan',
        'jumlah_bahan',
        'harga_satuan',
        'total_harga',
        'aksi',
    ];

    function handleUploadFoto()
    {
        if (request()->hasFile('thumbnail_produk')) {
            $this->handleDeleteFoto();
            $thumbnail_produk = request()->file('thumbnail_produk');
            $destination = "produk";
            $randomStr = Str::random(5);
            $filename = $this->id . "-" . time() . "-" . $randomStr . "." . $thumbnail_produk->extension();
            $url = $thumbnail_produk->storeAs($destination, $filename);
            $this->thumbnail_produk = "app/" . $url;
            $this->save;
        }
    }
    function handleDeleteFoto()
    {
        $thumbnail_produk = $this->thumbnail_produk;
        if ($thumbnail_produk) {
            $path = public_path($thumbnail_produk);
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
