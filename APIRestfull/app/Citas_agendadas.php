<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citas_agendadas extends Model
{
    
    CONST ELIMINADA     = 0;
    CONST NO_CONFIRMADA = 1;
    CONST CONFIRMADA 	= 2;
    CONST NO_ASISTIO 	= 3;
    CONST ASISTIO 		= 4;


    protected $fillable = 
    [
     'id',
     'Titulo',
     'Fecha',
     'Hora_inicio',
     'Hora_termino',
     'idPaciente',
     'idMedico',
     'idCentro_medico',
     'Estado',
    ];


    public $timestamps = false;
}
