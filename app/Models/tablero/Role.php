<?php

namespace App\Models\tablero;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Role extends Authenticatable
{

    protected $table = 'roles';
    protected $fillable = [
        'id',
        'name',
        'description',
    ];
    public $timestamps = false;

}
