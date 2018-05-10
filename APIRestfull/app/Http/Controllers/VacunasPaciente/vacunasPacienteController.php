<?php

namespace App\Http\Controllers\VacunasPaciente;

use App\Http\Controllers\ApiController;
use App\Vacunas_x_paciente;
use Illuminate\Http\Request;

class vacunasPacienteController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacuna = Vacunas_x_paciente::where("Estado", "<>", 0)->get();
        
        if(empty($vacuna)){
            return $this->errorResponse('Datos no encontrados', 404);
        }
        return $this->showAll($vacuna, 200);
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
        $vacuna = Vacunas_x_paciente::create($data); 

        return $this->showOne($vacuna, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $vacuna = Vacunas_x_paciente::findOrFail($id);
        return $this->showOne($vacuna, 200);
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
        
        $vacuna = Vacunas_x_paciente::findOrFail($id);
        $campos = $request->all();

        $vacuna->idPaciente    = empty($campos['idPaciente']) 
                                        ? $vacuna->idPaciente
                                        : $campos['idPaciente'];

        $vacuna->idConsulta = empty($campos['idConsulta']) 
                                        ? $vacuna->idConsulta
                                        : $campos['idConsulta'];

        $vacuna->idCentro_medico = empty($campos['idCentro_medico']) 
                                        ? $vacuna->idCentro_medico
                                        : $campos['idCentro_medico'];
                                        
        $vacuna->Estado     = empty($campos['Estado']) 
                                        ? $vacuna->Estado
                                        : $campos['Estado'];
        if ($vacuna->save()){
            return $this->showOne($vacuna, 201);
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
        
      $vacuna =  Vacunas_x_paciente::findOrFail($id);

      $vacuna->Estado = Vacunas_x_paciente::NO_ACTIVO;

      if(!$vacuna->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);
    }
}
