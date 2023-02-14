<?php

namespace App\Models;

use App\Enums\Gender;
use App\Helpers\DateHelper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Patient extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name',
        'user_id',
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function results(): HasMany
    {
        return $this->hasMany(Result::class);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => DateHelper::convert($value)
        );
    }

    public function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => DateHelper::convert($value)
        );
    }

    public function age(): Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::parse($this->date_of_birth)->age
        );
    }
}
