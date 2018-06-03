<?php

namespace App\Http\Controllers\Farmacia;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Farmacias;

class FarmaciaFiltroController extends ApiController
{
    public function LoteFechaCompuesto(){
    	if(isset($_GET['lote'])){
			$lote=$_GET['lote'];
			$query[] = array("Lote","=",$lote);
		}

		if(isset($_GET['caducidad'])){
			$caducidad=$_GET['caducidad'];
			$query[] = array("Caducidad","=",$caducidad);
		}

		if(isset($_GET['compuesto'])){
			$compuesto=$_GET['compuesto'];
			$query[] = array("Nombre_compuesto","=",$compuesto);
		}

		if(empty($query))
			return $this->errorResponse("No hay datos", 404);

		$farmacias = Farmacias::where($query)->get();

		return $this->showList($farmacias);
    }
}
