<?php

namespace App\Http\Controllers\Ingresos;

use App\Http\Controllers\ApiController;
use App\Ingresos;
use Illuminate\Http\Request;

class IngresosController extends ApiController
{
   public function index()
    {
        $ingreso = Ingresos::where("Estado", "<>", 0)->get();
        
        if(empty($ingreso)){
            return $this->errorResponse('Datos no encontrados', 404);
        }
        return $this->showAll($ingreso, 200);
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
        $ingreso = Ingresos::create($data); 

        return $this->showOne($ingreso, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $ingreso = Ingresos::findOrFail($id);
        return $this->showOne($ingreso, 200);
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
        
        $ingreso = Ingresos::findOrFail($id);
        $campos = $request->all();

        $ingreso->Fecha_ingreso    = empty($campos['Fecha_ingreso']) 
                                        ? $ingreso->Fecha_ingreso
                                        : $campos['Fecha_ingreso'];

        $ingreso->Fecha_egreso = empty($campos['Fecha_egreso']) 
                                        ? $ingreso->Fecha_egreso
                                        : $campos['Fecha_egreso'];

        $ingreso->idCama = empty($campos['idCama']) 
                                        ? $ingreso->idCama
                                        : $campos['idCama'];

       $ingreso->idPaciente    = empty($campos['idPaciente']) 
                                        ? $ingreso->idPaciente
                                        : $campos['idPaciente'];
                                        
        $ingreso->idCentro_medico = empty($campos['idCentro_medico']) 
                                        ? $ingreso->idCentro_medico
                                        : $campos['idCentro_medico'];

        $ingreso->Estado     = empty($campos['Estado']) 
                                        ? $ingreso->Estado
                                        : $campos['Estado'];
        if ($ingreso->save()){
            return $this->showOne($ingreso, 201);
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
        
      $ingreso =  Ingresos::findOrFail($id);

      $ingreso->Estado = Ingresos::NO_ACTIVO;

      if(!$ingreso->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);
    }
}
