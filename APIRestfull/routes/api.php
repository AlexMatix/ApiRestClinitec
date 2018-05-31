<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

//el parametro only solo permite los metodos de su parametro
//Route::resource('suscripciones', 'Suscripciones\SuscripcionesController', ['only' => ['index', 'show']]);
// *************                                 *****************     ***  ['except' => ['create','edit']] excluye los metodos del arreglo
Route::get('breweries', ['middleware' => 'cors', function()
{
    return \Response::json(\App\Brewery::with('beers', 'geocode')->paginate(10), 200);
}]);

Route::resource('suscripciones', 'Suscripciones\SuscripcionesController', ['except' => ['create','edit']]);

Route::resource('centro-medico', 'CentroMedico\CentroMedicoController', ['except' => ['create','edit']]);

Route::resource('medicos', 'Medicos\MedicosController', ['except' => ['create','edit']]);

Route::resource('enfermeras', 'Enfermeras\EnfermerasController', ['except' => ['create','edit']]);

Route::resource('pacientes', 'Pacientes\PacientesController', ['except' => ['create','edit']]);

Route::resource('usuarios', 'UsuariosSistema\UsuariosSistemaController', ['except' => ['create','edit']]);

Route::resource('infrestructura', 'InfrestructuraCentroMedico\InfrestructuraCentroMedicoController');

Route::resource('camas', 'CamasXPiso\CamasXPisoController', ['except' => ['create','edit']]);

Route::resource('tipo-usuario', 'TipoUsuario\TipoUsuarioController', ['except' => ['create','edit']]);

Route::resource('almacenes', 'Almacenes\AlmacenesController', ['except' => ['create','edit']]);

Route::resource('cajas', 'Cajas\CajasController', ['except' => ['create','edit']]);

Route::resource('cirugias', 'Cirugias\CirugiasController', ['except' => ['create','edit']]);

Route::resource('indicaciones', 'Indicaciones\IndicacionesController', ['except' => ['create','edit']]);

Route::resource('pago-plazos', 'PagoPlazos\PagoPlazosController', ['except' => ['create','edit']]);

Route::resource('recetas', 'Recetas\RecetasController', ['except' => ['create','edit']]);

Route::resource('vacunas', 'Vacunas\vacunasController', ['except' => ['create','edit']]);

Route::resource('vacunas-paciente', 'VacunasPaciente\vacunasPacienteController', ['except' => ['create','edit']]);

Route::resource('citas', 'CitasAgendadas\CitasAgendadasController', ['except' => ['create','edit']]);

Route::resource('cirugia-paciente', 'CirugiasPaciente\CirugiasPacienteController', ['except' => ['create','edit']]);

Route::resource('historia', 'HistoriaClinica\HistoriaClinicaController', ['except' => ['create','edit']]);

Route::resource('ingreso', 'Ingresos\IngresosController', ['except' => ['create','edit']]);

Route::resource('notas', 'Notas\NotasController', ['except' => ['create','edit']]);

Route::resource('traslados', 'Traslados\TrasladosController', ['except' => ['create','edit']]);

Route::resource('urgencias', 'Urgencias\UrgenciasController', ['except' => ['create','edit']]);

Route::resource('consultas', 'Consultas\ConsultasController', ['except' => ['create','edit']]);

Route::post('oauth/token', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');

Route::post('nueva-suscripcion', 'CentroMedico\CentroMedicoSuscripcionController@newCentroMedicoSuscripcion');

Route::get('ultimas-consultas/{Medico}', 'Consultas\ConsultasMedicoController@ConsutasXMedico');


Route::get('urgencias-dia/','Urgencias\UrgenciasCentroMedicoController@UrgenciasXCentroMedico');

Route::get('urgencias-fecha/{date}','Urgencias\UrgenciasCentroMedicoController@UrgenciasXCentroMedicoAndDate');

Route::get('caja-getTotal/{date}','Cajas\CajasOperacionesController@CajasCalculoTotal');

Route::get('availableCama','CamasXPiso\CamaDisponibilidad@isAvailable');

Route::get('notAvailableCama','CamasXPiso\CamaDisponibilidad@isNotAvailable');

