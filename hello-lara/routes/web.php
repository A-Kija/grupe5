<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BebrasController;
use App\Http\Controllers\BarsukasController;
use App\Http\Controllers\BijunasController as B; // sutrumpinam iki B
use App\Http\Controllers\FormController as F;
use App\Http\Controllers\SkaiciusController as S;
use App\Http\Controllers\FarmController as Farm;

use App\Http\Controllers\TruckBrandController as TB;
use App\Http\Controllers\TruckController as T;

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

// GET form
Route::get('/get', [F::class, 'showGetForm']);
Route::get('/get-result', [F::class, 'showSumFromGet'])->name('jono_rezultatas'); // bus perduota ?a=8&b=9

// POST forma
Route::get('/post', [F::class, 'showPostForm']);
Route::post('/post-result', [F::class, 'makeSumFromPost'])->name('formos-apdorojimas'); // bus perduota bodyje
// redirektinam čia:
Route::get('/post-result', [F::class, 'showSumFromPost'])->name('rezultato-rodymas');





Route::get('/sdfdg4fdh6g4fd6fsdafjhsdiufdsa', [F::class, 'fancy']);



// padaryti sumatorių kuri yra POST forma.
// į formą suvedus 8 ir 9
// atsakyme rodytų "8 + 9 = 17"
// po post metodoto turi būti redirectas
// reikia naujo kontrolerio, metodų, routų ir bladų failų

Route::get('/du-skaiciai', [S::class, 'forma2Skaiciai']);
Route::post('/du-skaiciai-rezultatas', [S::class, 'formos2SkaiciaiApdorojimas'])->name('apdorojimas-2');
Route::get('/du-skaiciai-rezultatas', [S::class, 'formos2SkaiciaiRezultatas'])->name('rodymas-2');

// padaryti surinkėją kuris yra POST forma
// į formą suvedus skaičių 7
// rodytų 7
// dar kartą į formą suvedus skaičių 9
// rodytų 7 9
// dar kartą į formą suvedus skaičių 10
// rodytų 7 9 10
// reikia naujo kontrolerio, metodų, routų ir bladų failų
// dar galit pagalvoti apie mygtuką, kuris viską ištrina

Route::get('/trys-skaiciai', [S::class, 'forma3Skaiciai']);
Route::post('/trys-skaiciai-rezultatas', [S::class, 'formos3SkaiciaiApdorojimas'])->name('apdorojimas-3');
Route::get('/trys-skaiciai-rezultatas', [S::class, 'formos3SkaiciaiRezultatas'])->name('rodymas-3');

Route::post('/valyti', [S::class, 'formos3SkaiciaiValymas'])->name('valom-lauka');


// 3 gyvulių CRUD




Route::prefix('/farm')->name('farm-')->group(function () {
    Route::get('/', [Farm::class, 'read'])->name('read');
    Route::get('/create', [Farm::class, 'create'])->name('create');
    Route::post('/', [Farm::class, 'store'])->name('store');
    Route::get('/{id}', [Farm::class, 'show'])->name('show'); // /farm/   farm-show
    Route::get('/{id}/edit', [Farm::class, 'edit'])->name('edit');
    Route::put('/{id}', [Farm::class, 'update'])->name('update'); // /farm/{id} farm-update
    Route::get('/{id}/delete', [Farm::class, 'delete'])->name('delete');
    Route::delete('/{id}', [Farm::class, 'destroy'])->name('destroy');
});

// Sunkvežimių CRUD 2 lentelėms: truck_brands ir trucks

Route::prefix('/truck-brands')->name('truck-brands-')->group(function () {
    Route::get('/', [TB::class, 'index'])->name('index');
    Route::get('/create', [TB::class, 'create'])->name('create');
    Route::post('/', [TB::class, 'store'])->name('store');
    Route::get('/{id}', [TB::class, 'show'])->name('show'); // /truck-brands/   truck-brands-show
    Route::get('/{id}/edit', [TB::class, 'edit'])->name('edit');
    Route::put('/{id}', [TB::class, 'update'])->name('update'); // /truck-brands/{id} truck-brands-update
    Route::get('/{id}/delete', [TB::class, 'delete'])->name('delete');
    Route::delete('/{id}', [TB::class, 'destroy'])->name('destroy');
});

Route::prefix('/trucks')->name('trucks-')->group(function () {
    Route::get('/', [T::class, 'index'])->name('index');
    Route::get('/create', [T::class, 'create'])->name('create');
    Route::post('/', [T::class, 'store'])->name('store');
    Route::get('/{id}', [T::class, 'show'])->name('show'); // /trucks/   trucks-show
    Route::get('/{id}/edit', [T::class, 'edit'])->name('edit');
    Route::put('/{id}', [T::class, 'update'])->name('update'); // /trucks/{id} trucks-update
    Route::get('/{id}/delete', [T::class, 'delete'])->name('delete');
    Route::delete('/{id}', [T::class, 'destroy'])->name('destroy');
});

