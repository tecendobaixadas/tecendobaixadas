<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JovemController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\OngController;
use App\Http\Controllers\OportunidadeController;
use App\Http\Controllers\DocumentoController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // === Jovens ===
    Route::get('/jovens', [JovemController::class, 'index'])->name('jovens.index');
    Route::get('/jovens/create', [JovemController::class, 'create'])->name('jovens.create');
    Route::post('/jovens', [JovemController::class, 'store'])->name('jovens.store');
    Route::get('/jovens/{jovem}/edit', [JovemController::class, 'edit'])->name('jovens.edit');
    Route::put('/jovens/{jovem}', [JovemController::class, 'update'])->name('jovens.update');
    Route::delete('/jovens/{jovem}', [JovemController::class, 'destroy'])->name('jovens.destroy');

    // === Empresas ===
    Route::get('/empresas', [EmpresaController::class, 'index'])->name('empresas.index');
    Route::get('/empresas/create', [EmpresaController::class, 'create'])->name('empresas.create');
    Route::post('/empresas', [EmpresaController::class, 'store'])->name('empresas.store');
    Route::get('/empresas/{empresa}/edit', [EmpresaController::class, 'edit'])->name('empresas.edit');
    Route::put('/empresas/{empresa}', [EmpresaController::class, 'update'])->name('empresas.update');
    Route::delete('/empresas/{empresa}', [EmpresaController::class, 'destroy'])->name('empresas.destroy');

    // === ONGs ===
    Route::get('/ongs', [OngController::class, 'index'])->name('ongs.index');
    Route::get('/ongs/create', [OngController::class, 'create'])->name('ongs.create');
    Route::post('/ongs', [OngController::class, 'store'])->name('ongs.store');
    Route::get('/ongs/{ong}/edit', [OngController::class, 'edit'])->name('ongs.edit');
    Route::put('/ongs/{ong}', [OngController::class, 'update'])->name('ongs.update');
    Route::delete('/ongs/{ong}', [OngController::class, 'destroy'])->name('ongs.destroy');

    // === Oportunidades ===
    Route::get('/oportunidades', [OportunidadeController::class, 'index'])->name('oportunidades.index');
    Route::get('/oportunidades/create', [OportunidadeController::class, 'create'])->name('oportunidades.create');
    Route::post('/oportunidades', [OportunidadeController::class, 'store'])->name('oportunidades.store');
    Route::get('/oportunidades/{oportunidade}/edit', [OportunidadeController::class, 'edit'])->name('oportunidades.edit');
    Route::put('/oportunidades/{oportunidade}', [OportunidadeController::class, 'update'])->name('oportunidades.update');
    Route::delete('/oportunidades/{oportunidade}', [OportunidadeController::class, 'destroy'])->name('oportunidades.destroy');

    // === Documentos ===
    Route::get('/documentos', [DocumentoController::class, 'index'])->name('documentos.index');
    Route::get('/documentos/create', [DocumentoController::class, 'create'])->name('documentos.create');
    Route::post('/documentos', [DocumentoController::class, 'store'])->name('documentos.store');
    Route::get('/documentos/{documento}/edit', [DocumentoController::class, 'edit'])->name('documentos.edit');
    Route::put('/documentos/{documento}', [DocumentoController::class, 'update'])->name('documentos.update');
    Route::delete('/documentos/{documento}', [DocumentoController::class, 'destroy'])->name('documentos.destroy');
});

require __DIR__.'/auth.php';
