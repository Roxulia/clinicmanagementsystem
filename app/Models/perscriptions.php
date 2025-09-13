<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perscriptions extends Model
{
    use HasFactory;

    protected $fillables = [
        'record_id',
        'medicine_id',
        'dosage',
        'quantity_taken',
        'cost'
    ];
}
