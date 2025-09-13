<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicalRecord extends Model
{
    use HasFactory;
    protected $fillables = [
        'patient_id',
        'doctor_id',
        'instruction',
        'blood_pressure',
        'body_temperature'
    ];
}
