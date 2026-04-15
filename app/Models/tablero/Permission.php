<?php

namespace App\Models\tablero;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Permission extends Authenticatable
{

    protected $table = 'mpermissions';
    protected $fillable = [
        'id',
        'name',
        'description',
    ];
    public $timestamps = false;

}
