<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Owner;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // create 10 owners...
        Owner::factory(10)
            ->create()
            // ...and for each owner create 1–3 cars
            ->each(function (Owner $owner) {
                Car::factory(rand(1, 3))
                    ->create(['owner_id' => $owner->id]);
            });
    }
}
