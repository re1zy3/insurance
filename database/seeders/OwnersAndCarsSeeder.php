<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Owner;
use App\Models\Car;
use Faker\Factory as Faker;

class OwnersAndCarsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $owner = Owner::create([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'address' => $faker->address,
            ]);

            $numCars = rand(1, 3);
            for ($j = 0; $j < $numCars; $j++) {
                Car::create([
                    'reg_number' => strtoupper($faker->bothify('??-###-???')),
                    'brand' => $faker->company,
                    'model' => $faker->word,
                    'owner_id' => $owner->id,
                ]);
            }
        }
    }
}