<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
               'cliente_nombre' =>fake()->firstName(), 
               'cliente_apellido' => fake()->lastName(),
               'cliente_cedula' => $this->generarNit(),
               'cliente_fechanacimiento' => fake()->dateTimeBetween('-70 years', '-18 years')->format('Y-m-d'),
               'cliente_genero' => $this->faker->randomElement(['M', 'F']),
               'cliente_telefono' => $this->faker->phoneNumber(),
               'cliente_email' => $this->faker->unique()->safeEmail(),
               'cliente_direccion' => $this->faker->address(),
               'cliente_contactoemer' => $this->faker->name() . ' - ' . $this->faker->phoneNumber(),
               'cliente_registro' => $this->faker->dateTimeBetween('-10 years', 'now')->format('Y-m-d'),
               'cliente_estado' => $this->faker->randomElement(['AC', 'IN']),
               'cliente_foto' => 'https://i.pravatar.cc/640?u=' . $this->faker->unique()->email,
               'cliente_observacionmedica' => $this->faker->text(200),
               'cliente_fecha_creacion' => now(),
               'cliente_fechaactualizacion' => now()
        ];

       

      
    }

    private function generarNit()
    {
        $numero = rand(100000000, 999999999); // 9 dígitos
        return $numero ;    // Agrega dígito de verificación
    }

}
