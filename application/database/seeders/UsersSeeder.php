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
        $admin = User::factory()->create([
            'name' => 'Hippocrates',
            'email' => config('auth.login.email'),
            'password' => bcrypt(config('auth.login.password')),
            'user_type' => UserType::GP,
        ]);

        $patients = Patient::factory(10)
            ->for($admin)
            ->create();

        $patients->each(function (Patient $patient) {
            Result::factory(random_int(1, 3))
                ->for($patient)
                ->create();
        });

        User::factory()->create([
            'name' => 'Archimedes',
            'email' => 'lab@persuasive.com',
            'password' => bcrypt('password'),
            'user_type' => UserType::Scientist,
        ]);

        $users = User::factory(50)->create();

        $users->each(function (User $user) {
            if ($user->user_type === UserType::GP) {
                $patients = Patient::factory(4)
                    ->for($user)
                    ->create();

                $patients->each(function (Patient $patient) {
                    Result::factory(random_int(1, 3))
                        ->for($patient)
                        ->create();
                });
            }
        });
    }
}
