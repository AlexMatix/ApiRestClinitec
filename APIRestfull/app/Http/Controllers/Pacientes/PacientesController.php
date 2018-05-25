<?php

namespace App\Http\Controllers\Pacientes;

use App\Http\Controllers\ApiController;
use App\Pacientes;
use Illuminate\Http\Request;

class PacientesController extends ApiController
{
    

  public function __construct(){

    $this->middleware('client.credentials')->only(['index', 'show']);
   }

    public function index()
    {
        $pacientes = Pacientes::where("Estado", "<>", 0)->get();
        if(!empty($pacientes)){
            return $this->showAll($pacientes);
        }else{
            return $this->errorResponse('Datos no encontrados', 404);        
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $campos     = $request->all();
      $newPaciente = Pacientes::create($campos);
      //201 = respuesta de success register
      return $this->showAll($newPaciente);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pacientes $paciente)
    {
        return $this->showOne($paciente);
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
        $paciente = Pacientes::findOrFail($id);
        $campos = $request->all();

        $paciente->Nombre    = empty($campos['Nombre']) 
                                        ? $paciente->Nombre
                                        : $campos['Nombre'];

        $paciente->Apellidos = empty($campos['Apellidos']) 
                                        ? $paciente->Apellidos
                                        : $campos['Apellidos'];

        $paciente->Telefono = empty($campos['Telefono']) 
                                        ? $paciente->Telefono
                                        : $campos['Telefono'];
        $paciente->Sexo    = empty($campos['Sexo']) 
                                        ? $paciente->Sexo
                                        : $campos['Sexo'];

        $paciente->Edad = empty($campos['Edad']) 
                                        ? $paciente->Edad
                                        : $campos['Edad'];

        $paciente->Direccion = empty($campos['Direccion']) 
                                        ? $paciente->Direccion
                                        : $campos['Direccion'];
                                        
        $paciente->Tipo_sangre    = empty($campos['Tipo_sangre']) 
                                        ? $paciente->Tipo_sangre
                                        : $campos['Tipo_sangre'];

        $paciente->Fecha_inscripcion = empty($campos['Fecha_inscripcion']) 
                                        ? $paciente->Fecha_inscripcion
                                        : $campos['Fecha_inscripcion'];

        $paciente->idCentro_medico = empty($campos['idCentro_medico']) 
                                        ? $paciente->idCentro_medico
                                        : $campos['idCentro_medico'];

        $paciente->Estado     = empty($campos['Estado']) 
                                        ? $paciente->Estado
                                        : $campos['Estado'];
        if ($paciente->save()){
            return $this->showOne($paciente, 201);
        }

        return $this->errorResponse("Ocurrio algún error intentelo mas tarde", 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pacientes $paciente)
    {
        
      $paciente->Estado = Pacientes::NO_ACTIVO;

      if(!$paciente->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);
    }
}
