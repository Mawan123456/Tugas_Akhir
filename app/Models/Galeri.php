<?php

namespace App\Models\Admin;

use App\Models\ModelAuthenticate;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Galeri extends ModelAuthenticate
{
    protected $table = 'produk_carousel';

    protected $fillable = ['id_produk', 'gambar'];

    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }

    // function handleUploadGambar()
    // {
    //     $this->handleDeleteGambar();
    //     if (request()->hasFile('gambar')) {
    //         $gambar = request()->file('gambar');
    //         $destination = "images/gambar";
    //         $randomStr = Str::random(5);
    //         $filename = $this->id . "-" . time() . "-" . $randomStr . "." . $gambar->extension();
    //         $url = $gambar->storeAs($destination, $filename);
    //         $this->gambar = "app/" . $url;
    //         $this->save();
    //     }
    // }

    // function handleDeleteGambar()
    // {
    //     $gambar = $this->gambar;
    //     if ($gambar) {
    //         $path = public_path($gambar);
    //         if (file_exists($path)) {
    //             unlink($path);
    //         }
    //         return true;
    //     }
    // }

    function handleUploadImage($idProduk)
    {
        $this->handleDeleteImage($idProduk);
        $carousels = ProdukCarousel::where("id_produk", $idProduk)->select('gambar')->get();

        if (request()->hasFile('gambar')) {
            $destination = "images/gambar";
            $uploadedFiles = request()->file('gambar');
            $urls = [];

            if ($carousels) {
                foreach ($carousels as $item) {
                    $urls[] = $item->gambar;
                }
            }

            if (request()->hasFile('gambar')) {
                foreach ($uploadedFiles as $file) {
                    $randomStr = Str::random(5);
                    $filename = $idProduk . "-" . time() . "-" . $randomStr . "." . $file->extension();
                    $path = $destination . '/' . $filename;
                    // Simpan file ke disk lokal
                    Storage::disk('local')->put($path, file_get_contents($file->getRealPath()));

                    // Simpan URL asset dan ukuran dalam array
                    $urls[] = "app/" . $path;
                }
            }

            // Simpan data ke database
            foreach ($urls as $url) {
                ProdukCarousel::updateOrCreate(
                    ['id_produk' => $idProduk, 'gambar' => $url],
                    ['id_produk' => $idProduk, 'gambar' => $url]
                );
            }
        }
    }

    function handleDeleteImage($idProduk)
    {
        $urls = $this->where("id_produk", $idProduk)->select('gambar')->get();

        if ($urls) {
            foreach ($urls as $url) {
                $urlAsset = $url->gambar;
                ProdukCarousel::where("gambar", $urlAsset)->delete();
                $path = public_path($urlAsset);
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            return true;
        }
    }
}