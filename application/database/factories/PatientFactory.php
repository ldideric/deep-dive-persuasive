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
            'name' => fake()->name(),
            'patient_id' => fake()->randomNumber(8),
            'date_of_birth' => fake()->dateTimeBetween('-80 years', '-18 years')->format('Y-m-d'),
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
