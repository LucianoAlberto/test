<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ConceptoFacturaController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('clientes', ClienteController::class);
//Route::resource('facturas', FacturaController::class);
//Route::resource('contratos', ContratoController::class);
//Route::resource('proyectos', ProyectoController::class);

//Route::resource('users', UserController::class);
Route::group(['middleware' => ['role:superusuario']], function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::get('clientes/{cliente}/contratos',[ClienteController::class,'contratos'])->name('clientes.contratos');
Route::get('clientes/{cliente}/facturas',[ClienteController::class,'facturas'])->name('clientes.facturas');
Route::get('clientes/{cliente}/proyectos',[ClienteController::class,'proyectos'])->name('clientes.proyectos');

Route::get('clientes/{cliente}/crear-contrato',[ClienteController::class,'crear_contrato'])->name('clientes.crear_contrato');
Route::get('clientes/{cliente}/crear-proyecto',[ProyectoController::class,'create'])->name('proyectos.create');

//Route::get('contratos/{cliente}',[ContratoController::class,'index'])->name('contratos.index');
Route::get('/contratos/{cliente}', [ContratoController::class, 'index'])->name('contratos.index');
Route::get('/contratos/{cliente}/create', [ContratoController::class, 'create'])->name('contratos.create');
Route::post('/contratos/{cliente}', [ContratoController::class, 'store'])->name('contratos.store');
Route::get('/contratos/{cliente}/{contrato}', [ContratoController::class, 'show'])->name('contratos.show');
Route::get('/contratos/{cliente}/{contrato}/edit', [ContratoController::class, 'edit'])->name('contratos.edit');
Route::put('/contratos/{cliente}/{contrato}', [ContratoController::class, 'update'])->name('contratos.update');
Route::delete('/contratos/{cliente}/{contrato}', [ContratoController::class, 'destroy'])->name('contratos.destroy');

Route::get('/facturas/{cliente}', [FacturaController::class, 'index'])->name('facturas.index');
Route::get('/facturas/{cliente}/create', [FacturaController::class, 'create'])->name('facturas.create');
Route::post('/facturas/{cliente}', [FacturaController::class, 'store'])->name('facturas.store');
Route::get('/facturas/{cliente}/{factura}', [FacturaController::class, 'show'])->name('facturas.show');
Route::get('/facturas/{cliente}/{factura}/edit', [FacturaController::class, 'edit'])->name('facturas.edit');
Route::put('/facturas/{cliente}/{factura}', [FacturaController::class, 'update'])->name('facturas.update');
Route::delete('/facturas/{cliente}/{factura}', [FacturaController::class, 'destroy'])->name('facturas.destroy');

Route::get('/proyectos/{cliente}', [ProyectoController::class, 'index'])->name('proyectos.index');
Route::get('/proyectos/{cliente}/create', [ProyectoController::class, 'create'])->name('proyectos.create');
Route::post('/proyectos/{cliente}', [ProyectoController::class, 'store'])->name('proyectos.store');
Route::get('/proyectos/{cliente}/{proyecto}', [ProyectoController::class, 'show'])->name('proyectos.show');
Route::get('/proyectos/{cliente}/{proyecto}/edit', [ProyectoController::class, 'edit'])->name('proyectos.edit');
Route::put('/proyectos/{cliente}/{proyecto}', [ProyectoController::class, 'update'])->name('proyectos.update');
Route::delete('/proyectos/{cliente}/{proyecto}', [ProyectoController::class, 'destroy'])->name('proyectos.destroy');

Route::post('conceptos',[ConceptoFacturaController::class,'store'])->name('conceptos.store');
Route::post('conceptos/eliminar',[ConceptoFacturaController::class,'eliminar'])->name('conceptos.eliminar');

Route::get('/empleados', [EmpleadoController::class, 'index'])->name('empleados.index');
Route::get('/empleados/create', [EmpleadoController::class, 'create'])->name('empleados.create');
Route::post('/empleados', [EmpleadoController::class, 'store'])->name('empleados.store');
Route::get('/empleados/{empleado}', [EmpleadoController::class, 'show'])->name('empleados.show');
Route::get('/empleados/{empleado}/edit', [EmpleadoController::class, 'edit'])->name('empleados.edit');
Route::put('/empleados/{empleado}', [EmpleadoController::class, 'update'])->name('empleados.update');
Route::delete('/empleados/{empleado}', [EmpleadoController::class, 'destroy'])->name('empleados.destroy');
