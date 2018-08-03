<?php

namespace App\Http\Controllers\CamasXPiso;

use App\Camas_x_piso;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class CamasXPisoController extends ApiController
{
    

    public function index()
    {

        if(!isset($_GET['centro']))
            return $this->errorResponse("Centro medico no encontrado", 404);

       
        $camas = Camas_x_piso::where([
            ["Estado", "<>", 0],
            ["idCentro_medico","=",$_GET['centro']]
        ])->get();
       
        return $this->showList($camas, 200);
    }
    

    public function store(Request $request)
    {
        $data = $request->all();
        $almacen = Camas_x_piso::create($data); 

        return $this->showOne($almacen, 200);
    }

   

    public function show($id)
    {
        $cama = Camas_x_piso::findOrFail($id);
        return $this->showOne($cama);
    }

    
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
            return $this->showOne($cama, 200);
        }

        return $this->errorResponse("Ocurrio algun error intentelo mas tarde", 403);
    }

    
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
