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

Route::get('/home', 'App\Http\Controllers\FilmeController@indexApi');
Route::post('/home', 'App\Http\Controllers\FilmeController@indexApi');
Route::get('/contato', 'App\Http\Controllers\ContatoController@indexApi');
Route::post('/contato', 'App\Http\Controllers\ContatoController@indexApi');

Route::post('/exames', [ExameController::class, 'store'])->middleware('auth:sanctum');

Route::apiResource('users', UserController::class);
Route::post('/login', [UserController::class, 'login']);