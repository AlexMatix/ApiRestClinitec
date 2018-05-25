<?php

namespace App\Http\Controllers\Almacenes;

use App\Almacenes;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class AlmacenesController extends ApiController
{
    

    public function __construct(){

        $this->middleware('client.credentials')->only(['index', 'show']);
    }


    public function index()
    {
        $almacen = Almacenes::where("Estado", "<>", 0)->get();
        
        if(empty($almacen)){
            return $this->errorResponse('Datos no encontrados', 404);
        }
        return $this->showAll($almacen, 200);
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
        $almacen = Almacenes::findOrFail($id);
        return $this->showOne($almacen, 200);
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
        
        $almacen = Almacenes::findOrFail($id);
        $campos = $request->all();

        $almacen->Nombre    = empty($campos['Nombre']) 
                                        ? $almacen->Nombre
                                        : $campos['Nombre'];

        $almacen->Direccion = empty($campos['Direccion']) 
                                        ? $almacen->Direccion
                                        : $campos['Direccion'];

        $almacen->Descricion = empty($campos['Descricion']) 
                                        ? $almacen->Descricion
                                        : $campos['Descricion'];

        $almacen->Estado     = empty($campos['Estado']) 
                                        ? $almacen->Estado
                                        : $campos['Estado'];
        if ($almacen->save()){
            return $this->showOne($almacen, 201);
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
        
      $almacen =  Almacenes::findOrFail($id);

      $almacen->Estado = Almacenes::NO_ACTIVO;

      if(!$almacen->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);
    }
}
