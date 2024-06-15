<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aspecto>
 */
class AspectoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word(),
            'tipo' => $this->faker->randomElement(['1', '2', '3', '4', '5']),
            'created_at' => now(),
            'updated_at' => now(),
            'estado' => 1,
            'activo' => 1,

        ];
    }
}