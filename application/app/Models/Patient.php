<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'patient_id',
        'gender',
        'email',
        'address',
        'data',
        'date_of_birth',
    ];

    protected $casts = [
        'address' => 'json',
        'data' => 'json',
        'gender' => Gender::class,
        'date_of_birth' => 'date',
    ];
}
