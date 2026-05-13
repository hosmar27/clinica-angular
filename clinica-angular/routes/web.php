<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DentistController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

// Initial Routes
Route::get('/', function () {
    return redirect('/login');
});
Route::get('/login', function () {
    return view('login');
});

// Appointments CRUD Routes
Route::get('/appointments', [AppointmentController::class, 'index']);
Route::get('/appointments/new', [AppointmentController::class, 'create']);
Route::post('/appointments/save', [AppointmentController::class, 'store']);
Route::get('/appointments/edit/{id}', [AppointmentController::class, 'edit']);
Route::post('/appointments/update/{id}', [AppointmentController::class, 'update']);
Route::post('/appointments/delete/{id}', [AppointmentController::class, 'destroy']);

// Patient CRUD Routes
Route::get('/patients', [PatientController::class, 'index']);
Route::get('/patients/new', [PatientController::class, 'create']);
Route::post('/patients/save', [PatientController::class, 'store']);
Route::get('/patients/edit/{id}', [PatientController::class, 'edit']);
Route::post('/patients/update/{id}', [PatientController::class, 'update']);

// Dentist CRUD Routes (admin only)
Route::middleware('auth')->group(function () {
    Route::get('/dentists', [DentistController::class, 'index']);
    Route::get('/dentists/new', [DentistController::class, 'create']);
    Route::post('/dentists/save', [DentistController::class, 'store']);
    Route::get('/dentists/edit/{id}', [DentistController::class, 'edit']);
    Route::post('/dentists/update/{id}', [DentistController::class, 'update']);
});
