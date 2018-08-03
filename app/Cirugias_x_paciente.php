<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cirugias_x_paciente extends Model
{
   
    CONST NO_ACTIVO    = 0;
    CONST ACTIVO       = 1;
    
    //MAS ESTADOS DE LAS CIRUGIAS
    CONST EN_PROCESO = 2;
    CONST DADO_ALTA  = 3;


    public $timestamps = false;
    protected $fillable = 
    [
        'id',
        'Fecha_ingreso',
        'Fecha_egreso',
        'idCama',
        'idPaciente',
        'idCirugia',
        'idMedico',
        'idCentro_medico',
        'Estado',
    ];
}
