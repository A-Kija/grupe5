<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BebrasController;
use App\Http\Controllers\BarsukasController;
use App\Http\Controllers\BijunasController as B; // sutrumpinam iki B
use App\Http\Controllers\FormController as F;

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


Route::get('/bebras', function() {
    return '<h1>Labas bebrai</h1>';
});

Route::get('/pas/barsuka', function () {
    return view('barsukas');
});

// BebrasController::class === App\Http\Controllers\BebrasController

Route::get('/paprastas/bebras', [BebrasController::class, 'paprastasBebras']);
Route::get('/blade/bebras', [BebrasController::class, 'bladeBebras']);

// {spalva} yra kintamasis gali būti bilekas

Route::get('/spalvotas-bebras/{spalva}', [BebrasController::class, 'spalvotasBebras']);


// Sukurti Barsuko kontrolerį, sukurti barsuke kokį nors metodą, kuris ką nors rodo
// Surautinti to kontrolerio metodą route faile
// Patikrinti ar veikia

Route::get('/paprastas/barsukas', [BarsukasController::class, 'paprastasBarsukas']);


// padaryti sumatorių kuris suvedus suma/8/9 rodytų "8 + 9 = 17"
// reikia naujo kontrolerio, metodo, routo ir blade failo

Route::get('/bijunas', [B::class, 'startas']);

Route::get('/get', [F::class, 'showGetForm']);

Route::get('/get/{d1}/{d2}', [F::class, 'showSumFromGet']);
