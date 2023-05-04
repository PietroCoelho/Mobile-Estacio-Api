<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilitieController;
use App\Http\Services\ServicesService;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

    Route::resources([
        'person' => PersonsController::class,
        'user' => UserController::class,
        'utilitie' => UtilitieController::class,
        'service' => ServicesService::class,
    ]);
});
