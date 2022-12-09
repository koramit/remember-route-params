<?php

use App\Http\Controllers\MedicationController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientMedicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('patients');
});

Route::get('/patients', [PatientController::class, 'index'])->name('patients');
Route::get('/patients/{patient}/edit', [PatientController::class, 'edit'])->name('patients.edit');
Route::patch('/patients/{patient}', [PatientController::class, 'update'])->name('patients.update');

Route::get('/medications/{medication}/edit', [MedicationController::class, 'edit'])->name('medications.edit');
Route::patch('/medications/{medication}', [MedicationController::class, 'update'])->name('medications.update');

Route::get('/patients/{patient}/medications', [PatientMedicationController::class, 'index'])->name('patients.medications');
Route::patch('/patient-medication/{patientMedication}', [PatientMedicationController::class, 'update'])->name('patients.medications.update');
