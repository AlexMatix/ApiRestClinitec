<?php

namespace App\Http\Controllers\Autocomplete;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\DB;

class AutocompleteController extends ApiController
{

    public function getEspecialidades(){

        return $this->showList(
            DB::table('especialidades')->select("*")->get()
        );
    }

    public function getLaboratorios(){
        return $this->showList(
            DB::table('labororatorios')->select("*")->get()
        );
    }
    public function getEnfermedades(){

        if(!empty($_GET['match']))
            if(strlen($_GET['match']) >= 4)
                return $this->showList(
                    DB::table('enfermedades')
                        ->where('Enfermedades','like', '%'.$_GET['match'].'%')
                        ->select("*")
                        ->get()
                );
    }

    public function getMedicinas(){

        if(!empty($_GET['match']))
            if(strlen($_GET['match']) >= 4)
                return $this->showList(
                    DB::table('medicinas')
                        ->where('Compuesto','like', '%'.$_GET['match'].'%')
                        ->select("*")
                        ->get()
                );
    }
}
