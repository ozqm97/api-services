<?php

namespace App\Models\hoteles;

use Illuminate\Database\Eloquent\Model;

class paymentHistory extends Model
{
    protected $connection = 'mysql_hoteles';
    protected $table = 'hts_pagos';
    protected $primaryKey = 'CVE_RESERVACION';

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';
}
