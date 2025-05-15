<?php

namespace Database\Factories;

use App\Models\Owner;
use Illuminate\Database\Eloquent\Factories\Factory;

class OwnerFactory extends Factory
{
    protected $model = Owner::class;

    public function definition()
    {
        return [
            'name'     => $this->faker->firstName,
            'surname'  => $this->faker->lastName,
            'phone'    => $this->faker->phoneNumber,
            'email'    => $this->faker->unique()->safeEmail,
            'address'  => $this->faker->address,
        ];
    }
}
