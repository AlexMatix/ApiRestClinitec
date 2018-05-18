<?php

namespace App\Http\Controllers\Medicos;

use App\Http\Controllers\ApiController;
use App\Medicos;
use Illuminate\Http\Request;

class MedicosController extends ApiController
{


    public function __construct(){
        parent::__construct();
    }


    public function index()
    {
        $medicos = Medicos::where("Estado", "<>", 0)->get();
        if(!empty($medicos)){
            return $this->showAll($medicos);
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
        $campos    = $request->all();
        $newMedico = Medicos::create($campos);
        //201 = respuesta de success register
        return $this->showAll($newMedico);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Medicos $medico)
    {
        return $this->showOne($medico);
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
        $medico = Medicos::findOrFail($id);
        $campos = $request->all();

        $medico->Nombre    = empty($campos['Nombre']) 
                                        ? $medico->Nombre
                                        : $campos['Nombre'];

        $medico->Apellidos = empty($campos['Apellidos']) 
                                        ? $medico->Apellidos
                                        : $campos['Apellidos'];

        $medico->Especialidad = empty($campos['Especialidad']) 
                                        ? $medico->Especialidad
                                        : $campos['Especialidad'];

        $medico->Sexo     = empty($campos['Sexo']) 
                                        ? $medico->Sexo
                                        : $campos['Sexo'];

        $medico->Edad    = empty($campos['Edad']) 
                                        ? $medico->Edad
                                        : $campos['Edad'];

        $medico->Cedula = empty($campos['Cedula']) 
                                        ? $medico->Cedula
                                        : $campos['Cedula'];

        $medico->Direccion = empty($campos['Direccion']) 
                                        ? $medico->Direccion
                                        : $campos['Direccion'];
        
        $medico->idCentro_medico = empty($campos['idCentro_medico']) 
                                        ? $medico->idCentro_medico
                                        : $campos['idCentro_medico'];

        $medico->Estado     = empty($campos['Estado']) 
                                        ? $medico->Estado
                                        : $campos['Estado'];
        if ($medico->save()){
            return $this->showOne($medico, 201);
        }

        return $this->errorResponse("Ocurrio algún error intentelo mas tarde", 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicos $medico)
    {

      $medico->Estado = Medicos::NO_ACTIVO;

      if(!$medico->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);

    }
}
