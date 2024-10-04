<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pleiades>
 */
class PleiadesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_data' => fake()->bothify('1?.#####.####'),
            'satelit' => fake()->randomElement(['Pleiades 1A', 'Pleiades 1B']),
            'tanggal' => fake()->date('d-m-Y'),
        ];
    }
}
