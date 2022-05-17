<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProyectoRequest extends FormRequest
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
            'concepto'=>'required',
            'referencia'=>'required',
            'proveedor_dominio_usuario'=>'nullable|string',
            'proveedor_dominio_contrasenha'=>'nullable|string',
            'proveedor_hosting_usuario'=>'nullable|string',
            'proveedor_hosting_contrasenha'=>'nullable|string',
            'sepa'=>'nullable|mimes:png,jpg,pdf,docx,txt',
            'hoja_preferencia'=>'nullable|mimes:png,jpg,pdf,docx,txt',
            'dominio.*.nombre'=>'nullable|string',
            'dominio.*.usuario'=>'nullable|string',
            'dominio.*.contrasenha'=>'nullable|string',
            'bd.*.nombre'=>'nullable|string',
            'bd.*.host'=>'nullable|string',
            'bd.*.contrasenha'=>'nullable|string',
            'email.*.email'=>'nullable|email',
            'email.*.contrasenha'=>'nullable|string',
            'email.*.ruta_acceso'=>'nullable|string',
            'acceso.*.dominio'=>'nullable|string',
            'acceso.*.usuario'=>'nullable|string',
            'acceso.*.contrasenha'=>'nullable|string',
            'otros_datos'=>'nullable|string'

        ];
    }

    public function messages(){
        return [
            'concepto.required' => 'El :attribute es obligatorio.',
            'referencia.required' => 'La :attribute es obligatoria.',
            'proveedor_dominio_usuario.string' => 'El :attribute es una cadena de caracteres.',
            'proveedor_dominio_contrasenha.string' => 'La :attribute es una cadena de caracteres.',
            'proveedor_hosting_usuario.string' => 'El :attribute es una cadena de caracteres.',
            'proveedor_hosting_contrasenha.string' => 'La :attribute es una cadena de caracteres.',
            'sepa.mimes:png,jpg,pdf,docx,txt' => 'El :attribute debe ser un archivo de tipo png, jpg, pdf, docx o txt.',
            'hoja_preferencia.mimes:png,jpg,pdf,docx,txt' => 'La :attribute debe ser un archivo de tipo png, jpg, pdf, docx o txt.',
            'dominio.*.nombre.string' => 'El :attribute es una cadena de caracteres.',
            'dominio.*.usuario.string' => 'El :attribute es una cadena de caracteres.',
            'dominio.*.contrasenha.string' => 'La :attribute es una cadena de caracteres.',
            'bd.*.nombre.string' => 'El :attribute es una cadena de caracteres.',
            'bd.*.host.string' => 'El :attribute es una cadena de caracteres.',
            'bd.*.contrasenha.string' => 'La :attribute es una cadena de caracteres.',
            'email.*.email.email' => 'El :attribute debe tener formato de e-mail.',
            'email.*.contrasenha.string' => 'La :attribute es una cadena de caracteres.',
            'email.*.ruta_acceso.string' => 'La :attribute es una cadena de caracteres.',
            'acceso.*.dominio.string' => 'El :attribute es una cadena de caracteres.',
            'acceso.*.usuario.string' => 'El :attribute es una cadena de caracteres.',
            'acceso.*.contrasenha.string' => 'El :attribute es una cadena de caracteres.',
            'otros_datos.string' => 'Los :attribute son una cadena de caracteres.',
        ];
    }

    public function attributes(){
        return [
            'concepto' => 'concepto',
            'referencia' => 'referencia',
            'proveedor_dominio_usuario' => 'usuario del proveedor de dominio',
            'proveedor_dominio_contrasenha' => 'contraseña del proveedor de dominio',
            'proveedor_hosting_usuario' => 'usuario de lproveedor de hosting',
            'proveedor_hosting_contrasenha' => 'contraseña del proveedor de hosting',
            'sepa' => 'SEPA',
            'hoja_preferencia' => 'hoja de preferencia',
            'dominio.*.nombre' => 'nombre del dominio',
            'dominio.*.usuario' => 'usuario del dominio',
            'dominio.*.contrasenha' => 'contraseña del dominio',
            'bd.*.nombre' => 'nombre de la base de datos',
            'bd.*.host' => 'host de la base de datos',
            'bd.*.contrasenha' => 'contraseña de la base de datos',
            'email.*.email' => 'e-mail',
            'email.*.contrasenha' => 'contrasenha del e-mail',
            'email.*.ruta_acceso' => 'ruta de acceso del e-mail',
            'acceso.*.dominio' => 'dominio de acceso',
            'acceso.*.usuario' => 'usuario de acceso',
            'acceso.*.contrasenha' => 'contraseña de acceso',
            'otros_datos' => 'otros datos',
        ];
    }
}
