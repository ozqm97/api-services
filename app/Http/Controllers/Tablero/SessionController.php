<?php

namespace App\Http\Controllers\Tablero;

use App\Events\NotifyReservas;
use App\Http\Controllers\ApiController;
use App\Models\tablero\Contravel_user;
use App\Traits\TokenManage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\FlareClient\Api;

class SessionController extends ApiController
{
    use TokenManage;

    public function getDataUser(Request $request)
    {
        $user = $request->user();
        Log::debug('Usuario obtenido del token: ' . json_encode($user));

        if ($user) {
            return $this->successResponse('Usuario obtenido correctamente', $user);
        } else {
            return $this->errorResponse('Token inválido', 'No se pudo obtener el usuario', 401);
        }
    }
}
