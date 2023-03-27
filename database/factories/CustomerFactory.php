<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'dni' => fake()->unique()->randomNumber(8, true),
            'phone' => fake()->unique()->regexify('^9\d{8}$'),
            'address' => fake()->address(),
            'user_id' => fake()->randomElement([1, 2, 3, 4, 5]),
        ];
    }
}
