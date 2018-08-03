<?php

namespace App\Http\Controllers\PagoPlazos;

use App\Http\Controllers\ApiController;
use App\Pago_plazos;
use Illuminate\Http\Request;

class PagoPlazosController extends ApiController
{
    
    public function __construct(){

       $this->middleware('client.credentials')->only(['index', 'show']);
    }

    public function index()
    {
        $pago = Pago_plazos::where("Estado", "<>", 0)->get();
        
        if(empty($pago)){
            return $this->errorResponse('Datos no encontrados', 404);
        }
        return $this->showAll($pago, 200);
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
        $pago = Pago_plazos::create($data); 

        return $this->showOne($pago, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $pago = Pago_plazos::findOrFail($id);
        return $this->showOne($pago, 200);
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
        
        $pago = Pago_plazos::findOrFail($id);
        $campos = $request->all();

        $pago->Cantidad_pagos    = empty($campos['Cantidad_pagos']) 
                                        ? $pago->Cantidad_pagos
                                        : $campos['Cantidad_pagos'];

        $pago->Monto_pagos = empty($campos['Monto_pagos']) 
                                        ? $pago->Monto_pagos
                                        : $campos['Monto_pagos'];

        $pago->Dia_corte = empty($campos['Dia_corte']) 
                                        ? $pago->Dia_corte
                                        : $campos['Dia_corte'];
        
        $pago->Pagos    = empty($campos['Pagos']) 
                                        ? $pago->Pagos
                                        : $campos['Pagos'];

        $pago->Fecha_limite = empty($campos['Fecha_limite']) 
                                        ? $pago->Fecha_limite
                                        : $campos['Fecha_limite'];

        $pago->idCaja = empty($campos['idCaja']) 
                                        ? $pago->idCaja
                                        : $campos['idCaja'];


        $pago->idUsuario_sistema = empty($campos['idUsuario_sistema']) 
                                        ? $pago->idUsuario_sistema
                                        : $campos['idUsuario_sistema'];

        $pago->idCentro_medico = empty($campos['idCentro_medico']) 
                                        ? $pago->idCentro_medico
                                        : $campos['idCentro_medico'];
                                        
        $pago->Estado     = empty($campos['Estado']) 
                                        ? $pago->Estado
                                        : $campos['Estado'];
        if ($pago->save()){
            return $this->showOne($pago, 201);
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
        
      $pago =  Pago_plazos::findOrFail($id);

      $pago->Estado = Pago_plazos::NO_ACTIVO;

      if(!$pago->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);
    }
}
