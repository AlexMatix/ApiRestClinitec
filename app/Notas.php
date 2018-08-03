<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    
    CONST ACTIVO    = 1;
    CONST NO_ACTIVO = 0;

    // TIPO DE NOAS

    CONST URGENCIA      = 1;
    CONST INGRESO       = 2;
    CONST EVOLUCION     = 3;
    CONST GUARDIA       = 4;
    CONST POSQUIRURJICA = 5;
    CONST DEFUNCION     = 6;
    CONST AMBULANCIA    = 7;

    public $timestamps = false;
    protected $fillable = 
    [
    	'id',
        'Tipo_nota',
    	'Diagnostico',
    	'Peso',
    	'Talla',
    	'IMC',
    	'SC',
    	'SVT',
    	'FC',
        'TR',
        'Temperatura',
        'TA',
        'S02',
        'Nota',
        'Pronostico',
        'idPaciente',
        'idMedico',
    	'idCentro_medico',
    	'Estado',
    ];
}
