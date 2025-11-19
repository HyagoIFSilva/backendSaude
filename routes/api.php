<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ExameController;
use App\Http\Controllers\Api\RemedioController;
use App\Http\Controllers\Api\WaterIntakeController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\Api\AllergyController;

// --- Rotas Públicas ---
Route::get('/home', [FilmeController::class, 'indexApi']);
Route::post('/home', [FilmeController::class, 'indexApi']);
Route::get('/contato', [ContatoController::class, 'indexApi']);
Route::post('/contato', [ContatoController::class, 'indexApi']);

// --- Rotas de Autenticação e Registro ---
Route::post('/login', [UserController::class, 'login']);
Route::apiResource('users', UserController::class)->only(['store']);

// --- Grupo de Rotas Protegidas (Exigem Login) ---
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::put('/user/profile', [UserController::class, 'updateProfile']);
    Route::delete('/user/profile', [UserController::class, 'destroyProfile']);

    Route::get('/exames', [ExameController::class, 'index']);
    Route::post('/exames', [ExameController::class, 'store']);
    Route::put('/exames/{exame}', [ExameController::class, 'update']);
    Route::delete('/exames/{exame}', [ExameController::class, 'destroy']);

    Route::get('/remedios/{remedio}/ubs', [RemedioController::class, 'findUbsByRemedio']);

    Route::get('/water-intake/today', [WaterIntakeController::class, 'getTodaysIntake']);
    Route::put('/water-intake/today', [WaterIntakeController::class, 'updateTodaysIntake']);
    Route::get('/water-intake/history', [WaterIntakeController::class, 'getHistoricalIntake']);
    Route::get('/allergies', [AllergyController::class, 'index']);
    Route::post('/allergies', [AllergyController::class, 'store']);
    Route::delete('/allergies/{allergy}', [AllergyController::class, 'destroy']);
});