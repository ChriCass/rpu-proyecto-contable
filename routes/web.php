<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
})->middleware('guest'); // Asegúrate de que solo los invitados (no autenticados) puedan acceder

 
Auth::routes();

Route::get('/seleccionar-empresa', [HomeController::class, 'seleccionarEmpresa'])->name('home');


Route::get('/empresa/{id}', [HomeController::class, 'show'])->name('empresa.show');
