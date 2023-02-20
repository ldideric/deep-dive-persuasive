<?php

namespace Database\Factories;

use App\Enums\Gender;
use App\Structs\PatientAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->firstname() . ' ' . fake()->lastname(),
            'date_of_birth' => fake()->dateTimeBetween('-90 years', '-25 years')->format('Y-m-d'),
            'gender' => fake()->randomElement(Gender::cases()),
            'email' => fake()->unique()->safeEmail(),
            'address' => PatientAddress::make(
                fake()->country(),
                fake()->postcode(),
                fake()->city(),
                fake()->streetAddress(),
                fake()->buildingNumber()
            ),
        ];
    }
}
