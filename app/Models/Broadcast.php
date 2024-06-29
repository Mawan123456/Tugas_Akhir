<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\ModelAuthenticate;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Broadcast extends ModelAuthenticate
{
    use HasFactory;

    protected $table = "broadcast";
    protected $fillable = [
        'judul_pesan',
        'tanggal',
        'pesan',
    ];

    public function getTanggalStringAttribute()
    {
        return Carbon::parse($this->attributes['tanggal'])->translatedFormat('l, d F Y');
    }
}
