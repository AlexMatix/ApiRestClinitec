<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacunas_x_paciente extends Model
{
     	
 	CONST ACTIVO = 1;
    CONST NO_ACTIVO = 0;

    protected $fillable = 
    [
     'id',
     'Fecha_aplicacion',
     'idPaciente',
     'idConsulta',
     'idVacuna',
     'idCentro_medico',
     'Estado'
    ];

    public $timestamps = false;
}
