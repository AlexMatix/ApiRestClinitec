<?php

namespace App\Http\Controllers\InfrestructuraCentroMedico;

use App\Http\Controllers\ApiController;
use App\Infrestructura_Centro_medico;
use Illuminate\Http\Request;

class InfrestructuraCentroMedicoController extends ApiController
{

    public function __construct(){

        $this->middleware('client.credentials')->only(['index', 'show']);
    }


    public function index()
    {
        $infrestuctura = Infrestructura_Centro_medico::where("Estado", "<>", 0)->get();
        
        if(empty($infrestuctura)){
            return $this->errorResponse('Datos no encontrados', 404);
        }
        return $this->showAll($infrestuctura, 200);
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
        $infrestuctura = Infrestructura_Centro_medico::create($data); 

        return $this->showOne($infrestuctura, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $infrestuctura = Infrestructura_Centro_medico::findOrFail($id);
        return $this->showOne($infrestuctura, 200);
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
        
        $infrestuctura = Infrestructura_Centro_medico::findOrFail($id);
        $campos = $request->all();
        
        $infrestuctura->Infrestructura_centro_medico    = empty($campos['Infrestructura_centro_medico']) 
                                        ? $infrestuctura->Infrestructura_centro_medico
                                        : $campos['Infrestructura_centro_medico'];

        $infrestuctura->idCentro_medico = empty($campos['idCentro_medico']) 
                                        ? $infrestuctura->idCentro_medico
                                        : $campos['idCentro_medico'];
                                        
        $infrestuctura->Estado     = empty($campos['Estado']) 
                                        ? $infrestuctura->Estado
                                        : $campos['Estado'];
        if ($infrestuctura->save()){
            return $this->showOne($infrestuctura, 201);
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
        
      $infrestuctura =  Infrestructura_Centro_medico::findOrFail($id);

      $infrestuctura->Estado = Infrestructura_Centro_medico::NO_ACTIVO;

      if(!$infrestuctura->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);
    }
}