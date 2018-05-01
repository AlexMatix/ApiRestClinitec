<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmacias extends Model
{
   CONST EXISTENTE 	  = 1;
   CONST NO_EXISTENTE = 0;

    protected $fillable = 
    [
     'id',
     'Nombre_marca',
     'Nombre_compuesto',
     'Precentacion',
     'Descripcion',
     'Precio',
     'Cantidad',
     'Codigo_barras',
     'Lote',
     'Caducidad',
     'Dosis_precentacion',
     'idCentro_medico',
     'idAlmacen',
     'Estado',
    ];


    public $timestamps = false;    
}
