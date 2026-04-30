<?php

namespace App\Models\hoteles;

use Illuminate\Database\Eloquent\Model;

class catalogPlataform extends Model
{
    protected $connection = 'mysql_hoteles';
    protected $table = 'tbl_cat_plataforma';
    protected $primaryKey = 'cat_plataforma_id';

    public $timestamps = false;
}
