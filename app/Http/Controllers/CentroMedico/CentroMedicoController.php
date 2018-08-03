<?php

namespace App\Http\Controllers\CentroMedico;

use App\Centro_medico;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class CentroMedicoController extends ApiController
{


    public function index()
    {   

        if(isset($_GET['tipo'])){
            $tipo = $_GET['tipo'];
            $centroMedico = Centro_medico::where([["Tipo_centro_medico", "=", "$tipo"],["Estado", "<>", 0]])->get();
        }else{
            $centroMedico = Centro_medico::where("Estado", "<>", 0)->get();
        }
        
        if(empty($centroMedico)){
            return $this->errorResponse('Datos no encontrados', 404);
        }
        return $this->showAll($centroMedico, 200);
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
        $newCentroMedico = Centro_medico::create($data); 

        return $this->showOne($newCentroMedico, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Centro_medico $centro_medico)
    {
        return $this->showOne($centro_medico, 200);
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
        
        $centromedico = Centro_medico::findOrFail($id);
        $campos = $request->all();

        $centromedico->Nombre = empty($campos['Nombre']) 
                                        ? $centromedico->Nombre
                                        : $campos['Nombre'];

        $centromedico->Direccion = empty($campos['Direccion']) 
                                        ? $centromedico->Direccion
                                        : $campos['Direccion'];

        $centromedico->Tipo_centro_medico = empty($campos['Tipo_centro_medico']) 
                                        ? $centromedico->Tipo_centro_medico
                                        : $campos['Tipo_centro_medico'];

        $centromedico->Estado  = empty($campos['Estado']) 
                                        ? $centromedico->Estado
                                        : $campos['Estado'];
        if ($centromedico->save()){
            return $this->showOne($centromedico, 201);
        }

        return $this->errorResponse("Ocurrio algún error intentelo mas tarde", 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Centro_medico $centro_medico)
    {
       
      $centro_medico->Estado = Centro_medico::NO_ACTIVO;

      if(!$centro_medico->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);

    }
    
}
