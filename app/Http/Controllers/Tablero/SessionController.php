<?php

namespace App\Http\Controllers\Tablero;

use App\Events\NotifyReservas;
use App\Http\Controllers\ApiController;
use App\Models\tablero\Contravel_user;
use App\Traits\TokenManage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\FlareClient\Api;

class SessionController extends ApiController
{
    use TokenManage;

    public function getDataUser(Request $request)
    {
        return $this->successResponse('Usuario obtenido correctamente', $request->user());
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->regenerate();

        return $this->successResponse("Logout exitoso", ['success' => true]);
    }
}
