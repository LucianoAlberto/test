<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
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
        //dd($this->user()->id);
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,id,' . $this->user()->id],
            'rol' =>'required',
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
            'password.required' => 'La :attribute es obligatoria.',
            'password.string' => 'La :attribute es una cadena de caracteres.',
            'password.size' => 'La :attribute debe tener al menos 8 caracteres.',
        ];
    }

    public function attributes(){
        return [
            'nombre' => 'nombre de usuario',
            'email' => 'e-mail del usuario',
            'password' => 'contraseña del usuario',
        ];
    }
}
