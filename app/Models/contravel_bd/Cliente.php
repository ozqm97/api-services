<?php

namespace App\Models\contravel_bd;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $connection = 'mysql2';

    protected $table = 'clientes';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id_iris',
        'username',
        'nombres',
        'apellidos',
        'full_name',
        'email',
        'cve_agencia'
    ];

    protected $casts = [
        'id_iris' => 'string'
    ];

    public function agency()
    {
        return $this->belongsTo(
            Agencia::class,
            'cve_agencia',
            'id_agencia'
        );
    }
}
