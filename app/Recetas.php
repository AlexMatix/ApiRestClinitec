<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recetas extends Model
{
	CONST ACTIVO = 1;
    CONST NO_ACTIVO = 0;

    protected $fillable = 
    [
     'id',
     'Titulo',
     'Descripcion',
     'Medicamentos',
     'idMedico',
     'idPaciente',
     'idConsulta',
     'idCentro_medico',
     'Estado',
    ];


    public $timestamps = false;    
}
