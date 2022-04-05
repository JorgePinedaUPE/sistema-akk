<?php

 //COLOCAR SIEMPRE LA REFERENCIA DEL CONTROLADOR
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\EfemerideController;
use App\Http\Controllers\OfertaCursosController;
use App\Http\Controllers\OfertaServiciosController;
use App\Http\Controllers\RespaldoController;
use App\Http\Controllers\InscripcionesController;
use App\Http\Controllers\ArchivoInController;
use App\Http\Controllers\ArchivoServController;
use App\Http\Controllers\SolicitudServicioController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/empleados',EmpleadoController::class)->middleware('adminAuth');
Route::resource('/cursos',CursoController::class)->middleware('adminAuth');
Route::resource('/servicios',ServicioController::class)->middleware('adminAuth');
Route::resource('/efemerides',EfemerideController::class)->middleware('adminAuth');
Route::resource('/ofertaCursos',OfertaCursosController::class)->middleware('clientAuth');
Route::resource('/ofertaServicios',OfertaServiciosController::class)->middleware('clientAuth');
Route::resource('/respaldoyrecuperacion',RespaldoController::class)->middleware('adminAuth');
Route::resource('/pagosInscripcion',InscripcionesController::class)->middleware('clientAuth');
Route::resource('/pagosServicios',SolicitudServicioController::class)->middleware('clientAuth');

Route::get('/respaldo',[RespaldoController::class,'generar_respaldo'])->middleware('adminAuth');
Route::post('/restauracion',[RespaldoController::class,'restaurar'])->middleware('adminAuth');
Route::get('/ofertaCursos/create/{curso}',[OfertaCursosController::class,'inscripcion'])->name('Curso.inscripcion')->middleware('clientAuth');
Route::get('/ofertaServicios/create/{servicio}',[OfertaServiciosController::class,'solicitud'])->name('Servicio.solicitud')->middleware('clientAuth');
Route::resource('/archivoInscripciones',ArchivoInController::class)->middleware('adminAuth');
Route::resource('/archivoSolicitudes',ArchivoServController::class)->middleware('adminAuth');

//Rutas para la generacion de reportes
Route::get('/pdfEmpleados', [EmpleadoController::class,'pdf'])->name('empleados.pdf');
Route::get('/excelEmpleados', [EmpleadoController::class,'excel'])->name('empleados.excel');
Route::get('/pdfCursos', [CursoController::class,'pdf'])->name('cursos.pdf');
Route::get('/excelCursos', [CursoController::class,'excel'])->name('cursos.excel');
Route::get('/pdfServicios', [ServicioController::class,'pdf'])->name('servicios.pdf');
Route::get('/excelServicios', [ServicioController::class,'excel'])->name('servicios.excel');
Route::get('/pdfInscripcion/{id}', [InscripcionesController::class,'inscPDF'])->name('inscripciones.pdf');
Route::get('/pdfSolicitud/{id}', [SolicitudServicioController::class,'soliPDF'])->name('solicitudes.pdf');


