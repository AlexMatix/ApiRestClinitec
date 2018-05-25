<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infrestructura_Centro_medico extends Model
{
    //

    CONST ACTIVO    = 1;
    CONST NO_ACTIVO = 0;

    protected $fillable = 
    [
      'id',
      'idCentro_medico',
      'Infrestructura_centro_medico',
      'Estado'
    ];

    public $timestamps = false;
    protected $table = 'infrestructura_centro_medico';
}
