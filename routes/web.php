<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\DirectorioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/**
 * Rutas de directorios
 */


Route::get('/directorios', [DirectorioController::class, 'index'])->name('directorios.index');

Route::get('/directorios/crear', [DirectorioController::class, 'create'])->name('directorios.create');

Route::post('/directorios/store', [DirectorioController::class, 'store'])->name('directorios.store');

Route::get('/directorios/buscar', [DirectorioController::class, 'search'])->name('directorios.search');

Route::post('/directorios/ask', [DirectorioController::class, 'ask'])->name('directorios.ask');

Route::get('/directorios/eliminar/{id}', [DirectorioController::class, 'delete'])->name('directorios.delete');

Route::get('/directorios/destroy/{id}', [DirectorioController::class, 'destroy'])->name('directorios.destroy');

/**
 * Rutas de contactos
 */

Route::get('/contactos/{id}', [ContactoController::class, 'show'])->name('contactos.show');

Route::get('/contactos/create/{id}', [ContactoController::class, 'create'])->name('contactos.create');

Route::post('/contactos/store', [ContactoController::class, 'store'])->name('contactos.store');

Route::get('/contactos/delete/{id}', [ContactoController::class, 'delete'])->name('contactos.delete');

Route::get('/contactos/destroy/{id}', [ContactoController::class, 'destroy'])->name('contactos.destroy');




