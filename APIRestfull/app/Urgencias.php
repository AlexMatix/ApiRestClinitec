<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urgencias extends Model
{
    CONST ACTIVO = 1;
    CONST NO_ACTIVO = 0;
    
    public $timestamps = false;
    
    protected $fillable = 
    [
        'id',
        'Motivo',
        'Prioridad',
        'Fecha_ingreso',
        'Fecha_egreso',
        'idPaciente',
        'idCentro_medico',
        'Estado',
    ];
}
