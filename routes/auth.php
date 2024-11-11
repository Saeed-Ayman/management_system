<?php

use App\Http\Controllers\JWTAuthController;

Route::controller(JWTAuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');

    Route::middleware('jwt')->group(function () {
        Route::get('user', 'getUser');
        Route::post('logout', 'logout');
    });
});


