<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $casts = ['dob' => 'date'];

    protected $guarded = [];

    protected function gender(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->attributes['gender'] ? 'male' : 'female',
            set: fn ($value) => $value === 'male' ? 1:0,
        );
    }

    // patient has many medications
    public function medications()
    {
        return $this->hasMany(PatientMedication::class);
    }

}
