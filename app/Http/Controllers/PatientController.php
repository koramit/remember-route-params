<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $fields = ['hn', 'name', 'gender'];
        $patients = Patient::query()
                        ->select(array_merge($fields, ['id']))
                        ->paginate(10);

        return view('patients.index')->with([
            'patients' => $patients,
            'fields' => $fields,
        ]);
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit')->with(['patient' => $patient]);
    }

    public function update(Patient $patient, Request $request)
    {
        $validated = $request->validate([
            'hn' => 'required|string',
            'name' => 'required|string',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'address' => 'required|string',
            'tel_no' => 'required|string',
        ]);
        $patient->update($validated);

        return redirect()->route('patients');
    }
}
