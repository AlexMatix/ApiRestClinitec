<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cajas extends Model
{
    CONST NO_PAGADO      = 0;
    CONST PAGADO         = 1;
    CONST PAGO_A_PLAZO   = 2;
    CONST PAGO_ELIMINADO = 3;


    protected $fillable = 
    [
     'id',
     'Monto',
     'Fecha',
     'idUsuario_sistema',
     'idPaciente',
     'idCentro_medico',
     'Estado'
    ];


    public $timestamps = false;
}
