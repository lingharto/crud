<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\User\Entities\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $count = 50;
        $password = Hash::make('password');
        for ($i = 1; $i <= $count; $i++)
        {
            $user = new User();
                $user->name = $faker->name;
                $user->email = $faker->email;
                $user->password = $password;
            $user->save();
        }
    }
}
