<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultas extends Model
{
    CONST NO_ACTIVO = 0;
	CONST ACTIVO    = 1;
    

    protected $fillable = 
    [
     'id',
     'Peso',
     'Talla',
     'Perimetro_cefalitico',
     'Perimetro_Torasico',
     'Fecha',
     'Costo',
     'idMedico',
     'idPaciente',
     'idCentro_medico',
     'Estado'
    ];

    protected $table = 'consultas';
    public $timestamps = false;
}
