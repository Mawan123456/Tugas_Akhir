<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class ModelAuthenticate extends Authenticatable
{
    protected $keyType = 'string';
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($item) {
            $item->id = (string) Str::orderedUuid();
        });
    }
}
