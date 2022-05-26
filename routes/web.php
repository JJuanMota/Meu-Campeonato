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

Route::get('/', function () {
    return view('index');
});


Route::get('/novo', [App\Http\Controllers\CampeonatoController::class, 'novoCampeonato'])->name('novoCampeonato');
Route::post('/createCamp', [App\Http\Controllers\CampeonatoController::class, 'novoCampeonato'])->name('createCamp');

