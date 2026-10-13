<?php

declare(strict_types=1);

use App\Http\Controllers\AuthSanctumController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//    return $request->user();
// })->middleware('auth:sanctum');

Route::controller(AuthSanctumController::class)->group(function () {
    Route::post('/login', 'login');
});
