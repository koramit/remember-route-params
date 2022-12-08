<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\PatientMedication;
use Illuminate\Http\Request;

class PatientMedicationController extends Controller
{
    public function index(Patient $patient)
    {
        return view('medications.index', [
            'patient' => $patient,
        ]);
    }

    public function update(PatientMedication $patientMedication)
    {
        $patientMedication->update(['date_stop' => now()]);
        return back()->with('message', $patientMedication->medication->name . ' offed');
    }
}
