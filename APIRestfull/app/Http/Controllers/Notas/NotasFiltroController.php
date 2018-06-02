<?php

namespace App\Http\Controllers\Notas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotasFiltroController extends Controller
{
    public function NotasbyConsultaTipo(){
		$idMedico=$_GET['idMedico'];
		$tipo=$_GET['tipo'];
		$idConsulta=$_GET['idConsulta'];


		$medico= Medicos::findOrFail($idMedico);
		$notas = Notas::where([["idConsulta","=",$idConsulta],["tipo","=",$tipo],["idMedico","=",$idMedico]])->get();
		return $this->showAll($notas);

    }
}
