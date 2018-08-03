<?php

namespace App\Http\Controllers\Cajas;

use App\Cajas;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class CajasController extends ApiController
{
    
    public function __construct(){

        $this->middleware('client.credentials')->only(['index', 'show']);
    }


    public function index()
    {
       $caja = Cajas::where("Estado", "<>", 0)->get();
        
        if(empty($caja)){
            return $this->errorResponse('Datos no encontrados', 404);
        }
        return $this->showAll($caja, 200);
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
      $cajas = Cajas::create($data); 

        return $this->showOne($cajas, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cajas $caja)
    {
        return $this->showOne($caja, 200);
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
        $caja = Cajas::findOrFail($id);
        $campos = $request->all();

        $caja->Monto  = empty($campos['Monto']) 
                                        ? $caja->Monto
                                        : $campos['Monto'];

        $caja->Fecha = empty($campos['Fecha']) 
                                        ? $caja->Fecha
                                        : $campos['Fecha'];

        $caja->idUsuario_sistema = empty($campos['idUsuario_sistema']) 
                                        ? $caja->idUsuario_sistema
                                        : $campos['idUsuario_sistema'];
 
        $caja->idPaciente = empty($campos['idPaciente']) 
                                        ? $caja->idPaciente
                                        : $campos['idPaciente'];

        $caja->idCentro_medico = empty($campos['idCentro_medico']) 
                                        ? $caja->idCentro_medico
                                        : $campos['idCentro_medico'];

        $caja->Estado     = empty($campos['Estado']) 
                                        ? $caja->Estado
                                        : $campos['Estado'];
        if ($caja->save()){
            return $this->showOne($caja, 201);
        }

        return $this->errorResponse("Ocurrio algún error intentelo mas tarde", 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cajas $caja)
    {
    
      $caja->Estado = Cajas::PAGO_ELIMINADO;

      if(!$caja->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);
    }
}
