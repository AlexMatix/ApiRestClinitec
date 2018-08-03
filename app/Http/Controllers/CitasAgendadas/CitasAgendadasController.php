<?php

namespace App\Http\Controllers\CitasAgendadas;

use App\Citas_agendadas;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class CitasAgendadasController extends ApiController
{
    


   public function index()
    {
        if(empty($_GET['centro']) || empty($_GET['medico']))
            return $this->errorResponse("Datos no encontrados", 404);

        $cita = Citas_agendadas::where([
                ["Estado", "<>", 0],
                ["idCentro_medico", "=", $_GET['centro']],
                ["idMedico", "=", $_GET['medico']]]
                    )->get();
        
        if(empty($cita)){
            return $this->errorResponse('Datos no encontrados', 404);
        }
        return $this->showAll($cita, 200);
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
        $cita = Citas_agendadas::create($data); 

        return $this->showOne($cita, 200);

    }

    /**
     * Display the specified resource.
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $cita = Citas_agendadas::findOrFail($id);
        return $this->showOne($cita, 200);
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
        
        $cita = Citas_agendadas::findOrFail($id);
        $campos = $request->all();

        $cita->Titulo    = empty($campos['Titulo']) 
                                        ? $cita->Titulo
                                        : $campos['Titulo'];

        $cita->Fecha = empty($campos['Fecha']) 
                                        ? $cita->Fecha
                                        : $campos['Fecha'];

        $cita->Hora_inicio = empty($campos['Hora_inicio']) 
                                        ? $cita->Hora_inicio
                                        : $campos['Hora_inicio'];
        
        $cita->Hora_termino    = empty($campos['Hora_termino']) 
                                        ? $cita->Hora_termino
                                        : $campos['Hora_termino'];

        $cita->idPaciente = empty($campos['idPaciente']) 
                                        ? $cita->idPaciente
                                        : $campos['idPaciente'];
        
        $cita->idMedico    = empty($campos['idMedico']) 
                                        ? $cita->idMedico
                                        : $campos['idMedico'];

        $cita->idCentro_medico = empty($campos['idCentro_medico']) 
                                        ? $cita->idCentro_medico
                                        : $campos['idCentro_medico'];
                                        
        $cita->Estado     = empty($campos['Estado']) 
                                        ? $cita->Estado
                                        : $campos['Estado'];
        if ($cita->save()){
            return $this->showOne($cita, 201);
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
        
      $cita =  Citas_agendadas::findOrFail($id);

      $cita->Estado = Citas_agendadas::ELIMINADA;

      if(!$cita->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 403);
      }

      return $this->succesMessaje('Eliminado con exito', 201);
    }

    public function confirmarCita(Request $request)
    {

        if (!$request->has('Paciente') || !$request->has('Medico') || !$request->has('Fecha') || !$request->has('Hora_inicio'))
            return $this->errorResponse('Datos no encontrados', 404);
        $datos = $request->all();
        $cita = Citas_agendadas::where([
            ["idMedico", "=", $datos['Medico']],
            ["idPaciente", "=", $datos['Paciente']],
            ["Fecha", "=", $datos['Fecha']],
            ["Hora_inicio", "=", $datos['Hora_inicio']]
        ])->first();

        $cita->Estado = Citas_agendadas::CONFIRMADA;
        if(!$cita->save())
            return $this->errorResponse("Error al guardar", 403);

        return $this->showList($cita);
    }

    }
