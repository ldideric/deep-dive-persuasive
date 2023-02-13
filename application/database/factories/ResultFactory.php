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
                fake()->randomNumber(2),
                fake()->randomNumber(2),
                fake()->randomNumber(2),
                fake()->randomNumber(2),
                fake()->randomNumber(2),
            ),
        ];
    }
}
