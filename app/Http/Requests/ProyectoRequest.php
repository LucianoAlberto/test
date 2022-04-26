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
            'proveedor_dominio_usuario'=>'nullable',
            'proveedor_dominio_password'=>'nullable',
            'proveedor_hosting_usuario'=>'nullable',
            'proveedor_hosting_password'=>'nullable',
            'sepa'=>'nullable|mimes:pdf,txt,docx',
            'otros_datos'=>'nullable',
            'hoja_preferencia'=>'nullable|mimes:pdf,txt,docx',
            'dominio_nombre.*'=>'nullable',
            'dominio_usuario.*'=>'nullable',
            'dominio_password.*'=>'nullable',
            'bd_nombre.*'=>'nullable',
            'host.*'=>'nullable',
            'bd_password.*'=>'nullable',
            'email.*'=>'nullable',
            'password.*'=>'nullable',
            'ruta_accesso.*'=>'nullable',
            'dominio_accesso.*'=>'nullable',
            'usuario_accesso.*'=>'nullable',
            'password_accesso.*'=>'nullable',
            'otros_datos'=>'nullable'

        ];
    }
}
