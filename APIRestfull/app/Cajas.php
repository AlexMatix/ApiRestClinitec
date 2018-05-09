<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cajas extends Model
{
    CONST PAGO_ELIMINADO = 0;
    CONST PAGADO         = 1;
    CONST PAGO_A_PLAZO   = 2;
    CONST NO_PAGADO      = 3;


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
