<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\CategoriasController;

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


Route::get('/tareasg', [TareasController::class, 'index'])-> name('tareasg');


Route::get('/texto', function () {
    return 'texto';
});


Route::post('/tareasg', [TareasController::class, 'store'])-> name('tareasg');

Route::get('/tareasg/{id}', [TareasController::class, 'show']) -> name('tareas-edit');

Route::patch('/tareasg/{id}', [TareasController::class, 'update']) -> name('tareas-update');

Route::delete('/tareasg/{id}', [TareasController::class, 'delete']) -> name('tareas-delete');


Route::resource('categorias', CategoriasController::class);