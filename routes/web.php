<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VehiculoController;
use App\Models\User;

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



// Rutas de Usuarios
Route::get('/users', [UsersController::class, 'index'])->name('users.index');
Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
Route::post('/users', [UsersController::class, 'store'])->name('users.store');
Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UsersController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');


// Rutas de Vehículos
Route::get('/vehiculos', [VehiculoController::class, 'index'])->name('vehiculos.index');
Route::get('/vehiculos/create', [VehiculoController::class, 'create'])->name('vehiculos.create');
Route::post('/vehiculos', [VehiculoController::class, 'store'])->name('vehiculos.store');
Route::get('/vehiculos/{id}/edit', [VehiculoController::class, 'edit'])->name('vehiculos.edit');
Route::put('/vehiculos/{id}', [VehiculoController::class, 'update'])->name('vehiculos.update');
Route::delete('/vehiculos/{id}', [VehiculoController::class, 'destroy'])->name('vehiculos.destroy');


Route::middleware(['auth'])->group(function () {
    // Rutas para ver la lista de vehículos del usuario
    Route::get('/vehiculos/lista-usuario', [VehiculoController::class, 'listaUsuario'])->name('vehiculos.lista_usuario');

    // Ruta para crear un vehículo si el parámetro está activo
    Route::get('/vehiculos/crear-si-activo', [VehiculoController::class, 'crearSiActivo'])->name('vehiculos.crear_si_activo');

    Route::post('/vehiculos/asignar/{users_id}/{vehiculo_id}', [VehiculoController::class, 'asignarVehiculo'])->name('vehiculos.asignar');

});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
