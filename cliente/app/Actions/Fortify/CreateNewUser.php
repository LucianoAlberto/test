<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Mascota;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'nombre' => ['required', 'string', 'max:255'],
            'dni' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
            'codigoPostal' => ['required', 'string', 'max:255'],
            'localidad' => ['required', 'string', 'max:255'],
            'provincia' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'nombreMascota' => ['required', 'string', 'max:255'],
            'edadMascota' => ['required', 'string', 'max:255'],
            'peligrosaMascota' => ['required', 'string', 'max:255'],
            'alergiaMascota' => ['required', 'string', 'max:255'],
        ])->validate();



        $user = User::create([
            'nombre' => $input['nombre'],
            'dni' => $input['dni'],
            'telefono' => $input['telefono'],
            'direccion' => $input['direccion'],
            'codigoPostal' => $input['codigoPostal'],
            'localidad' => $input['localidad'],
            'provincia' => $input['provincia'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        Mascota::create([
            'tipos_id' => 1,
            'users_id' => 1,
            'nombre' => $input['nombreMascota'],
            'edad' => $input['edadMascota'],
            'peligrosa' => $input['peligrosaMascota'],
            'alergia' => $input['alergiaMascota'],
        ]);

        return $user;
    }
}
