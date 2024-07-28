<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\ModelAuthenticate;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PembelianDetail extends ModelAuthenticate
{
    use HasFactory;

    protected $table = "pembelian_detail";
    protected $fillable = [
        'id_pembelian',
        'nama_bahan',
        'jumlah',
        'harga_satuan',
        'total_harga',
    ];

    public function pembelian(): BelongsTo
    {
        return $this->belongsTo(pembelian::class, 'id_pembelian', 'id');
    }
}
