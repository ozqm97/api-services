<?php

use App\Http\Controllers\CRM\PostHoteles;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Operadora\SesionController;
use App\Http\Controllers\Tablero\SessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRM\PostAdmin;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| 🔐 LOGIN / AUTH
|--------------------------------------------------------------------------
*/
Route::prefix('login')->group(function () {

    Route::post('v1', [LoginController::class, 'loginContravel']);
    Route::post('v2', [LoginController::class, 'loginAgencies']);

    Route::get('renewToken', [LoginController::class, 'renewToken'])
        ->middleware('check.bearer');

    Route::middleware('auth:sanctum')->group(function () {

        Route::get('getUserInfo', [SessionController::class, 'getDataUser']);
        Route::post('logout', [SessionController::class, 'logout']);

        Route::get('getNotify', [PostHoteles::class, 'postReservOperador']);
        Route::get('testBroad', [PostHoteles::class, 'testBroadcast']);
    });

    // legacy bearer (déjalo si lo usas)
    Route::get('getDataUser', [SesionController::class, 'getDataUser'])
        ->middleware('check.bearer');
});


/*
|--------------------------------------------------------------------------
| 🏨 CRM (RESERVAS) — 🔥 NUEVO
|--------------------------------------------------------------------------
*/
Route::prefix('crm')->middleware('auth:sanctum')->group(function () {

    // 🔍 Buscar reserva
    Route::post('ConsultReser', [PostHoteles::class, 'postConsult']);

    // ✏️ Observaciones
    Route::post('MandarObs', [PostHoteles::class, 'postOBS']);

    // ❌ Cancelar reserva
    Route::post('CancelReserv', [PostHoteles::class, 'postCancel']);
    // ✅ Subir reserva
    Route::post('/upHoteles', [PostHoteles::class, 'createDesglose']);
    Route::post('/upload', [PostAdmin::class, 'almacenarImg']);
});
