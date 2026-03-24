<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ReCaptchaController extends Controller
{
    public function validateToken(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
        ]);

        $token = $request->input('token');
        $secret = env('RECAPTCHA_SECRET_KEY');

        // Validar token con Google
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $secret,
            'response' => $token,
        ]);

        $data = $response->json();
        if (($data['success'] ?? false) === true) {
            $score = $data['score'] ?? 0;

            if ($score >= 0.8) {
                return response()->json(['success' => true, 'score' => $score, 'status' => 'ok']);
            } elseif ($score >= 0.3) {
                return response()->json(['success' => false, 'score' => $score, 'status' => 'recaptcha_v2_required']);
            } else {
                return response()->json(['success' => false, 'score' => $score, 'status' => 'blocked']);
            }
        }

        return response()->json([
            'success' => false,
            'score' => $data['score'] ?? 0,
            'status' => 'error',
        ], 400);
    }


    public function validateToken2(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
        ]);
        $tokenV2 = $request->input('token');

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_V2_KEY'),
            'response' => $tokenV2,
        ])->json();
        if (($response['success'] ?? false) !== true) {
            return response()->json(['success' => false], 400);
        }

        return response()->json(['success' => true]); // ya validado
    }
}
