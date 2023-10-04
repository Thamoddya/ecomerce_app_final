<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->group(function (){
    Route::prefix('/auth')->group(function () {
        Route::post('/register', [\App\Http\Controllers\Auth\AuthController::class, 'register']);
        Route::post('/login', [\App\Http\Controllers\Auth\AuthController::class, 'login']);
        Route::get('/email_verification/{id}/{verify_token}', [\App\Http\Controllers\Auth\AuthController::class, 'verifyEmail']);
        Route::get('/resendEmail', [\App\Http\Controllers\Auth\AuthController::class, 'resendEmail']);
    });

    Route::middleware('auth:sanctum')->prefix('payment')->group(function (){
        Route::post('/get_hash_token', [\App\Http\Controllers\payment\PaymentController::class, 'makeHashToken']);
    });
});
