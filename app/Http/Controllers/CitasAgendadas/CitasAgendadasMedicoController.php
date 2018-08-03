<?php

namespace App\Http\Controllers\CitasAgendadas;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Citas_agendadas;
use App\Medicos;

class CitasAgendadasMedicoController extends ApiController
{
	public function citasAgendadasConfirmadas(){
		$idMedico = $_GET['idMedico'];

		$medico = Medicos::findOrFail($idMedico);
		$citasAgendadas = Citas_agendadas::where([["idMedico","=",$medico->id],["Estado","=",Citas_agendadas::CONFIRMADA]])->get();

		return $this->showAll($citasAgendadas);
	}

	public function citasAgendadasNoConfirmadas(){
		$idMedico = $_GET['idMedico'];

		$medico = Medicos::findOrFail($idMedico);
		$citasAgendadas = Citas_agendadas::where([["idMedico","=",$medico->id],["Estado","=",Citas_agendadas::NO_CONFIRMADA]])->get();

		return $this->showAll($citasAgendadas);
	}
	public function citasAgendadasEliminada(){
		$idMedico = $_GET['idMedico'];

		$medico = Medicos::findOrFail($idMedico);

		$citasAgendadas = Citas_agendadas::where([["idMedico","=",$medico->id],["Estado","=",Citas_agendadas::ELIMINADA]])->get();

		return $this->showAll($citasAgendadas);
	}
	public function citasAgendadasAsistido(){
		$idMedico = $_GET['idMedico'];

		$medico = Medicos::findOrFail($idMedico);
		$citasAgendadas = Citas_agendadas::where([["idMedico","=",$medico->id],["Estado","=",Citas_agendadas::ASISTIO]])->get();

		return $this->showAll($citasAgendadas);
	}

	public function citasAgendadasNoAsistida(){
		$idMedico = $_GET['idMedico'];

		$medico = Medicos::findOrFail($idMedico);
		$citasAgendadas = Citas_agendadas::where([["idMedico","=",$medico->id],["Estado","=",Citas_agendadas::NO_ASISTIO]])->get();

		return $this->showAll($citasAgendadas);
	}

	public function citasFechaEstado($estado){
		$idMedico=$_GET['idMedico'];
		$dateInicio= $_GET['dateInicio'];
		$dateFinal=$_GET['dateFinal'];
		$medico = Medicos::findOrFail($idMedico);
		
		$citasAgendadas = Citas_agendadas::where([["idMedico","=",$medico->id],["Estado","=",$estado],
		['Fecha','>=',$dateInicio],['Fecha','<=',$dateFinal]
	])->get();

		return $this->showAll($citasAgendadas);
	}
}
