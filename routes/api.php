<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController; 
use App\Http\Controllers\Api\ExameController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\ContatoController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/home', [FilmeController::class, 'indexApi']);
Route::post('/home', [FilmeController::class, 'indexApi']);
Route::get('/contato', [ContatoController::class, 'indexApi']);
Route::post('/contato', [ContatoController::class, 'indexApi']);


Route::post('/login', [UserController::class, 'login']);
Route::apiResource('users', UserController::class); 
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/exames', [ExameController::class, 'index']);      
    Route::post('/exames', [ExameController::class, 'store']);     
    Route::put('/exames/{exame}', [ExameController::class, 'update']);  
    Route::delete('/exames/{exame}', [ExameController::class, 'destroy']);
});