<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Factura>
 */
class FacturaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fecha_cargo_recurrente' => $this->faker->date(),
            //'factura' => $this->faker->file(storage_path('/app/public/facturas'), public_path()),
            'contrato_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
