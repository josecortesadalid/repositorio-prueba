<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PortadaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_portada' => $this->faker->name(),
            'posicion1' => $this->faker->randomDigit(),
            'posicion2' => $this->faker->randomDigit(),
            'posicion3' => $this->faker->randomDigit(),
            'posicion4' => $this->faker->randomDigit(),
        ];
    }
}
