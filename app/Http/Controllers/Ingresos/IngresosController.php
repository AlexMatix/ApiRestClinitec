<?php

namespace App\Http\Controllers\Ingresos;

use App\Ingresos;
use App\Pacientes;
use App\Camas_x_piso;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Database\QueryException;

class IngresosController extends ApiController
{

    public function __construct(){

        $this->middleware('client.credentials')->only(['index', 'show']);
    }



   public function index()
    {
        $centroMedico = $_GET['centro'];
        if(isset($centroMedico)){
            $ingreso = Ingresos::where([["Estado", "<>", 0],['idCentro_medico',"=",$centroMedico]])->get();
        }
        if(empty($ingreso)){
            return $this->errorResponse('Datos no encontrados', 404);
        }
        return $this->showAll($ingreso, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingreso = $request->all();
        $ingreso['Fecha_ingreso'] = date("Y-m-d"); //Fecha del server
        unset($ingreso['Fecha_egreso']); //Aseguramos de limpiar la fecha de egreso.
        $paciente = Pacientes::findOrFail($ingreso['idPaciente']);
        if($paciente->Estado!=Pacientes::ACTIVO)
			return $this->errorResponse("Paciente se encuentra Ingresado o en Urgencias", 500);

        $cama = Camas_x_piso::findOrFail($ingreso['idCama']);
        if($cama->Ocupado==Camas_x_piso::CAMA_OCUPADA)
			return $this->errorResponse("Cama ya se encuentra ocupada", 500);

        $cama->Ocupado = Camas_x_piso::CAMA_OCUPADA;
        $paciente->Estado = Pacientes::INGRESADO;
        try {
            $paciente->save();
		} catch (QueryException $e) {
            return $this->errorResponse("Error al actualizar los datos", 500);
        }
		try {
            $cama->save();
		} catch (QueryException $e) {
            return $this->errorResponse("Error al actualizar los datos", 500);
		}
        $ingreso = Ingresos::create($ingreso);
        return $this->showOne($ingreso, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $ingreso = Ingresos::findOrFail($id);
        return $this->showOne($ingreso, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $ingreso = Ingresos::findOrFail($id);
        $campos = $request->all();

        $ingreso->Fecha_ingreso    = empty($campos['Fecha_ingreso']) 
                                        ? $ingreso->Fecha_ingreso
                                        : $campos['Fecha_ingreso'];

        $ingreso->Fecha_egreso = empty($campos['Fecha_egreso']) 
                                        ? $ingreso->Fecha_egreso
                                        : $campos['Fecha_egreso'];

        $ingreso->idCama = empty($campos['idCama']) 
                                        ? $ingreso->idCama
                                        : $campos['idCama'];

       $ingreso->idPaciente    = empty($campos['idPaciente']) 
                                        ? $ingreso->idPaciente
                                        : $campos['idPaciente'];
                                        
        $ingreso->idCentro_medico = empty($campos['idCentro_medico']) 
                                        ? $ingreso->idCentro_medico
                                        : $campos['idCentro_medico'];

        $ingreso->Estado     = empty($campos['Estado']) 
                                        ? $ingreso->Estado
                                        : $campos['Estado'];
        if ($ingreso->save()){
            return $this->showOne($ingreso, 201);
        }

        return $this->errorResponse("Ocurrio algún error intentelo mas tarde", 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
      $ingreso =  Ingresos::findOrFail($id);

      $ingreso->Estado = Ingresos::NO_ACTIVO;

      if(!$ingreso->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);
    }
}
