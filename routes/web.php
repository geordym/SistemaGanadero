<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AnimalController;
use App\Http\Controllers\GanaderoController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\VacunaController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;


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
    // Redirige a la ruta '/home'
    return redirect('/home');
});

Auth::routes();

Route::middleware([AdminMiddleware::class])->group(function () {
    //Animales Routes
    Route::get('/animales/buscar', [AnimalController::class, 'searchAnimal'])->name('animales.buscar');
    Route::post('/animales/buscar', [AnimalController::class, 'findByCode'])->name('animales.findByCode');
    Route::resource('/animales', AnimalController::class);


    //Ganaderos Routes
    Route::get('/ganaderos/asignacion', [GanaderoController::class, 'asignacion'])->name('ganaderos.asignacion');
    Route::post('/ganaderos/asignar', [GanaderoController::class, 'asignar'])->name('ganaderos.asignar');
    Route::resource('/ganaderos', GanaderoController::class);

    //ADMIN
    Route::get('/admin/dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/users', [App\Http\Controllers\UserController::class, 'users'])->name('admin.users');
    Route::post('/admin/users', [App\Http\Controllers\UserController::class, 'create'])->name('admin.users.create');


});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('admin.logout');







//Ganadero Client Routes
Route::get('/ganadero/animales', [GanaderoController::class, 'animales'])->name('ganadero.animales');
Route::get('/ganadero/animales/galera/{idanimal}', [GanaderoController::class, 'editgalera'])->name('ganadero.editgalera');
Route::put('/ganadero/animales/galera', [GanaderoController::class, 'updategalera'])->name('ganadero.updategalera');
Route::get('/ganadero/animales/vacunas/{idanimal}', [GanaderoController::class, 'vacunas'])->name('ganadero.vacunas');

//Vacunas
Route::get('/vacunas/{idanimal}', [VacunaController::class, 'show'])->name('vacunas.show');
Route::get('/vacunas/create/{idanimal}', [VacunaController::class, 'create'])->name('vacunas.create');
Route::post('/vacunas/create', [VacunaController::class, 'store'])->name('vacunas.store');


//Servicios
Route::get('/servicios/{idanimal}', [ServicioController::class, 'show'])->name('servicios.show');
Route::get('/servicios/create/{idanimal}', [ServicioController::class, 'create'])->name('servicios.create');
Route::post('/servicios/create', [ServicioController::class, 'store'])->name('servicios.store');



//Informes Routes
Route::get('/informes', [InformeController::class, 'index'])->name('informes.index');
Route::get('/informes/ganaderos', [InformeController::class, 'informeganaderos'])->name('informes.informeganaderos');
Route::get('/informes/animales', [InformeController::class, 'informeanimales'])->name('informes.informeanimales');
Route::get('/informes/animal/{id}', [InformeController::class, 'informeanimal'])->name('informes.informeanimal');







/*CHANGE PASSWORD ROUTES */
Route::get('/change-password', [App\Http\Controllers\ChangePasswordController::class, 'showChangePasswordForm'])->name('password.change');
Route::post('/change-password', [App\Http\Controllers\ChangePasswordController::class, 'changePassword']);
