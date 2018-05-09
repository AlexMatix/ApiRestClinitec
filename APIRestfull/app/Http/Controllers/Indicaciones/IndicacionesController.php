<?php

namespace App\Http\Controllers\Indicaciones;

use App\Http\Controllers\ApiController;
use App\Indicaciones_medicas;
use Illuminate\Http\Request;

class IndicacionesController extends ApiController
{
     public function index()
    {
        $indicacion = Indicaciones_medicas::where("Estado", "<>", 0)->get();
        
        if(empty($indicacion)){
            return $this->errorResponse('Datos no encontrados', 404);
        }
        return $this->showAll($indicacion, 200);
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
        $indicacion = Indicaciones_medicas::create($data); 

        return $this->showOne($indicacion, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $indicacion = Indicaciones_medicas::findOrFail($id);
        return $this->showOne($indicacion, 200);
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
        
        $indicacion = Indicaciones_medicas::findOrFail($id);
        $campos = $request->all();

        $indicacion->Dieta    = empty($campos['Dieta']) 
                                        ? $indicacion->Dieta
                                        : $campos['Dieta'];

        $indicacion->Esquema_soluciones = empty($campos['Esquema_soluciones']) 
                                        ? $indicacion->Esquema_soluciones
                                        : $campos['Esquema_soluciones'];

        $indicacion->Lista_medicamentos = empty($campos['Lista_medicamentos']) 
                                        ? $indicacion->Lista_medicamentos
                                        : $campos['Lista_medicamentos'];

        $indicacion->Medias_generales     = empty($campos['Medias_generales']) 
                                        ? $indicacion->Medias_generales
                                        : $campos['Medias_generales'];
        
        $indicacion->Hemocomponentes      = empty($campos['Hemocomponentes']) 
                                        ? $indicacion->Hemocomponentes
                                        : $campos['Hemocomponentes'];

        $indicacion->idConsulta = empty($campos['idConsulta']) 
                                        ? $indicacion->idConsulta
                                        : $campos['idConsulta'];

        $indicacion->idCentro_medico = empty($campos['idCentro_medico']) 
                                        ? $indicacion->idCentro_medico
                                        : $campos['idCentro_medico'];

        $indicacion->Estado     = empty($campos['Estado']) 
                                        ? $indicacion->Estado
                                        : $campos['Estado'];
        if ($indicacion->save()){
            return $this->showOne($indicacion, 201);
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
        
      $indicacion =  Indicaciones_medicas::findOrFail($id);

      $indicacion->Estado = Indicaciones_medicas::NO_ACTIVO;

      if(!$indicacion->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);
    }
}
