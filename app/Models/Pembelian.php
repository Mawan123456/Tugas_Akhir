<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\ModelAuthenticate;
use Illuminate\Database\Eloquent\Relations\HasMany;

class pembelian extends ModelAuthenticate
{
    use HasFactory;

    protected $table = "pembelian";
    protected $fillable = [
        'deskripsi',
        'tanggal_pembelian',
        'judul',
    ];

    public function pembelianDetail(): HasMany
    {
        return $this->hasMany(PembelianDetail::class, 'id_pembelian', 'id');
    }

    public function getTanggalAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_pembelian'])->translatedFormat('l, d F Y');
    }
}
