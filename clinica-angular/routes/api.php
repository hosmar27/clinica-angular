<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DentistController;
use App\Http\Controllers\AppointmentController;

// Public Routes
Route::post('/login', [AuthController::class, 'login']);

// Protected Routes (Requires Token)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', function (Request $request) {
        return $request->user();
    });

    // Clinic CRUDs
    Route::apiResource('patients', PatientController::class);
    Route::apiResource('dentists', DentistController::class);
    Route::apiResource('appointments', AppointmentController::class);
});