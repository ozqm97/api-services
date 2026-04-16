<?php

namespace App\Http\Controllers\Tablero;

use App\Events\NotifyReservas;
use App\Http\Controllers\ApiController;
use App\Models\tablero\Contravel_user;
use App\Traits\TokenManage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Spatie\FlareClient\Api;

class SessionController extends ApiController
{
    use TokenManage;

    public function getDataUser(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return $this->errorResponse('Unauthenticated', 'No hay sesión', 401);
        }

        // 🔥 cargar permisos
        $permissions = $user->getFullPermissionTree();

        return $this->successResponse('Usuario obtenido correctamente', [
            'user' => [
                'id' => $user->id,
                'name' => $user->full_name,
                'agency' => $user->cve_agencia,
                'mail' => $user->mail
            ],
            'permissions' => $permissions
        ]);
    }

    public function logout(Request $request)
    {
        // 1. Limpieza en el Servidor
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // 2. Crear las instrucciones de borrado para el Navegador
        // Al usar config(), Laravel tomará el valor 'null' que pusimos en el .env
        $cookieSession = Cookie::forget(
            'laravel_session',
            config('session.cookie'),
            config('session.path'),
            config('session.domain')
        );

        $cookieXsrf = Cookie::forget(
            'XSRF-TOKEN',
            config('session.path'),
            config('session.domain')
        );


        return $this->successResponse("Logout exitoso", ['success' => true])->withCookie($cookieSession)->withCookie($cookieXsrf);
    }
}
