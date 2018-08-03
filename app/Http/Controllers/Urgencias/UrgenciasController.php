<?php

namespace App\Http\Controllers\Urgencias;

use App\Http\Controllers\ApiController;
use App\Urgencias;
use Illuminate\Http\Request;
use App\Pacientes;

class UrgenciasController extends ApiController
{
    public function __construct(){

        $this->middleware('client.credentials')->only(['index', 'show']);
    }

   public function index()
    {
        $urgencia = Urgencias::where("Estado", "<>", 0)->get();
        
        if(empty($urgencia)){
            return $this->errorResponse('Datos no encontrados', 404);
        }
        return $this->showAll($urgencia, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $data['Fecha_ingreso'] = date('Y-m-d');
        $data['Fecha_egreso'] = null;        
        
        $paciente = Pacientes::findOrFail($data['idPaciente']);
        if($paciente->Estado!=Pacientes::ACTIVO)
			return $this->errorResponse("Paciente se encuentra Ingresado o en Urgencias", 500);

        $paciente->Estado = Pacientes::URGENCIA;
		try {
			$paciente->save();
		} catch (QueryException $e) {
			return $this->errorResponse("Error al actualizar los datos", 500);
		}
        $urgencia = Urgencias::create($data);
        return $this->showOne($urgencia, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $urgencia = Urgencias::findOrFail($id);
        return $this->showOne($urgencia, 200);
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
        
        $urgencia = Urgencias::findOrFail($id);
        $campos = $request->all();

        $urgencia->Motivo    = empty($campos['Motivo']) 
                                        ? $urgencia->Motivo
                                        : $campos['Motivo'];

        $urgencia->Prioridad = empty($campos['Prioridad']) 
                                        ? $urgencia->Prioridad
                                        : $campos['Prioridad'];
        
        $urgencia->Fecha_ingreso = empty($campos['Fecha_ingreso']) 
                                        ? $urgencia->Fecha_ingreso
                                        : $campos['Fecha_ingreso'];

        $urgencia->Fecha_egreso = empty($campos['Fecha_egreso']) 
                                        ? $urgencia->Fecha_egreso
                                        : $campos['Fecha_egreso'];

        $urgencia->idPaciente = empty($campos['idPaciente']) 
                                        ? $urgencia->idPaciente
                                        : $campos['idPaciente'];

        $urgencia->idCentro_medico = empty($campos['idCentro_medico']) 
                                        ? $urgencia->idCentro_medico
                                        : $campos['idCentro_medico'];

        $urgencia->Estado     = empty($campos['Estado']) 
                                        ? $urgencia->Estado
                                        : $campos['Estado'];
        if ($urgencia->save()){
            return $this->showOne($urgencia, 201);
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
        
      $urgencia =  Urgencias::findOrFail($id);

      $urgencia->Estado = Urgencias::NO_ACTIVO;

      if(!$urgencia->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);
    }
}
