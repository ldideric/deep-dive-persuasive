<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserType;
use App\Helpers\DateHelper;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'user_type' => UserType::class,
    ];

    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class);
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
