<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController; 
use App\Http\Controllers\Api\ExameController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\ContatoController;

// --- Rotas Públicas ---
Route::get('/home', [FilmeController::class, 'indexApi']);
Route::post('/home', [FilmeController::class, 'indexApi']);
Route::get('/contato', [ContatoController::class, 'indexApi']);
Route::post('/contato', [ContatoController::class, 'indexApi']);

// --- Rotas de Autenticação e Registro ---
Route::post('/login', [UserController::class, 'login']);
// A rota POST /users é usada para o cadastro
Route::apiResource('users', UserController::class)->only(['store']); 

// --- Grupo de Rotas Protegidas (Exigem Login) ---
Route::middleware('auth:sanctum')->group(function () {
    
    // Rota para buscar os dados do usuário logado
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Novas rotas para o perfil do usuário
    Route::put('/user/profile', [UserController::class, 'updateProfile']);
    Route::delete('/user/profile', [UserController::class, 'destroyProfile']);

    // Rotas para gerenciar exames
    Route::get('/exames', [ExameController::class, 'index']);
    Route::post('/exames', [ExameController::class, 'store']);
    Route::put('/exames/{exame}', [ExameController::class, 'update']);
    Route::delete('/exames/{exame}', [ExameController::class, 'destroy']);
});