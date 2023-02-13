<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientsSeeder extends Seeder
{
    public function run(): void
    {
        Patient::factory(50)->create();
    }
}
