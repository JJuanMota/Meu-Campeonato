<?php

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

Route::get('/', [App\Http\Controllers\CampeonatoController::class, 'index'])->name('index');
Route::get('/simula', [App\Http\Controllers\CampeonatoController::class, 'simulaCampeonato'])->name('simulaCampeonato');
Route::get('/novo', [App\Http\Controllers\CampeonatoController::class, 'novoCampeonato'])->name('novoCampeonato');
Route::get('/listar', [App\Http\Controllers\CampeonatoController::class, 'listarBlade'])->name('listarBlade');
Route::post('/listaCampeonatos', [App\Http\Controllers\CampeonatoController::class, 'listaCampeonatos'])->name('listaCampeonatos');
Route::post('/createCamp', [App\Http\Controllers\CampeonatoController::class, 'createCampeonato'])->name('createCamp');
Route::post('/geraCampeonato', [App\Http\Controllers\CampeonatoController::class, 'geraCampeonato'])->name('geraCampeonato');
Route::post('/salvaCampeonato', [App\Http\Controllers\CampeonatoController::class, 'salvaCampeonato'])->name('salvaCampeonato');


Auth::routes();

