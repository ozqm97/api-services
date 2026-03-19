<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckBearerToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // 🔥 primero intenta Sanctum
        if ($request->user()) {
            return $next($request);
        }

        // fallback JWT
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json([
                'message' => 'No autenticado'
            ], 401);
        }

        return $next($request);
    }
}
