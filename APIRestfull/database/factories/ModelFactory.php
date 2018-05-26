<?php

use App\Almacenes;
use App\Cajas;
use App\Centro_medico;
use App\Cirugias;
use App\Consultas;
use App\Enfermeras;
use App\Farmacias;
use App\Medicos;
use App\Pacientes;
use App\Recetas;
use App\Suscripciones;
use App\Urgencias;
use App\User;


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
/*
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'lastName' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});*/

$factory->define(Centro_medico::class, function (Faker\Generator $faker) {

    return [
        'Nombre'    => $faker->lastName,
        'Direccion' => $faker->state,
        'Tipo_centro_medico' => $faker->randomElement(['Hospital', 'Clinica', 'Consultorio']),
    ];
});

$factory->define(Medicos::class, function (Faker\Generator $faker) {

	$Centro_medico = Centro_medico::all()->random();

    return [
        'Nombre'           => $faker->lastName,
        'Apellidos' 	   => $faker->lastName,
    	'Especialidad'     => $faker->company,
        'Sexo'    	       => $faker->randomElement([Medicos::MALE, Medicos::FEMALE]),
        'Edad' 		       => $faker->numberBetween($min = 20, $max = 40),
        'Cedula' 	       => str_random(10),
        'Direccion' 	   => $faker->state,
        'idCentro_medico'  => $Centro_medico->id,
        'Estado' 		   => $faker->randomElement([Medicos::ACTIVO, Medicos::NO_ACTIVO]),

    ];
});

$factory->define(Enfermeras::class, function (Faker\Generator $faker) {

	$Centro_medico = Centro_medico::all()->random();

    return [
        'Nombre'           => $faker->lastName,
        'Apellido' 		   => $faker->lastName,
        'Sexo'    	       => $faker->randomElement([Medicos::MALE, Medicos::FEMALE]),
        'Edad' 		       => $faker->numberBetween($min = 20, $max = 40),
        'Cedula' 	       => str_random(10),
        'Direccion' 	   => $faker->state,
        'idCentro_medico' => $Centro_medico->id,
        'Estado' 		   => $faker->randomElement([Enfermeras::ACTIVA, Enfermeras::NO_ACTIVA]),

    ];
});


$factory->define(Pacientes::class, function (Faker\Generator $faker) {

	$Centro_medico = Centro_medico::all()->random();

    return [
        'Nombre'            => $faker->lastName,
        'Apellidos' 		=> $faker->lastName,
        'Telefono' 		    => $faker->randomElement(['2221714946', '2461034037', '2221034037']),
        'Sexo'    	        => $faker->randomElement([Medicos::MALE, Medicos::FEMALE]),
        'Edad' 		        => $faker->numberBetween($min = 20, $max = 40),
        'Direccion' 	    => $faker->state,
        'Tipo_sangre' 	    => str_random(4),
        'idCentro_medico'  => $Centro_medico->id,
        'Fecha_inscripcion' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'Estado' 		    => $faker->randomElement([Pacientes::ACTIVO, Pacientes::NO_ACTIVO]),

    ];
});



$factory->define(User::class, function (Faker\Generator $faker) {
	static $password;

    return [
        'user' 		          => $email = $faker->safeEmail,
        'password' 			  => $password ?: $password = bcrypt('secret'),//'secret',
        'email' 			  => $email, 
        'Fecha_registro' 	  => $faker->date,
        'Token_verificacion'  => User::generateToken(),
        'Verificada'		  => $faker->randomElement([User::VERIFICADA, User::NO_VERIFICADA]),
        'idCentro_medico'     => $faker->numberBetween($min = 0, $max = 50),
        'idMedico' 		      => $faker->numberBetween($min = 0, $max = 50),
        'idEnfermera'         => $faker->numberBetween($min = 0, $max = 50),
        'idPaciente'          => $faker->numberBetween($min = 0, $max = 50),
        'idTipo_usuario'      => $faker->randomElement([User::SUPERADMIN, User::ADMINISTRADOR, User::MEDICO, User::ENFERMERA, User::PACIENTE, User::CAJERO]),
        'Estado'              => $faker->randomElement([User::ACTIVA, User::NO_ACTIVA]),

    ];
});


$factory->define(Suscripciones::class, function (Faker\Generator $faker) {
	$Centro_medico = Centro_medico::all()->random();

    return [
        'Tipo_suscripcion'   => $faker->numberBetween($min = 1, $max = 3),
        'Nombre_persona'     => $faker->lastName,
        'Apellidos_persona'  => $faker->lastName,
        'Fecha_inscripcion'  => $faker->date($format = 'Y-m-d', $max = 'now'),
        'Cedula'             => str_random(10),
        'idCentro_medico'    => $Centro_medico->id,
        'idUsuarios_sistema' => $faker->numberBetween($min = 0, $max = 50),
        'Estado'             => $faker->randomElement([Suscripciones::ACTIVA, Suscripciones::SUSPENDIDA, Suscripciones::ELIMINADA]),
    ];
});

$factory->define(Cirugias::class, function (Faker\Generator $faker) {
    $Centro_medico = Centro_medico::all()->random();

    return [
        'Nombre'          => $faker->randomElement(['Vesicula','Riñon','Vasectomia','Cerebro','Pulmon']),
        'Riesgos'         => $faker->randomElement([Cirugias::NINGUNO, Cirugias::POCO, Cirugias::NORMAL, Cirugias::RIESGOSA]),
        'Costos'          => $faker->numberBetween($min = 200, $max = 400),
        'Duracion'        => $faker->numberBetween($min = 40, $max = 100),
        'idCentro_medico' => $Centro_medico->id,
        'Estado'          => $faker->randomElement([Cirugias::ACTIVA, Cirugias::NO_ACTIVA]),
    ];
});

$factory->define(Almacenes::class, function (Faker\Generator $faker) {
    $Centro_medico = Centro_medico::all()->random();

    return [
        'Nombre'          => $faker->name,
        'Direccion'       => $faker->address,
        'Descricion'      => $faker->text,
        'idCentro_medico' => $Centro_medico->id,
        'Estado'          => $faker->randomElement([Almacenes::ACTIVO, Almacenes::NO_ACTIVO]),
    ];
});

$factory->define(Farmacias::class, function (Faker\Generator $faker) {
    $Centro_medico = Centro_medico::all()->random();
    $Almacen = Almacenes::all()->random();

    return [
        'Nombre_marca'       => $faker->randomElement(['Genoprasol','Clorox','Aspirina','Buscapina']),
        'Nombre_compuesto'   => $faker->randomElement(['Penisilina','Paracetamol','Sodio','Mitrozin']),
        'Precentacion'       => $faker->randomElement(['Gotas','Pastillas','Jarabe','Suspencion','Tabletas']),
        'Descripcion'        => $faker->text($maxNbChars = 20),
        'Precio'             => $faker->numberBetween($min = 40, $max = 100),
        'Cantidad'           => $faker->numberBetween($min = 40, $max = 100),
        'Codigo_barras'      => str_random(10),
        'Lote'               => $faker->numberBetween($min = 10, $max = 30),
        'Caducidad'          => $faker->year($max = 'now'),
        'Dosis_precentacion' => $faker->numberBetween($min = 50, $max = 500),
        'idCentro_medico'    => $Centro_medico->id,
        'idAlmacen'          => $Almacen->id,
        'Estado'             => $faker->randomElement([Farmacias::EXISTENTE, Farmacias::NO_EXISTENTE]),
    ];
});

$factory->define(Cajas::class, function (Faker\Generator $faker) {
    $Centro_medico = Centro_medico::all()->random();
    $Paciente      = Pacientes::all()->random();
    $Usuario       = User::all()->random();

    return [
        'Monto'             => $faker->numberBetween($min = 4000, $max = 10000),
        'Fecha'             => date("Y-m-d"),
        'idUsuario_sistema' => $Usuario->id,
        'idPaciente'        => $Paciente->id,
        'idCentro_medico'   => $Centro_medico->id,
        'Estado'            => $faker->randomElement([Cajas::NO_PAGADO, Cajas::PAGADO, Cajas::PAGO_A_PLAZO, Cajas::PAGO_ELIMINADO]),
    ];
});


$factory->define(Consultas::class, function (Faker\Generator $faker) {
    $Centro_medico = Centro_medico::all()->random();
    $Paciente      = Pacientes::all()->random();
    $Medico        = Medicos::all()->random();

    return [
        'Peso'                 => $faker->numberBetween($min = 20, $max = 100),
        'Talla'                => $faker->numberBetween($min = 20, $max = 100),
        'Perimetro_cefalitico' => $faker->numberBetween($min = 20, $max = 100),
        'Perimetro_Torasico'   => $faker->numberBetween($min = 20, $max = 100),
        'Fecha'                => date("Y-m-d"),
        'Costo'                => $faker->numberBetween($min = 500, $max = 1000),
        'idMedico'             => $Medico->id,
        'idPaciente'           => $Paciente->id,
        'idCentro_medico'      => $Centro_medico->id,
        'Estado'               => $faker->randomElement([Consultas::NO_ACTIVO, Consultas::ACTIVO]),
    ];
});


$factory->define(Recetas::class, function (Faker\Generator $faker) {
    $Centro_medico = Centro_medico::all()->random();
    $Consultas     = Consultas::all()->random();

    return [
        'Titulo'           => $faker->name,
        'Descripcion'      => $faker->text($maxNbChars = 20), 
        'Medicamentos'     => $faker->randomElement(["{'id' : 10}","{'id' : 20}","{'id' : 30}"]),
        'idConsulta'       => $Consultas->id,
        'idCentro_medico'  => $Centro_medico->id,
        'Estado'           => $faker->randomElement([Recetas::NO_ACTIVO, Recetas::ACTIVO]),
    ];
});

$factory->define(Urgencias::class, function (Faker\Generator $faker) {
    $Paciente      = Pacientes::all()->random();
    $Centro_medico = Centro_medico::all()->random();

    $date = date("Y-m-d");
    return [
        'Motivo'           => $faker->randomElement(['Se callo', 'No tiene pito']),
        'Prioridad'        => $faker->randomElement([['Grave','baja']]),
        'Fecha_ingreso'    => $date,
        'Fecha_egreso'     => "2020-12-12",
        'idPaciente'       => $Paciente->id,
        'idCentro_medico'  => $Centro_medico->id,
        'Estado'           => $faker->randomElement([Urgencias::NO_ACTIVO, Urgencias: :ACTIVO]), s
    ];
});