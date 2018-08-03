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


/********************************* CREA UN SUPER USUARIO********************************/
Route::post('super-usuario','UsuariosSistema\UsuariosSistemaController@CrearSuperUsuario');
Route::post('login-superusuario','UsuariosSistema\LoginSuperUsuario@loginSuperUsuario');
Route::get('user-information/{email}','UsuariosSistema\UsuariosSistemaController@getInformacionUsuario');
/***************************************************************************************/


Route::resource('suscripciones', 'Suscripciones\SuscripcionesController', ['except' => ['create','edit']]);

Route::get('suscripciones-centros-medicos/{Suscripcion}', 'Suscripciones\SuscripcionesCentroMedicoController@SuscripcionXCentroMedico');

Route::resource('farmacia', 'Farmacia\FarmaciaController', ['except' => ['create','edit']]);

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

Route::post('confirmar-cita', 'CitasAgendadas\CitasAgendadasController@confirmarCita');

Route::resource('cirugia-paciente', 'CirugiasPaciente\CirugiasPacienteController', ['except' => ['create','edit']]);

Route::resource('historia', 'HistoriaClinica\HistoriaClinicaController', ['except' => ['create','edi,t']]);

Route::resource('ingreso', 'Ingresos\IngresosController', ['except' => ['create','edit']]);

Route::resource('notas', 'Notas\NotasController', ['except' => ['create','edit']]);

Route::resource('traslados', 'Traslados\TrasladosController', ['except' => ['create','edit']]);

Route::resource('urgencias', 'Urgencias\UrgenciasController', ['except' => ['create','edit']]);

Route::resource('consultas', 'Consultas\ConsultasController', ['except' => ['create','edit']]);

Route::post('oauth/token', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');

Route::post('nueva-suscripcion', 'CentroMedico\CentroMedicoSuscripcionController@newCentroMedicoSuscripcion');

Route::get('ultimas-consultas/{Medico}', 'Consultas\ConsultasMedicoController@ConsutasXMedico');

Route::get('caja-getTotal/{date}','Cajas\CajasOperacionesController@CajasCalculoTotal');

Route::get('availableCama','CamasXPiso\CamaDisponibilidad@isAvailable');

Route::get('login-usuario/{email}', 'UsuariosSistema\LoginUsuario@loginUsuario');

Route::get('notAvailableCama','CamasXPiso\CamaDisponibilidad@isNotAvailable');

Route::get('citas-confirmadas','CitasAgendadas\CitasAgendadasMedicoController@citasAgendadasConfirmadas');

Route::get('citas-noConfirmadas','CitasAgendadas\CitasAgendadasMedicoController@citasAgendadasNoConfirmadas');

Route::get('citas-eliminadas','CitasAgendadas\CitasAgendadasMedicoController@citasAgendadasEliminada');

Route::get('citas-asistidas','CitasAgendadas\CitasAgendadasMedicoController@citasAgendadasAsistido');

Route::get('citas-noAsistidas','CitasAgendadas\CitasAgendadasMedicoController@citasAgendadasNoAsistida');

Route::get('citas-fecha-estado/{estado}','CitasAgendadas\CitasAgendadasMedicoController@citasFechaEstado');

Route::get('notas-by-consulta-tipo','Notas\NotasFiltroController@NotasbyConsultaTipo');

Route::get('consultas-paciente/{paciente}','Consultas\ConsultasMedicoController@ConsultasXPaciente');

Route::get('ultimas-cirugias/{CentroMedico}','CirugiasPaciente\CirugiasHospitalController@getLastCirugias');

Route::get('notas-by-consulta-tipo','Notas\NotasFiltroController@NotasbyConsultaTipo');

Route::get('recetas-paciente','Recetas\RecetasPacienteController@RecetaByPaciente');

Route::get('traslados-date/{idCentroMedico}','Traslados\TrasladosHospitalController@getLastTraslados');

Route::get('farmacia-loteFechaCompuesto','Farmacia\FarmaciaFiltroController@LoteFechaCompuesto');

Route::get('vacunas-pacienteFecha','VacunasPaciente\VacunasFiltroController@VacunasFiltro');

//Route::post('nueva-consulta','Consultas\ConsultasInsertController@insertConsulta');

Route::post('ultima-receta','Recetas\RecetasController@Ultimareceta');

Route::get('especialidades/{idCentroMedico}','Medicos\MedicosFiltroController@getEspecialidades');

Route::get('pacientes-medicos/{idMedico}', 'Medicos\MedicosFiltroController@getPacientesXMedicos');
/*********************************************************************/
//     RUTES CONECKTA

Route::post('planc','Cobros\CobrosController@newPlan');
Route::put('planc','Cobros\CobrosController@updatePlan');
Route::delete('planc/{id}','Cobros\CobrosController@deletePlan');
Route::get('planc', 'Cobros\CobrosController@getAllPlanes');
Route::get('plancs/{id}','Cobros\CobrosController@getOnePlan');

/*********************************************************************/

/*********************************************************************/
//     RUTES APP

Route::post('guardar-info-medico', 'Medicos\MedicosAppController@SaveInfoApp');
Route::get('obtener-info-medico/{idMedico}', 'Medicos\MedicosAppController@GetInfoApp');
Route::get('pacientes-ingresados','Ingresos\IngresosFiltroController@getAllPacients');
Route::get('paciente-altaUrgencia', 'Urgencias\UrgenciasCentroMedicoController@DardeAltaUrgencia');
Route::get('paciente-altaIngresado', 'Ingresos\IngresosFiltroController@DardeAltaIngresado');
Route::get('pacientes-urgencias', 'Urgencias\UrgenciasCentroMedicoController@UrgenciasXCentroMedicoAll');
/*********************************************************************/


/*********************************************************************/
//  ROUTES AUTOCOMPLETE
Route::get('getEspecialidades', 'Autocomplete\AutocompleteController@getEspecialidades');
Route::get('getLaboratorios', 'Autocomplete\AutocompleteController@getEspecialidades');
Route::get('getEnfermedades', 'Autocomplete\AutocompleteController@getEnfermedades');
Route::get('getMedicinas', 'Autocomplete\AutocompleteController@getMedicinas');

/*********************************************************************/
//Routes CRUD Planes
Route::resource('planes', 'Planes\PlanController', ['except' => ['create','edit']]);

/*********************************************************************/





