<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\CadastroController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [Authcontroller::class, 'logout']);
    Route::get('/show_cadastros', [CadastroController::class, 'show']);
    Route::get('/show_id/{id}', [CadastroController::class, 'show_id']);
    Route::get('/busca', [CadastroController::class, 'busca']);
    Route::post('/cadastro', [CadastroController::class, 'store']);
    Route::delete('/delete/{id}', [CadastroController::class, 'delete']);
    Route::put('/edit/{id}', [CadastroController::class, 'update']);
});


Route::post('/login', [AuthController::class, 'auth']);
Route::post('/registro', [AuthController::class, 'store']);

