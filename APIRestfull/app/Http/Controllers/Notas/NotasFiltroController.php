<?php

namespace App\Http\Controllers\Notas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotasFiltroController extends Controller
{
    public function NotasbyConsultaTipo(){
		$idMedico=$_GET['idMedico'];
		$tipo=$_GET['idMedico'];


		$medico= Medicos::findOrFail($idMedico);
		$notas = Notas::where([])->get();

    }
}
