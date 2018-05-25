<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago_plazos extends Model
{
	CONST NO_PAGADO = 0;
	CONST PAGADO 	= 1;
	CONST ATRAZADO  = 3;

    protected $fillable = 
    [
     'id',
     'Cantidad_pagos',
     'Monto_pagos',
     'Dia_corte',
     'Pagos',
     'Fecha_limite',
     'idCaja',
     'idUsuario_sistema',
     'idCentro_medico',
     'Estado'
    ];


    public $timestamps = false;
}
