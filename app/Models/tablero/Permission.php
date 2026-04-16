<?php

namespace App\Models\tablero;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Permission extends Authenticatable
{

    protected $table = 'permissions';
    protected $fillable = [
        'id',
        'name',
        'description',
    ];
    public $timestamps = false;

}
