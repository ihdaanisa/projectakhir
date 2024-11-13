<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Forapi\AuthenticationController;

// 1|0M9kUKFdVzGgFxxOIRRdqRALifceYiY6nBsBwdnW

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/logout', [AuthenticationController::class, 'logout'])->middleware('auth:sanctum');

Route::post('/password/email', [AuthenticationController::class, 'sendResetLinkEmail']);
Route::post('/password/reset', [AuthenticationController::class, 'resetPassword']);
