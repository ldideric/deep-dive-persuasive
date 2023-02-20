<?php

namespace Database\Factories;

use App\Structs\ResultData;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResultFactory extends Factory
{
    public function definition(): array
    {
        return [
            'patient_id' => fake()->randomNumber(8),
            'data' => ResultData::make(
                fake()->randomFloat(1, 0.2, 6),
                fake()->randomFloat(1, 0.2, 6),
                fake()->randomFloat(1, 0.2, 6),
                fake()->randomFloat(1, 0.2, 6),
                fake()->numberBetween(1, 3),
            ),
            'created_at' => fake()->dateTimeBetween('-2 year', 'now'),
        ];
    }
}
