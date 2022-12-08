<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Patient::factory(300)->create();

        \App\Models\User::factory(30)->create();

        // seed medication
        $timestamps = [
            'created_at' => now(),
            'updated_at' => now(),
        ];
        $medications = array_map(function ($med) use ($timestamps) {
            return $med + $timestamps;
        }, config('medications'));
        \App\Models\Medication::query()->insert($medications);

        // seed patient medications
        $medIds = \App\Models\Medication::query()->select('id')->pluck('id');
        \App\Models\Patient::query()
            ->each(function ($patient) use ($medIds) {
                $medIds->shuffle()->take(rand(5, 10))->each(function ($medId) use ($patient) {
                    \App\Models\PatientMedication::query()->create([
                        'patient_id' => $patient->id,
                        'medication_id' => $medId,
                        'date_start' => now()->subDays(rand(30, 60)),
                    ]);
                });
            });
    }
}
