<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\Patient;
use App\Models\Result;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $users = User::factory(50)->create();

        $users->each(function (User $user) {
            if ($user->user_type === UserType::GP) {
                $patients = Patient::factory(4)
                    ->for($user)
                    ->create();

                $patients->each(function (Patient $patient) {
                    Result::factory(2)
                        ->for($patient)
                        ->create();
                });
            }
        });
    }
}
