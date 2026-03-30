<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Operadora\SesionController;
use App\Http\Controllers\Tablero\SessionController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('login')->group(function () {
    Route::post('v1', [LoginController::class, 'loginContravel'])->name('api.contravel.login');
    Route::post('v2', [LoginController::class, 'loginAgencies'])->name('api.agencies.login');
    Route::get('renewToken', [LoginController::class, 'renewToken'])->middleware('check.bearer')->name('api.contravel.renew');
    Route::middleware('auth:sanctum')->get('getUserInfo', [SessionController::class, 'getDataUser'])->name('api.contravel.user');
    Route::middleware('auth:sanctum')->post('logout', [SessionController::class, 'logout'])->name('api.contravel.user');
    Route::get('getDataUser', [SesionController::class, 'getDataUser'])->middleware('check.bearer')->name('api.contravel.user');
});
