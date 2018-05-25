<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historia_clinica extends Model
{
    CONST NO_ACTIVA = 0;
	CONST ACTIVA 	= 1;

    protected $fillable = 
    [
     'id',
     'Cardiovasculares',
     'Pulmonares',
     'Digestivos',
     'Diabetes',
     'Renales',
     'Quirurjicos',
     'Alergicos',
     'Transfuncionales',
     'Medicamentos',
     'Espesifique',
     'Alcohol',
     'Tabaquismo',
     'Drogas',
     'Inmunizadores',
     'Otros_adicciones',
     'Padre_vivo',
     'Enfermedades_padre',
     'Madre_vivo',
     'Enfermedades_madre',
     'Hermanos_cantidad',
     'Enfermedades_hermanos',
     'Hermanos_otro',
     'Menarquia',
     'Ritmo',
     'F_U_M',
     'G',
     'P',
     'A',
     'C',
     'I_V_S_A',
     'Metodos_anticonceptiovos',
     'Tipo_metodos_anticonceptivos',
     'PEEAR',
     'DNR',
     'DPR',
     'I_P_A_S',
     'TA_derecho',
     'TA_izquierdo',
     'FC',
     'Frecuencia_respiratoria',
     'Temperatura',
     'Peso',
     'Talla',
     'IMC',
     'Cabeza_cuello',
     'Torax',
     'Adbomen',
     'Extremidades',
     'Estado_mental',
     'Laboratorio',
     'Estudios',
     'Otros',
     'Listado_problemas',
     'idConsulta',
     'idPaciente',
     'idCentro_medico',
     'Estado',
    ];


    public $timestamps = false;
}
