<?php

use App\Http\Controllers\CadastroController;
use App\Http\Controllers\ProfileController;
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
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    //Rotas do Cadastro
    Route::get('/cadastrar', [CadastroController::class, 'index'])->name('cadastrar');
    Route::get('/consulta', [CadastroController::class, 'show'])->name('consulta');
    Route::get('/filtro', [CadastroController::class, 'filtro'])->name('filtro');
    Route::post('/cadastrar_new', [CadastroController::class, 'store'])->name('cadastrar.new');
});

require __DIR__.'/auth.php';

/* Route::get('/cadastro', function () {
    return view ('cadastro.cadastrar');
})->name('cadastro'); */

/* Route::get('/consulta', function () {
    return view ('consulta.consulta');
})->name('consulta');
 */