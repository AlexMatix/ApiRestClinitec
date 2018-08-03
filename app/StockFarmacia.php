<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockFarmacia extends Model
{
   
   CONST ACTIVO		= 1;
   CONST NO_ACTIVO  = 0;

    protected $fillable = 
    [
     'id',
     'Cantidad',
     'Tipo_accion',
     'Fecha',
     'idFarmacia',
     'idCentro_medico',
     'Estado',
    ];

    protected $hidden=['id','Estado'];
    public $timestamps = false; 
    protected $table = 'stock_farmacia';
     
}
