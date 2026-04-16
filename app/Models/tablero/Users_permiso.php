<?php

namespace App\Models\tablero;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users_permiso extends Authenticatable
{
    protected $table = 'users_permisos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user',
        'permiso',

    ];


    public $timestamps = false;
}