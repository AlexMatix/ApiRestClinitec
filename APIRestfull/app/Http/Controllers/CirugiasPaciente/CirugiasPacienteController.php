<?php

namespace App\Http\Controllers\CirugiasPaciente;

use App\Cirugias_x_paciente;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class CirugiasPacienteController extends ApiController
{
    public function index()
    {
        $cirugia = Cirugias_x_paciente::where("Estado", "<>", 0)->get();
        
        if(empty($cirugia)){
            return $this->errorResponse('Datos no encontrados', 404);
        }
        return $this->showAll($cirugia, 200);
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
        $cirugia = Cirugias_x_paciente::create($data); 

        return $this->showOne($cirugia, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $cirugia = Cirugias_x_paciente::findOrFail($id);
        return $this->showOne($cirugia, 200);
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
        
        $cirugia = Cirugias_x_paciente::findOrFail($id);
        $campos = $request->all();

        $cirugia->Fecha_ingreso    = empty($campos['Fecha_ingreso']) 
                                        ? $cirugia->Fecha_ingreso
                                        : $campos['Fecha_ingreso'];

        $cirugia->Fecha_egreso = empty($campos['Fecha_egreso']) 
                                        ? $cirugia->Fecha_egreso
                                        : $campos['Fecha_egreso'];

        $cirugia->idCama = empty($campos['idCama']) 
                                        ? $cirugia->idCama
                                        : $campos['idCama'];

       $cirugia->idPaciente    = empty($campos['idPaciente']) 
                                        ? $cirugia->idPaciente
                                        : $campos['idPaciente'];

        $cirugia->idCirugia = empty($campos['idCirugia']) 
                                        ? $cirugia->idCirugia
                                        : $campos['idCirugia'];

        $cirugia->idMedico = empty($campos['idMedico']) 
                                        ? $cirugia->idMedico
                                        : $campos['idMedico'];

        $cirugia->idCentro_medico = empty($campos['idCentro_medico']) 
                                        ? $cirugia->idCentro_medico
                                        : $campos['idCentro_medico'];

        $cirugia->Estado     = empty($campos['Estado']) 
                                        ? $cirugia->Estado
                                        : $campos['Estado'];
        if ($cirugia->save()){
            return $this->showOne($cirugia, 201);
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
        
      $cirugia =  Cirugias_x_paciente::findOrFail($id);

      $cirugia->Estado = Cirugias_x_paciente::NO_ACTIVO;

      if(!$cirugia->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);
    }
}
