<?php

use App\Models\Ambito;
use App\Models\Cliente;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FaltaController;
use App\Http\Controllers\NominaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\VacacionController;
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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/clientes', function () {
    $clientes = Cliente::paginate(10);
    $ambitos = Ambito::all();
    //dd($this->rolConPoderes);
    $rolConPoderes = "superusuario";

    return view('clientes.index', compact('clientes', 'ambitos', 'rolConPoderes'));
})->name('dashboard');

//Route::resource('clientes', ClienteController::class);
//Route::resource('pagos', PagoController::class);
Route::match(['get', 'post'], '/clientes', [ClienteController::class, 'index'])->name('clientes.index');

Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::get('/clientes/register', [ClienteController::class, 'register'])->name('clientes.register');
Route::post('/clientes/store', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{cliente}', [ClienteController::class, 'show'])->name('clientes.show');

Route::group(['middleware' => ['role:superusuario']], function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users/register', [UserController::class, 'register'])->name('users.register');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

    Route::get('/contratos/{cliente}/{contrato}/edit', [ContratoController::class, 'edit'])->name('contratos.edit');
    Route::put('/contratos/{cliente}/{contrato}', [ContratoController::class, 'update'])->name('contratos.update');
    Route::delete('/contratos/{cliente}/{contrato}', [ContratoController::class, 'destroy'])->name('contratos.destroy');

    Route::get('/facturas/{cliente}/{factura}/edit', [FacturaController::class, 'edit'])->name('facturas.edit');
    Route::put('/facturas/{cliente}/{factura}', [FacturaController::class, 'update'])->name('facturas.update');
    Route::delete('/facturas/{cliente}/{factura}', [FacturaController::class, 'destroy'])->name('facturas.destroy');

    Route::get('/proyectos/{cliente}/{proyecto}/edit', [ProyectoController::class, 'edit'])->name('proyectos.edit');
    Route::put('/proyectos/{cliente}/{proyecto}', [ProyectoController::class, 'update'])->name('proyectos.update');
    Route::delete('/proyectos/{cliente}/{proyecto}', [ProyectoController::class, 'destroy'])->name('proyectos.destroy');

    Route::get('/empleados/{empleado}/edit', [EmpleadoController::class, 'edit'])->name('empleados.edit');
    Route::put('/empleados/{empleado}', [EmpleadoController::class, 'update'])->name('empleados.update');
    Route::delete('/empleados/{empleado}', [EmpleadoController::class, 'destroy'])->name('empleados.destroy');

    Route::get('/empleados/{empleado}/nominas/{nomina}/edit', [NominaController::class, 'edit'])->name('nominas.edit');
    Route::put('/empleados/{empleado}/nominas/{nomina}', [NominaController::class, 'update'])->name('nominas.update');
    Route::delete('/empleados/{empleado}/nominas/{nomina}', [NominaController::class, 'destroy'])->name('nominas.destroy');

    Route::get('/empleados/{empleado}/faltas/{falta}/edit', [FaltaController::class, 'edit'])->name('faltas.edit');
    Route::put('/empleados/{empleado}/faltas/{falta}', [FaltaController::class, 'update'])->name('faltas.update');
    Route::delete('/empleados/{empleado}/faltas/{falta}', [FaltaController::class, 'destroy'])->name('faltas.destroy');

    Route::get('/empleados/{empleado}/vacaciones/{vacacion}/edit', [VacacionController::class, 'edit'])->name('vacaciones.edit');
    Route::put('/empleados/{empleado}/vacaciones/{vacacion}', [VacacionController::class, 'update'])->name('vacaciones.update');
    Route::delete('/empleados/{empleado}/vacaciones/{vacacion}', [VacacionController::class, 'destroy'])->name('vacaciones.destroy');
});

Route::get('/contratos/{cliente}', [ContratoController::class, 'index'])->name('contratos.index');
Route::get('/contratos/{cliente}/create', [ContratoController::class, 'create'])->name('contratos.create');
Route::post('/contratos/{cliente}', [ContratoController::class, 'store'])->name('contratos.store');
Route::get('/contratos/{cliente}/{contrato}', [ContratoController::class, 'show'])->name('contratos.show');

Route::get('/facturas/{cliente}', [FacturaController::class, 'index'])->name('facturas.index');
Route::get('/facturas/{cliente}/create', [FacturaController::class, 'create'])->name('facturas.create');
Route::post('/facturas/{cliente}', [FacturaController::class, 'store'])->name('facturas.store');
Route::get('/facturas/{cliente}/{factura}', [FacturaController::class, 'show'])->name('facturas.show');

Route::get('/proyectos/{cliente}', [ProyectoController::class, 'index'])->name('proyectos.index');
Route::get('/proyectos/{cliente}/create', [ProyectoController::class, 'create'])->name('proyectos.create');
Route::post('/proyectos/{cliente}', [ProyectoController::class, 'store'])->name('proyectos.store');
Route::get('/proyectos/{cliente}/{proyecto}', [ProyectoController::class, 'show'])->name('proyectos.show');

Route::post('conceptos',[ConceptoFacturaController::class,'store'])->name('conceptos.store');
Route::post('conceptos/eliminar',[ConceptoFacturaController::class,'eliminar'])->name('conceptos.eliminar');

Route::match(['get', 'post'], '/empleados', [EmpleadoController::class, 'index'])->name('empleados.index');
Route::get('/empleados/create', [EmpleadoController::class, 'create'])->name('empleados.create');
Route::post('/empleados/store', [EmpleadoController::class, 'store'])->name('empleados.store');
Route::get('/empleados/{empleado}', [EmpleadoController::class, 'show'])->name('empleados.show');

Route::get('/empleados/{empleado}/nominas', [NominaController::class, 'index'])->name('nominas.index');
Route::get('/empleados/{empleado}/nominas/create', [NominaController::class, 'create'])->name('nominas.create');
Route::post('/empleados/{empleado}/nominas', [NominaController::class, 'store'])->name('nominas.store');
Route::get('/empleados/{empleado}/nominas/{nomina}', [NominaController::class, 'show'])->name('nominas.show');

Route::get('/empleados/{empleado}/faltas', [FaltaController::class, 'index'])->name('faltas.index');
Route::get('/empleados/{empleado}/faltas/create', [FaltaController::class, 'create'])->name('faltas.create');
Route::post('/empleados/{empleado}/faltas', [FaltaController::class, 'store'])->name('faltas.store');
Route::get('/empleados/{empleado}/faltas/{falta}', [FaltaController::class, 'show'])->name('faltas.show');

Route::get('/empleados/{empleado}/vacaciones', [VacacionController::class, 'index'])->name('vacaciones.index');
Route::get('/empleados/{empleado}/vacaciones/create', [VacacionController::class, 'create'])->name('vacaciones.create');
Route::post('/empleados/{empleado}/vacaciones', [VacacionController::class, 'store'])->name('vacaciones.store');
Route::get('/empleados/{empleado}/vacaciones/{vacacion}', [VacacionController::class, 'show'])->name('vacaciones.show');
<<<<<<< HEAD
=======

Route::get('/clientes/{cliente}/pagos',[PagoController::class,'index'])->name('pagos.index');
Route::post('/clientes/{cliente}/pagos',[PagoController::class,'store'])->name('pagos.store');
Route::post('/clientes/{cliente}/pagos/{pago}',[PagoController::class,'destroy'])->name('pagos.destroy');
>>>>>>> refs/remotes/origin/Final
