<?php

namespace App\Http\Controllers\CamasXPiso;

use App\Camas_x_piso;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class CamasXPisoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $camas = Camas_x_piso::where("Estado", "<>", 0)->get();

       if(!empty($camas)){
            return $this->showAll($camas);
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
        $data = $request->all();
        $almacen = Almacenes::create($data); 

        return $this->showOne($almacen, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cama = Camas_x_piso::findOrFail($id);
        return $this->showOne($cama);
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
        $cama = Camas_x_piso::findOrFail($id);
        
        $campos = $request->all();

        $cama->Piso    = empty($campos['Piso']) 
                                        ? $cama->Piso
                                        : $campos['Piso'];

        $cama->Seccion = empty($campos['Seccion']) 
                                        ? $cama->Seccion
                                        : $campos['Seccion'];

        $cama->Descripcion = empty($campos['Descripcion']) 
                                        ? $cama->Descripcion
                                        : $campos['Descripcion'];

        $cama->Ocupado = empty($campos['Ocupado']) 
                                        ? $cama->Ocupado
                                        : $campos['Ocupado'];

       $cama->idCentro_medico = empty($campos['idCentro_medico']) 
                                        ? $cama->idCentro_medico
                                        : $campos['idCentro_medico'];

        $cama->Estado     = empty($campos['Estado']) 
                                        ? $cama->Estado
                                        : $campos['Estado'];
        if ($cama->save()){
            return $this->showOne($cama, 201);
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
      
      $cama = Camas_x_piso::findOrFail($id); 
      $cama->Estado = Camas_x_piso::NO_ACTIVA;

      if(!$cama->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);

    }
}
