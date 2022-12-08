<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientMedication extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'date_start' => 'date',
        'date_stop' => 'date',
    ];

    // patientMedication belongs to medication
    public function medication()
    {
        return $this->belongsTo(Medication::class);
    }
}
