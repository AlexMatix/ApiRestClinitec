<?php

namespace App\Http\Controllers\Cirugias;

use App\Cirugias;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class CirugiasController extends ApiController
{
    
    public function __construct(){

        $this->middleware('client.credentials')->only(['index', 'show']);
    }


    public function index()
    {
        if(!isset($_GET['tipo'])){
            return $this->errorResponse('Hospital no encontrado', 500);
        }
        $cirugia = Cirugias::where([["Estado", "<>", 0],["idCentro_medico", "=",$_GET['tipo']]])->get();
        
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
        $almacen = Cirugias::create($data); 

        return $this->showOne($almacen, 200);
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cirugias $cirugia)
    {
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
        
        $cirugia = Cirugias::findOrFail($id);
        $campos  = $request->all();

        $cirugia->Nombre    = empty($campos['Nombre']) 
                                        ? $cirugia->Nombre
                                        : $campos['Nombre'];

        $cirugia->Riesgos = empty($campos['Riesgos']) 
                                        ? $cirugia->Riesgos
                                        : $campos['Riesgos'];

        $cirugia->Costos = empty($campos['Costos']) 
                                        ? $cirugia->Costos
                                        : $campos['Costos'];

        $cirugia->Duracion = empty($campos['Duracion']) 
                                        ? $cirugia->Duracion
                                        : $campos['Duracion'];
                                        
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
    public function destroy(Cirugias $cirugia)
    {
        $cirugia->Estado = Cirugias::NO_ACTIVA;

      if(!$cirugia->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);
    }
}
