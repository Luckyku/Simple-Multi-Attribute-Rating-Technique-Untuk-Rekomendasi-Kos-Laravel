<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kos>
 */
class KosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->company(),
            'slug' => fake()->slug(),
            'harga' => random_int(300000,1000000),
            'alamat' => fake()->streetAddress(),
            'fasilitas' => fake()->streetAddress(),
            'jarak' => fake()->randomFloat(2,8 , 2),
            'luas_id' => fake()->numberBetween(1, 3),
            'lokasi' => fake()->citySuffix(),
            'tipe_id' => fake()->numberBetween(1,2),
        ];
    }
}
