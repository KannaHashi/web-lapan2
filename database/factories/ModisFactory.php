<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ModisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_data' => fake()->bothify('a1.#####.####'),
            'satelit' => fake()->randomElement(['Aqua', 'Terra']),
            'tanggal' => fake()->date('Y-m-d'),
        ];
    }
}
