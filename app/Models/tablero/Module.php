<?php

namespace App\Models\tablero;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Module extends Authenticatable
{

    protected $table = 'modules';
    protected $fillable = [
        'id',
        'name',
        'description',
    ];
    public $timestamps = false;

}
