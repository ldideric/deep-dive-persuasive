<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\Result;
use Illuminate\Database\Seeder;

class PatientsSeeder extends Seeder
{
    public function run(): void
    {
        $patients = Patient::factory(50)->create();

        $patients->each(function (Patient $patient) {
            Result::factory(2)
                ->for($patient)
                ->create();
        });
    }
}
