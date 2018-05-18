<?php

namespace App\Http\Controllers\Traslados;

use App\Http\Controllers\ApiController;
use App\Traslados;
use Illuminate\Http\Request;

class TrasladosController extends ApiController
{

    public function __construct(){

        $this->middleware('client.credentials')->only(['index', 'show']);
    }

    public function index()
    {
        $traslado = Traslados::where("Estado", "<>", 0)->get();
        
        if(empty($traslado)){
            return $this->errorResponse('Datos no encontrados', 404);
        }
        return $this->showAll($traslado, 200);
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
        $traslado = Traslados::create($data); 

        return $this->showOne($traslado, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $traslado = Traslados::findOrFail($id);
        return $this->showOne($traslado, 200);
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
        
        $traslado = Traslados::findOrFail($id);
        $campos = $request->all();

        $traslado->Fecha_traslado    = empty($campos['Fecha_traslado']) 
                                        ? $traslado->Fecha_traslado
                                        : $campos['Fecha_traslado'];

        $traslado->idCama = empty($campos['idCama']) 
                                        ? $traslado->idCama
                                        : $campos['idCama'];

        $traslado->idPaciente = empty($campos['idPaciente']) 
                                        ? $traslado->idPaciente
                                        : $campos['idPaciente'];

        $traslado->idCentro_medico = empty($campos['idCentro_medico']) 
                                        ? $traslado->idCentro_medico
                                        : $campos['idCentro_medico'];

        $traslado->Estado     = empty($campos['Estado']) 
                                        ? $traslado->Estado
                                        : $campos['Estado'];
        if ($traslado->save()){
            return $this->showOne($traslado, 201);
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
        
      $traslado =  Traslados::findOrFail($id);

      $traslado->Estado = Traslados::NO_ACTIVO;

      if(!$traslado->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);
    }
}
