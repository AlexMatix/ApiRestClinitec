<?php

namespace App\Http\Controllers\CitasAgendadas;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Citas_agendadas;
use App\Medicos;

class CitasAgendadasMedicoController extends ApiController
{
	public function citasAgendadasConfirmadas(){
		$idmedico = $_GET['idmedico'];

		$medico = Medicos::findOrFail();
		$citasAgendadas = Citas_agendadas::where([["idMedico","=",$medico->id],["Estado","=",Citas_agendadas::CONFIRMADA]])->get();

		return $this->showAll();
	}

	public function citasAgendadasNoConfirmadas(){
		$idmedico = $_GET['idmedico'];

		$medico = Medicos::findOrFail();
		$citasAgendadas = Citas_agendadas::where([["idMedico","=",$medico->id],["Estado","=",Citas_agendadas::NO_CONFIRMADA]])->get();

		return $this->showAll();
	}
	public function citasAgendadasEliminada(){
		$idmedico = $_GET['idmedico'];

		$medico = Medicos::findOrFail();
		$citasAgendadas = Citas_agendadas::where([["idMedico","=",$medico->id],["Estado","=",Citas_agendadas::ELIMINADA]])->get();

		return $this->showAll();
	}
	public function citasAgendadasAsistido(){
		$idmedico = $_GET['idmedico'];

		$medico = Medicos::findOrFail();
		$citasAgendadas = Citas_agendadas::where([["idMedico","=",$medico->id],["Estado","=",Citas_agendadas::ASISTIO]])->get();

		return $this->showAll();
	}

	public function citasAgendadasNoAsistida(){
		$idmedico = $_GET['idmedico'];

		$medico = Medicos::findOrFail();
		$citasAgendadas = Citas_agendadas::where([["idMedico","=",$medico->id],["Estado","=",Citas_agendadas::NO_ASISTIO]])->get();

		return $this->showAll();
	}
}
