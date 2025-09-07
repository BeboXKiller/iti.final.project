<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id'      => User::inRandomOrder()->first()->id ?? User::factory(),
            'total_amount' => $this->faker->randomFloat(2, 50, 2000),
            'status'       => $this->faker->randomElement(['pending', 'completed', 'cancelled']),
        ];
    }
}
