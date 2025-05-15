<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    protected $model = Car::class;

    public function definition()
    {
        return [
            'reg_number' => strtoupper($this->faker->bothify('??-####')),
            'brand'      => $this->faker->company,
            'model'      => $this->faker->word,
            // owner_id will be injected by the seeder
        ];
    }
}
