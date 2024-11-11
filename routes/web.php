<?php

Route::get('/', fn() => [
    'php' => PHP_VERSION,
    'laravel' => app()->version()
]);
