<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

Route::middleware('jwt')->group(function () {
    Route::apiResource('products', ProductController::class);
    Route::apiResource('orders', OrderController::class)->except('update');
});

include __DIR__.'/auth.php';
