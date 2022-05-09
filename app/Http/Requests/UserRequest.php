<?php

namespace App\Http\Requests;

use Laravel\Jetstream\Jetstream;
use Illuminate\Foundation\Http\FormRequest;
use App\Actions\Fortify\PasswordValidationRules;

class UserRequest extends FormRequest
{
    use PasswordValidationRules;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'rol'=>'required',
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ];
    }

    public function messages(){
        return [
            'nombre.required' => 'El :attribute es obligatorio.',
            'nombre.string' => 'El :attribute es una cadena de caracteres.',
            'email.required' => 'El :attribute es obligatorio.',
            'email.email' => 'El :attribute es un e-mail.',
            'email.unique' => 'El :attribute introducido ya está en uso.',
            'contrasenha.required' => 'La :attribute es obligatoria.',
            'contrasenha.string' => 'La :attribute es una cadena de caracteres.',
        ];
    }

    public function attributes(){
        return [
            'nombre' => 'nombre de usuario',
            'email' => 'e-mail del usuario',
            'contrasenha' => 'contraseña del usuario',
        ];
    }
}
