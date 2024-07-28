<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pelanggan extends ModelAuthenticate
{
    use HasFactory;

    protected $table = "pelanggan";
    protected $fillable = [
        'nama_pelanggan',
        'no_hp',
        'alamat',
    ];
}
