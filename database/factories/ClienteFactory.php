<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use Faker\Provider\es_PE\Person;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName(),
            'dni' => $this->faker->dni(),
            'anho_contable' => $this->faker->year(),
            'direccion_fiscal' => $this->faker->address(),
            'domicilio' => $this->faker->address(),
            'nombre_comercial' => $this->faker->company(),
            'nombre_sociedad' => $this->faker->company(),
            'cif' => $this->faker->vat(),
            'cuenta_bancaria' => $this->faker->bankAccountNumber(),
            'n_tarjeta' => $this->faker->creditCardNumber(),
            'email' => $this->faker->email(),
            'telefono' => $this->faker->e164PhoneNumber(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     *
     * @return $this
     */
    //public function withPersonalTeam()C
    //{
    //    if (! Features::hasTeamFeatures()) {
    //        return $this->state([]);
    //    }
//
    //    return $this->has(
     //       Team::factory()
     //           ->state(function (array $attributes, User $user) {
     //              return ['name' => $user->name.'\'s Team', 'user_id' => $user->id, 'personal_team' => true];
     //           }),
     //       'ownedTeams'
     //   );
    //}
}
