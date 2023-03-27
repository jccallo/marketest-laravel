<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'customer_id' => fake()->randomElement([1, 2, 3, 4, 5]),
            'date' => fake()->date(),
            'total' => fake()->randomFloat(2, 1, 200),
        ];
    }
}
