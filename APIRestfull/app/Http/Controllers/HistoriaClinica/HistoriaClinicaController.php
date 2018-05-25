<?php

namespace App\Http\Controllers\HistoriaClinica;

use App\Historia_clinica;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class HistoriaClinicaController extends ApiController
{

    public function __construct(){

        $this->middleware('client.credentials')->only(['index', 'show']);
    }



   public function index()
    {
        $historia = Historia_clinica::where("Estado", "<>", 0)->get();
        
        if(empty($historia)){
            return $this->errorResponse('Datos no encontrados', 404);
        }
        return $this->showAll($historia, 200);
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
        $historia = Historia_clinica::create($data); 

        return $this->showOne($historia, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $historia = Historia_clinica::findOrFail($id);
        return $this->showOne($historia, 200);
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
        
        $historia = Historia_clinica::findOrFail($id);
        $campos = $request->all();

        $historia->Cardiovasculares    = empty($campos['Cardiovasculares']) 
                                        ? $historia->Cardiovasculares
                                        : $campos['Cardiovasculares'];

        $historia->Pulmonares = empty($campos['Pulmonares']) 
                                        ? $historia->Pulmonares
                                        : $campos['Pulmonares'];

        $historia->Digestivos = empty($campos['Digestivos']) 
                                        ? $historia->Digestivos
                                        : $campos['Digestivos'];
        
        $historia->Diabetes    = empty($campos['Diabetes']) 
                                        ? $historia->Diabetes
                                        : $campos['Diabetes'];
        $historia->Renales    = empty($campos['Renales']) 
                                        ? $historia->Renales
                                        : $campos['Renales'];

        $historia->Quirurjicos = empty($campos['Quirurjicos']) 
                                        ? $historia->Quirurjicos
                                        : $campos['Quirurjicos'];

        $historia->Alergicos = empty($campos['Alergicos']) 
                                        ? $historia->Alergicos
                                        : $campos['Alergicos'];
        
        $historia->Transfuncionales    = empty($campos['Transfuncionales']) 
                                        ? $historia->Transfuncionales
                                        : $campos['Transfuncionales'];

        $historia->Medicamentos    = empty($campos['Medicamentos']) 
                                        ? $historia->Medicamentos
                                        : $campos['Medicamentos'];

        $historia->Espesifique = empty($campos['Espesifique']) 
                                        ? $historia->Espesifique
                                        : $campos['Espesifique'];

        $historia->Alcohol = empty($campos['Alcohol']) 
                                        ? $historia->Alcohol
                                        : $campos['Alcohol'];
        
        $historia->Tabaquismo    = empty($campos['Tabaquismo']) 
                                        ? $historia->Tabaquismo
                                        : $campos['Tabaquismo'];

        $historia->Drogas    = empty($campos['Drogas']) 
                                        ? $historia->Drogas
                                        : $campos['Drogas'];

        $historia->Inmunizadores = empty($campos['Inmunizadores']) 
                                        ? $historia->Inmunizadores
                                        : $campos['Inmunizadores'];

        $historia->Otros_adicciones = empty($campos['Otros_adicciones']) 
                                        ? $historia->Otros_adicciones
                                        : $campos['Otros_adicciones'];
        
        $historia->Padre_vivo    = empty($campos['Padre_vivo']) 
                                        ? $historia->Padre_vivo
                                        : $campos['Padre_vivo'];

        $historia->Enfermedades_padre    = empty($campos['Enfermedades_padre']) 
                                        ? $historia->Enfermedades_padre
                                        : $campos['Enfermedades_padre'];

        $historia->Madre_vivo = empty($campos['Madre_vivo']) 
                                        ? $historia->Madre_vivo
                                        : $campos['Madre_vivo'];

        $historia->Enfermedades_madre = empty($campos['Enfermedades_madre']) 
                                        ? $historia->Enfermedades_madre
                                        : $campos['Enfermedades_madre'];
        
        $historia->Hermanos_cantidad    = empty($campos['Hermanos_cantidad']) 
                                        ? $historia->Hermanos_cantidad
                                        : $campos['Hermanos_cantidad'];

        $historia->Enfermedades_hermanos    = empty($campos['Enfermedades_hermanos']) 
                                        ? $historia->Enfermedades_hermanos
                                        : $campos['Enfermedades_hermanos'];

        $historia->Hermanos_otro = empty($campos['Hermanos_otro']) 
                                        ? $historia->Hermanos_otro
                                        : $campos['Hermanos_otro'];

        $historia->Menarquia = empty($campos['Menarquia']) 
                                        ? $historia->Menarquia
                                        : $campos['Menarquia'];
        
        $historia->Ritmo    = empty($campos['Ritmo']) 
                                        ? $historia->Ritmo
                                        : $campos['Ritmo'];

        $historia->F_U_M = empty($campos['F_U_M']) 
                                        ? $historia->F_U_M
                                        : $campos['F_U_M'];
        
        $historia->G    = empty($campos['G']) 
                                        ? $historia->G
                                        : $campos['G'];

        $historia->P    = empty($campos['P']) 
                                        ? $historia->P
                                        : $campos['P'];

        $historia->A = empty($campos['A']) 
                                        ? $historia->A
                                        : $campos['A'];

        $historia->C = empty($campos['C']) 
                                        ? $historia->C
                                        : $campos['C'];
        
        $historia->I_V_S_A    = empty($campos['I_V_S_A']) 
                                        ? $historia->I_V_S_A
                                        : $campos['I_V_S_A'];


        $historia->Metodos_anticonceptiovos = empty($campos['Metodos_anticonceptiovos']) 
                                        ? $historia->Metodos_anticonceptiovos
                                        : $campos['Metodos_anticonceptiovos'];
        
        $historia->Tipo_metodos_anticonceptivos    = empty($campos['Tipo_metodos_anticonceptivos']) 
                                        ? $historia->Tipo_metodos_anticonceptivos
                                        : $campos['Tipo_metodos_anticonceptivos'];

        $historia->PEEAR    = empty($campos['PEEAR']) 
                                        ? $historia->PEEAR
                                        : $campos['PEEAR'];

        $historia->DNR = empty($campos['DNR']) 
                                        ? $historia->DNR
                                        : $campos['DNR'];

        $historia->DPR = empty($campos['DPR']) 
                                        ? $historia->DPR
                                        : $campos['DPR'];
        
        $historia->I_P_A_S    = empty($campos['I_P_A_S']) 
                                        ? $historia->I_P_A_S
                                        : $campos['I_P_A_S'];


        $historia->TA_derecho    = empty($campos['TA_derecho']) 
                                        ? $historia->TA_derecho
                                        : $campos['TA_derecho'];

        $historia->TA_izquierdo = empty($campos['TA_izquierdo']) 
                                        ? $historia->TA_izquierdo
                                        : $campos['TA_izquierdo'];

        $historia->FC = empty($campos['FC']) 
                                        ? $historia->FC
                                        : $campos['FC'];
        
        $historia->Frecuencia_respiratoria    = empty($campos['Frecuencia_respiratoria']) 
                                        ? $historia->Frecuencia_respiratoria
                                        : $campos['Frecuencia_respiratoria'];

        $historia->Temperatura    = empty($campos['Temperatura']) 
                                        ? $historia->Temperatura
                                        : $campos['Temperatura'];

        $historia->Peso = empty($campos['Peso']) 
                                        ? $historia->Peso
                                        : $campos['Peso'];

        $historia->Talla = empty($campos['Talla']) 
                                        ? $historia->Talla
                                        : $campos['Talla'];
        
        $historia->IMC    = empty($campos['IMC']) 
                                        ? $historia->IMC
                                        : $campos['IMC'];

        $historia->Cabeza_cuello = empty($campos['Cabeza_cuello']) 
                                        ? $historia->Cabeza_cuello
                                        : $campos['Cabeza_cuello'];
        
        $historia->Torax    = empty($campos['Torax']) 
                                        ? $historia->Torax
                                        : $campos['Torax'];

        $historia->Adbomen    = empty($campos['Adbomen']) 
                                        ? $historia->Adbomen
                                        : $campos['Adbomen'];

        $historia->Extremidades = empty($campos['Extremidades']) 
                                        ? $historia->Extremidades
                                        : $campos['Extremidades'];

        $historia->Estado_mental = empty($campos['Estado_mental']) 
                                        ? $historia->Estado_mental
                                        : $campos['Estado_mental'];
        
        $historia->Laboratorio    = empty($campos['Laboratorio']) 
                                        ? $historia->Laboratorio
                                        : $campos['Laboratorio'];


        $historia->Estudios = empty($campos['Estudios']) 
                                        ? $historia->Estudios
                                        : $campos['Estudios'];
        
        $historia->Otros    = empty($campos['Otros']) 
                                        ? $historia->Otros
                                        : $campos['Otros'];

        $historia->Listado_problemas    = empty($campos['Listado_problemas']) 
                                        ? $historia->Listado_problemas
                                        : $campos['Listado_problemas'];

        $historia->idConsulta = empty($campos['idConsulta']) 
                                        ? $historia->idConsulta
                                        : $campos['idConsulta'];

        $historia->idPaciente = empty($campos['idPaciente']) 
                                        ? $historia->idPaciente
                                        : $campos['idPaciente'];

        $historia->idCentro_medico = empty($campos['idCentro_medico']) 
                                        ? $historia->idCentro_medico
                                        : $campos['idCentro_medico'];
                                        
        $historia->Estado     = empty($campos['Estado']) 
                                        ? $historia->Estado
                                        : $campos['Estado'];
        if ($historia->save()){
            return $this->showOne($historia, 201);
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
        
      $historia =  Historia_clinica::findOrFail($id);

      $historia->Estado = Historia_clinica::NO_ACTIVA;

      if(!$historia->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);
    }
}
