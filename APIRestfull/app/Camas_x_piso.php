<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camas_x_piso extends Model
{
    //
    CONST ACTIVA 	   = 1;
    CONST NO_ACTIVA    = 0;
    CONST CAMA_LIBRE   = 0;
    CONST CAMA_OCUPADA = 1;

 	protected $fillable = 
 	[
 		'id',
 		'Piso',
 		'Seccion',
 		'Descripcion',
 		'ocupado',
 		'idCentro_medico',
 		'Estado'
 	];

    public $timestamps = false;
 	protected $table = 'camas_x_piso';
 	public function getAllbyEstado(){
 		
 	}
}
