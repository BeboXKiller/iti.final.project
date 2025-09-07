<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name'  => $this->faker->lastName(),
            'email'      => $this->faker->unique()->safeEmail(),
            'password'   => Hash::make('password'), // ثابت عشان تدخل بيه
            'phone'      => $this->faker->phoneNumber(),
            'address'    => $this->faker->address(),
            'city'       => $this->faker->city(),
            'role'       => 'user',
            'status'     => 'active',
        ];
    }
}
