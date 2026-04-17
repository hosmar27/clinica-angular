<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController; 

// Initial Routes
Route::get('/', function () { return redirect('/login'); });
Route::get('/login', function () { return view('login'); });

// Patient CRUD Routes
Route::get('/patients', [PatientController::class, 'index']);
Route::get('/patients/new', [PatientController::class, 'create']);
Route::post('/patients/save', [PatientController::class, 'store']);
Route::get('/patients/edit/{id}', [PatientController::class, 'edit']);
Route::post('/patients/update/{id}', [PatientController::class, 'update']);