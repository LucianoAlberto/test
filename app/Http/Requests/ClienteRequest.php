<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
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
            'ambito' => 'nullable',
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'dni' => 'regex:/^([0-9]{8}[A-Z])|[XYZ][0-9]{7}[A-Z]$/',
            'anho_contable' => 'regex:/^\d{4}$/',
            'direccion_fiscal' => 'nullable|string',
            'domicilio' => 'nullable|string',
            'nombre_comercial' => 'required|string',
            'nombre_sociedad' => 'required|string',
            'cif' => 'required|string',
            'cuenta_bancaria' =>'regex:/^([A-Z]{2})([-]{1})(\d{2})([-]{1})(\d{4})([-]{1})(\d{4})([-]{1})(\d{2})([-]{1})(\d{10})$/',
            'n_tarjeta' =>'regex:/^\d{4}[-]\d{4}[-]\d{4}[-]\d{4}$/',
            'email' => 'required|email',
            'telefono' =>'regex:/^(([\+]\d{2}|\d{4})[ |\-|\/])?\d{9}$/',
        ];
    }

    public function messages(){
        return [
            'nombre.required' => 'El :attribute es obligatorio.',
            'nombre.string' => 'El :attribute es una cadena de caracteres.',
            'apellidos.required' => 'Los :attribute son obligatorios.',
            'apellidos.string' => 'Los :attribute son una cadena de caracteres.',
            'dni.regex' => 'El :attribute no tiene el formato correcto (12345678A o Y1234567A).',
            'anho_contable.numeric' => 'El :attribute es un número.',
            'anho_contable.regex' => 'El :attribute no tiene el formato correcto (año de cuatro dígitos).',
            'direccionFiscal.string' => 'La :attribute es una cadena de caracteres.',
            'domicilio.string' => 'El :attribute es una cadena de caracteres.',
            'nombreComercial.string' => 'El :attribute es una cadena de caracteres.',
            'nombreSociedad.string' => 'El :attribute es una cadena de caracteres.',
            'cif.string' => 'El :attribute es una cadena de caracteres.',
            'cuenta_bancaria.regex' => 'El :attribute no tiene el formato correcto (XX-XX-XXXX-XXXX-XX-XXXXXXXXXX).',
            'n_tarjeta.regex' => 'El :attribute no tiene el formato correcto (XXXX-XXXX-XXXX-XXXX).',
            'email.email' => 'El :attribute es un correo electrónico.',
            'telefono.regex' => 'El :attribute no tiene el formato correcto (9 dígitos o + prefijo y 9 dígitos).',
        ];
    }

    public function attributes(){
        return [
            'nombre' => 'nombre del cliente',
            'apellidos' => 'apellidos del cliente',
            'dni' => 'DNI del cliente',
            'anho_contable' => 'año contable',
            'direccionFiscal' => 'dirección fiscal del cliente',
            'domicilio' => 'domicilio del cliente',
            'nombreComercial' => 'nombre comercial del cliente',
            'nombreSociedad' => 'nombre de la sociedad del cliente',
            'cif' => 'CIF del cliente',
            'cuentaBancaria' => 'cuenta bancaria del cliente',
            'n_tarjeta' => 'número de la tarjeta del cliente',
            'email' => 'e-mail del cliente',
            'telefono' => 'teléfono del cliente',
        ];
    }
}
