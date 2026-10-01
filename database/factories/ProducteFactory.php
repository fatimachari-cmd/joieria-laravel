<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProducteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nom' => $this->faker->word,
            'descripcio' => $this->faker->sentence,
            'preu' => $this->faker->randomFloat(2, 10, 1000),
            'stock' => $this->faker->numberBetween(0, 100),
            'foto' => null,
            'categoria_id' => \App\Models\Categoria::all()->random()->id,
        ];
    }
}
