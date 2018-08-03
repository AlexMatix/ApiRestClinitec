<?php

namespace App\Http\Controllers\HistoriaClinica;

use App\Historia_clinica;
use App\Http\Controllers\ApiController;
use App\Pacientes;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class HistoriaClinicaController extends ApiController
{

   public function index()
    {

        if(!isset($_GET['centro']))
            return $this->errorResponse("Parametro no encontrado",404);

        $historias = Historia_clinica::where([
                    ["Estado", "<>", 0],
                    ["idCentro_medico", '=', $_GET['centro']]
                ])
                ->get();


        $salida=array();
        foreach ($historias as $key => $historia){
            $Historia_clinica =(array) json_decode($historia->Historia_clinica);
            $Historia_clinica['id'] = $historia->id;
            $Historia_clinica['idPaciente'] = $historia->idPaciente;
            $salida[] = $Historia_clinica;
        }
        return $this->showList($salida, 200);
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
        if(!isset($data['idUsuario']))
            return $this->errorResponse("Usuario no encontrado",404);

        $paciente = Pacientes::findOrFail($data['idUsuario']);

        $newHistoria = new Historia_clinica;

        $newHistoria->idPaciente = $paciente->id;
        $newHistoria->idCentro_medico = $paciente->idCentro_medico;
        $newHistoria->Historia_clinica = json_encode($data);
        $newHistoria->Estado = Historia_clinica::ACTIVA;

        try{
            $newHistoria->save();
        }catch (QueryException $e){
            return $this->errorResponse("No se pudo registrar", 500);
        }

        return $this->showOne($newHistoria, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idPaciente)
    {
        $historias = Historia_clinica::where([
            ["Estado", "<>", 0],
            ["idPaciente", '=', $idPaciente]
        ])->get();

        $salida=array();
        foreach ($historias as $key => $historia){
            $Historia_clinica =(array) json_decode($historia->Historia_clinica);
            $Historia_clinica['id'] = $historia->id;
            $Historia_clinica['idPaciente'] = $historia->idPaciente;
            $salida[] = $Historia_clinica;
        }
        return $this->showList($salida, 200);

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
        $Historia_clinica = Historia_clinica::findOrFail($id);

        $campos = $request->all();

        $Historia_clinica->Historia_clinica = json_encode($campos);
        try{
            $Historia_clinica->save();
        }catch (QueryException $e){
            return $this->errorResponse("Ocurrio algún error intentelo mas tarde", 500);
        }
        return $this->showList($Historia_clinica,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
      $historia =  Historia_clinica::findOrFail($id);

      $historia->Estado = Historia_clinica::NO_ACTIVA;

      if(!$historia->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);
    }
}
