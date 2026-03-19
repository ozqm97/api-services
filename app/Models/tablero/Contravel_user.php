<?php

namespace App\Models\tablero;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Contravel_user extends Authenticatable
{

    protected $table = 'contravel_users';
    protected $fillable = [
        'id',
        'user',
        'cifrado',
        'mail',
        'full_name',
        'cve_agencia',
    ];
    public $timestamps = false;

    public function agency()
    {
        return $this->belongsTo(Agencies::class, 'cve_agencia');
        // 👆 asegúrate que la FK se llame agency_id (o cámbiala aquí)
    }
}
