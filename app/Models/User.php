<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\ModelAuthenticate;

class User extends ModelAuthenticate

{
    use HasFactory;

    protected $table = "users";
    protected $fillable = [
        'nama',
        'username',
        'email',
        'no_hp',
    ];
}
