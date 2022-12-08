<?php

namespace App\Http\Controllers;

use App\Models\Medication;
use Illuminate\Http\Request;

class MedicationController extends Controller
{
    public function edit(Medication $medication)
    {
        $dosageForms = cache()->remember('dosage_forms', 3600, function () {
            return Medication::query()->select('dosage_form')->distinct()->pluck('dosage_form');
        });
        return view('Medications.edit', [
            'medication' => $medication,
            'dosageForms' => $dosageForms,
        ]);
    }

    public function update(Request $request, Medication $medication)
    {
        $request->validate([
            'name' => 'required',
            'dosage_form' => 'required',
        ]);
        $medication->update($request->only('name', 'dosage_form'));
        return back()->with('message', 'Medication updated');
    }
}
