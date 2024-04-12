<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Persona;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'apellido' => $this->faker->lastName(),
            'documento' => $this->faker->unique()->randomNumber(8),
            'telefono' => $this->faker->unique()->randomNumber(8),
            'email' => $this->faker->unique()->safeEmail(),
            'domicilio' => $this->faker->address(),
            'fecha_nacimiento'=> $this->faker->date(),
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}
