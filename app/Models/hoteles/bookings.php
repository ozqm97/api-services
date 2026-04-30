<?php

namespace App\Models\hoteles;

use Illuminate\Database\Eloquent\Model;
use App\Models\admon_op\commentReservations;
use App\Models\admon_op\confirmedReservations;
use App\Models\hoteles\cancelledBooking;

class bookings extends Model
{
    protected $connection = 'mysql_hoteles';
    protected $table = 'hts_reservaciones';
    protected $primaryKey = 'CVE_RESERVACION';

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'BREAKDOWN_STATUS'
    ];

    /**
     * Relación con catálogo de plataforma
     * hts_reservaciones.CVE_PLATAFORMA = tbl_cat_plataforma.cat_plataforma_id
     */
    public function plataforma()
    {
        return $this->belongsTo(
            catalogPlataform::class,
            'CVE_PLATAFORMA',
            'cat_plataforma_id'
        );
    }

    /**
     * Relación con huésped
     * hts_huesped.CVE_RESERVACION = hts_reservaciones.CVE_RESERVACION
     */
    public function huesped()
    {
        return $this->hasOne(
            guestInformation::class,
            'CVE_RESERVACION',
            'CVE_RESERVACION'
        );
    }

    /**
     * Relación con pagos
     * hts_pagos.CVE_RESERVACION = hts_reservaciones.CVE_RESERVACION
     */
    public function pagos()
    {
        return $this->hasOne(
            paymentHistory::class,
            'CVE_RESERVACION',
            'CVE_RESERVACION'
        );
    }

    /**
     * Relación con canceladas
     */
    public function canceladas()
    {
        return $this->hasOne(
            cancelledBooking::class,
            'CVE_RESERVACION',
            'CVE_RESERVACION'
        );
    }

    /**
     * Relación con confirmadas
     */
    public function confirmadas()
    {
        return $this->hasOne(
            confirmedReservations::class,
            'CVE_RESERVACION',
            'CVE_RESERVACION'
        );
    }

    /**
     * Relación con observaciones
     */
    public function observaciones()
    {
        return $this->hasOne(
            commentReservations::class,
            'CVE_RESERVACION',
            'CVE_RESERVACION'
        );
    }
}
