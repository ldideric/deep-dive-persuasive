<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Helpers\DateHelper;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'data',
    ];

    protected $casts = [
        'data' => 'json',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => DateHelper::convert($value)
        );
    }

    public function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => DateHelper::convert($value)
        );
    }
}
