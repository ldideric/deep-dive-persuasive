<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'patient_id',
        'gender',
        'email',
        'address',
        'date_of_birth',
    ];

    protected $casts = [
        'address' => 'json',
        'gender' => Gender::class,
        'date_of_birth' => 'date',
    ];

    public function results(): HasMany
    {
        return $this->hasMany(Result::class);
    }
}
