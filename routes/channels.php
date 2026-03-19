<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Log;


Broadcast::channel('user.{user}', function ($authUser, $user) {

    Log::debug('CHANNEL DEBUG', [
        'authUser' => $authUser,
        'param' => $user,
    ]);

    return true; // temporal
});
