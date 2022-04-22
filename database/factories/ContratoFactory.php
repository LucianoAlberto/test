<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contrato>
 */
class ContratoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cliente_id' => $this->faker->numberBetween(1, 2),
            'concepto' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'referencia' => $this->faker->randomNumber(),
            'base_imponible' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
            'iva' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
            'irpf' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
            'total' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
            'fecha_firma' => $this->faker->date(),
        ];
    }
}
