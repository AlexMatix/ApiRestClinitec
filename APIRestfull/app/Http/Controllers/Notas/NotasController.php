<?php

namespace App\Http\Controllers\Notas;

use App\Http\Controllers\ApiController;
use App\Notas;
use Illuminate\Http\Request;

class NotasController extends ApiController
{
 
  public function __construct(){

    $this->middleware('client.credentials')->only(['index', 'show']);
  }

  public function index()
    {
        $nota = Notas::where("Estado", "<>", 0)->get();
        
        if(empty($nota)){
            return $this->errorResponse('Datos no encontrados', 404);
        }
        return $this->showAll($nota, 200);
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
        $nota = Notas::create($data); 

        return $this->showOne($nota, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $nota = Notas::findOrFail($id);
        return $this->showOne($nota, 200);
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
        
        $nota = Notas::findOrFail($id);
        $campos = $request->all();

        $nota->Tipo_nota    = empty($campos['Tipo_nota']) 
                                        ? $nota->Tipo_nota
                                        : $campos['Tipo_nota'];
                                        
        $nota->Diagnostico    = empty($campos['Diagnostico']) 
                                        ? $nota->Diagnostico
                                        : $campos['Diagnostico'];

        $nota->Peso = empty($campos['Peso']) 
                                        ? $nota->Peso
                                        : $campos['Peso'];

        $nota->Talla = empty($campos['Talla']) 
                                        ? $nota->Talla
                                        : $campos['Talla'];

       $nota->IMC    = empty($campos['IMC']) 
                                        ? $nota->IMC
                                        : $campos['IMC'];   

       $nota->SC    = empty($campos['SC']) 
                                        ? $nota->SC
                                        : $campos['SC'];

        $nota->SVT = empty($campos['SVT']) 
                                        ? $nota->SVT
                                        : $campos['SVT'];

        $nota->FC = empty($campos['FC']) 
                                        ? $nota->FC
                                        : $campos['FC'];

       $nota->TR    = empty($campos['TR']) 
                                        ? $nota->TR
                                        : $campos['TR'];


       $nota->Temperatura    = empty($campos['Temperatura']) 
                                        ? $nota->Temperatura
                                        : $campos['Temperatura'];   

       $nota->TA    = empty($campos['TA']) 
                                        ? $nota->TA
                                        : $campos['TA'];

        $nota->S02 = empty($campos['S02']) 
                                        ? $nota->S02
                                        : $campos['S02'];

        $nota->Nota = empty($campos['Nota']) 
                                        ? $nota->Nota
                                        : $campos['Nota'];

       $nota->Pronostico    = empty($campos['Pronostico']) 
                                        ? $nota->Pronostico
                                        : $campos['Pronostico'];

        $nota->idPaciente = empty($campos['idPaciente']) 
                                        ? $nota->idPaciente
                                        : $campos['idPaciente'];

        $nota->idMedico = empty($campos['idMedico']) 
                                        ? $nota->idMedico
                                        : $campos['idMedico'];

        $nota->idCentro_medico = empty($campos['idCentro_medico']) 
                                        ? $nota->idCentro_medico
                                        : $campos['idCentro_medico'];

        $nota->Estado     = empty($campos['Estado']) 
                                        ? $nota->Estado
                                        : $campos['Estado'];
        if ($nota->save()){
            return $this->showOne($nota, 201);
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
        
      $nota =  Notas::findOrFail($id);

      $nota->Estado = Notas::NO_ACTIVO;

      if(!$nota->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);
    }
}
