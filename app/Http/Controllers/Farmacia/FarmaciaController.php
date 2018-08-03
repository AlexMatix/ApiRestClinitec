<?php

namespace App\Http\Controllers\Farmacia;

use App\Farmacias;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class FarmaciaController extends ApiController
{
    
    public function __construct(){

        $this->middleware('client.credentials')->only(['index', 'show']);
    }


    public function index()
    {
        if(isset($_GET['centro'])){
            $farmacia = Farmacias::where([
                            ["Estado", "<>", 0],
                            ["idCentro_medico","=",$_GET['centro']]])->get();

        }
        
        if(empty($farmacia)){
            return $this->errorResponse('Datos no encontrados', 404);
        }
        return $this->showAll($farmacia, 200);
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
        $farmacia = Farmacias::create($data); 

        return $this->showOne($farmacia, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Farmacias $farmacia)
    {   
        return $this->showOne($farmacia, 200);
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
        
        $farmacia = Farmacias::findOrFail($id);
        $campos = $request->all();

        $farmacia->Nombre_marca    = empty($campos['Nombre_marca']) 
                                        ? $farmacia->Nombre_marca
                                        : $campos['Nombre_marca'];

        $farmacia->Nombre_compuesto = empty($campos['Nombre_compuesto']) 
                                        ? $farmacia->Nombre_compuesto
                                        : $campos['Nombre_compuesto'];

        $farmacia->Precentacion = empty($campos['Precentacion']) 
                                        ? $farmacia->Precentacion
                                        : $campos['Precentacion'];

        $farmacia->Descripcion     = empty($campos['Descripcion']) 
                                        ? $farmacia->Descripcion
                                        : $campos['Descripcion'];
                                        
       $farmacia->Precio    = empty($campos['Precio']) 
                                        ? $farmacia->Precio
                                        : $campos['Precio'];

        $farmacia->Cantidad = empty($campos['Cantidad']) 
                                        ? $farmacia->Cantidad
                                        : $campos['Cantidad'];

        $farmacia->Codigo_barras = empty($campos['Codigo_barras']) 
                                        ? $farmacia->Codigo_barras
                                        : $campos['Codigo_barras'];

        $farmacia->Lote     = empty($campos['Lote']) 
                                        ? $farmacia->Lote
                                        : $campos['Lote'];
        
        $farmacia->Caducidad    = empty($campos['Caducidad']) 
                                        ? $farmacia->Caducidad
                                        : $campos['Caducidad'];

        $farmacia->Dosis_precentacion = empty($campos['Dosis_precentacion']) 
                                        ? $farmacia->Dosis_precentacion
                                        : $campos['Dosis_precentacion'];

        $farmacia->idCentro_medico = empty($campos['idCentro_medico']) 
                                        ? $farmacia->idCentro_medico
                                        : $campos['idCentro_medico'];
        
        $farmacia->idAlmacen = empty($campos['idAlmacen']) 
                                        ? $farmacia->idAlmacen
                                        : $campos['idAlmacen'];

        $farmacia->Estado     = empty($campos['Estado']) 
                                        ? $farmacia->Estado
                                        : $campos['Estado'];
        if ($farmacia->save()){
            return $this->showOne($farmacia, 201);
        }

        return $this->errorResponse("Ocurrio algún error intentelo mas tarde", 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farmacias $farmacia)
    {
        
      $farmacia->Estado = Farmacias::NO_EXISTENTE;

      if(!$farmacia->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);
    }
}
