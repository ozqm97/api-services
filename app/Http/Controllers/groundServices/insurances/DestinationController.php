<?php

namespace App\Http\Controllers\Insurances;

use App\Http\Controllers\ApiController;
use App\Models\Insurances\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DestinationController extends ApiController
{
    public function index()
    {
        $destinations = Destination::all();
        Log::debug('Destinations retrieved', ['count' => $destinations->count()]);
        if ($destinations->isEmpty()) {
            return $this->errorResponse('No destinations found', 404);
        }
        return $this->successResponse("Response success", $destinations);
    }
}
