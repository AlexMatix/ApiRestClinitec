<?php

namespace App\Http\Controllers\Medicos;

use App\Centro_medico;
use App\Medicos;
//use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\DB;

class MedicosFiltroController extends ApiController
{
    public function getEspecialidades($idCentroMedico){
        $CentroMedico = Centro_medico::findOrFail($idCentroMedico);

        if(!isset($_GET['Especialidad'])) {
            $Especialidades = DB::table('medicos')->select('Especialidad')->distinct()->where('idCentro_medico', '=', $CentroMedico->id)->get();
            return $this->showList($Especialidades, 200);
        }
        else{
            $medicos = DB::table('medicos')
                ->join('users', "users.id", "=", "medicos.idUser")
                ->where([
                    ['medicos.Especialidad', 'like', $_GET['Especialidad']],
                    ['medicos.idCentro_medico', '=', $CentroMedico->id],
                    ['medicos.Estado', '=', 1]
                ])
                ->select("medicos.Nombre","medicos.Apellidos","medicos.Especialidad","medicos.Sexo","medicos.Telefono","medicos.Fecha_nacimiento","medicos.Cedula","users.email")
                ->get();

            return $this->showList($medicos, 200);
        }
    }

    public function getPacientesXMedicos($idMedico){

        $medico = Medicos::findOrFail($idMedico);

        $salida = DB::table('medicos')
            ->join('consultas','consultas.idMedico', '=', 'medicos.id')
            ->join('pacientes','consultas.idPaciente', '=', 'pacientes.id')
            ->where([
                ['pacientes.Estado', '<>', 0],
                ['medicos.id','=',$medico->id]
            ])
            ->get();

        return $this->showList($salida);
    }
}
