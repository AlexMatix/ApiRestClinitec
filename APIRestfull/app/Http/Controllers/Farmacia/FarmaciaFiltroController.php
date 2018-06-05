<?php

namespace App\Http\Controllers\Farmacia;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Farmacias;
use App\Centro_medico;

class FarmaciaFiltroController extends ApiController
{
    public function LoteFechaCompuesto(){

    	$idCentroMedico = $_GET['idCentroMedico'];
    	$centroMedico = Centro_medico::findOrFail($idCentroMedico);

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

		if(isset($_GET['almacen'])){
			$almacen=$_GET['almacen'];
			$query[] = array("idAlmacen","=",$almacen);

		if(empty($query))
			return $this->errorResponse("No hay datos", 404);

		$query[]=["idCentro_medico","=",$centroMedico->id];

		$farmacias = Farmacias::where($query)->get();

		return $this->showList($farmacias);
    }
}
