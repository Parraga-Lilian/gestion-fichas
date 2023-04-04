<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EmpleadoIController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NegocioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\CertificacionesController;
use App\Http\Controllers\CursosRealizadosController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Empleado propio 
Route::get('/', [HomeController::class,'index']);

/* Route::get('/register', [RegisterController::class, 'show']);
Route::post('/action-register', [RegisterController::class, 'register']); */
/*Route::get('/', function () {
    return view('auth.login');
})->name('login');*/

//Route::post('/preguntas', [PreguntaController::class, 'store'])->name('preguntas.store');
//Route::get('certificaciones/{id}/descargar', 'ArchivoController@descargarArchivo')->name('descargar.archivo');
Route::get('cursos/{id}/descargar', [ArchivoController::class, 'descargarCurso'])->name('descargar.archivo');
Route::get('certificaciones/{id}/descargar', [ArchivoController::class, 'descargarCertificacion'])->name('descargar.archivo');


Route::resource('documento',DocumentoController::class)->names('documento');

Route::resource('empleado',EmpleadoController::class)->names('empleado');

Route::resource('negocio',NegocioController::class)->names('negocio');

Route::resource('curso', CursosRealizadosController::class)->names('curso');

Route::resource('evaluacion', EvaluacionController::class)->names('evaluacion');

Route::resource('certificacion', CertificacionesController::class)->names('certificacion');

Route::get('administrador/plantilla',function(){
    return view('documentos.plantillas');
})->name('documentos.plantillas');
//Acerca de
Route::get('/acerca',function(){
    return view('acerca');
})->name('acerca');

//Route::get('/empleadoi/{id}/', [EmpleadoController::class, 'empleadoIEditar'])->name('empleadoi.edit');
//Route::get('/empleadoi', [EmpleadoController::class, 'empleadoIIndex'])->name('empleadoi.index');
//Route::get('/empleadoi/{var}', [EmpleadoController::class, 'soloindice'])->name('empleadoi.index');
Route::get('/empleadoinegocio', [EmpleadoIController::class, 'mostrarNegocio']);
Route::get('/empleadoiplantillas', [EmpleadoIController::class, 'mostrarPlantillas']);
Route::get('/empleadoiacerca', [EmpleadoIController::class, 'mostrarAcerca']);
//Route::get('empleadoi', function(){return view('empleadoi.index');})->name('empleadoi');
//Route::post('empleadoi', function(){return view('empleadoi.index');})->name('empleadoi');

Route::get('/perfil',function(){
    return view('perfil');
})->name('perfil');

Route::resource('/administrador', AdministradorController::class)->names('administrador');
Route::resource('user', UserController::class)->names('user');
Route::resource('empleadoi', EmpleadoIController::class)->names('empleadoi');

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/home', 'HomeController@index')->name('home.index');
    //Route::get('/home', 'LoginController@login')->name('auth.login');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');
        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        //Route::get('/logout',[LogoutController::class],'logout');
    });
});
