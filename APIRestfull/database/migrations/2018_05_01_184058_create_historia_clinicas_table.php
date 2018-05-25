<?php

use App\Historia_clinica;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriaClinicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historia_clinicas', function (Blueprint $table) {
            $table->increments('id');

            $table->text('Cardiovasculares');
            $table->text('Pulmonares');
            $table->text('Digestivos');
            $table->text('Diabetes');
            $table->text('Renales');
            $table->text('Quirurjicos');
            $table->text('Alergicos');
            $table->text('Transfuncionales');
            $table->text('Medicamentos');
            $table->text('Espesifique');
            $table->text('Alcohol');
            $table->text('Tabaquismo');
            $table->text('Drogas');
            $table->text('Inmunizadores');
            $table->text('Otros_adicciones');
            $table->text('Padre_vivo');
            $table->text('Enfermedades_padre');
            $table->text('Madre_vivo');
            $table->text('Enfermedades_madre');
            $table->text('Hermanos_cantidad');
            $table->text('Enfermedades_hermanos');
            $table->text('Hermanos_otro');
            $table->text('Menarquia');
            $table->text('Ritmo');
            $table->text('F_U_M');
            $table->text('G');
            $table->text('P');
            $table->text('A');
            $table->text('C');
            $table->text('I_V_S_A');
            $table->text('Metodos_anticonceptiovos');
            $table->text('Tipo_metodos_anticonceptivos');
            $table->text('PEEAR');
            $table->text('DNR');
            $table->text('DPR');
            $table->text('I_P_A_S');
            $table->text('TA_derecho');
            $table->text('TA_izquierdo');
            $table->text('FC');
            $table->text('Frecuencia_respiratoria');
            $table->text('Temperatura');
            $table->text('Peso');
            $table->text('Talla');
            $table->text('IMC');
            $table->text('Cabeza_cuello');
            $table->text('Torax');
            $table->text('Adbomen');
            $table->text('Extremidades');
            $table->text('Estado_mental');
            $table->text('Laboratorio');
            $table->text('Estudios');
            $table->text('Otros');
            $table->text('Listado_problemas');

            $table->integer('idConsulta')->unsigned();
            $table->integer('idPaciente')->unsigned();
            $table->integer('idCentro_medico')->unsigned();
            $table->integer('Estado')->unsigned()->default(Historia_clinica::ACTIVA);

            //Laves foraneas
            $table->foreign('idConsulta')->references('id')->on('consultas');
            $table->foreign('idPaciente')->references('id')->on('pacientes');
            $table->foreign('idCentro_medico')->references('id')->on('centro_medico');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historia_clinicas');
    }
}
