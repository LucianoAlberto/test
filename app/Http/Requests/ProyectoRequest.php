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
            'proveedor_dominio_contrasenha'=>'nullable',
            'proveedor_hosting_usuario'=>'nullable',
            'proveedor_hosting_contrasenha'=>'nullable',
            'sepa'=>'nullable|mimes:pdf,txt,docx',
            'otros_datos'=>'nullable',
            'hoja_preferencia'=>'nullable|mimes:pdf,txt,docx',
            'dominio.*.nombre'=>'nullable',
            'dominio.*.usuario'=>'nullable',
            'dominio.*.contrasenha'=>'nullable',
            'bd.*.nombre'=>'nullable',
            'bd.*.host'=>'nullable',
            'bd.*.contrasenha'=>'nullable',
            'email.*.email'=>'nullable',
            'email.*.contrasenha'=>'nullable',
            'email.*.ruta_acceso'=>'nullable',
            'acceso.*.dominio'=>'nullable',
            'acceso.*.usuario'=>'nullable',
            'acceso.*.contrasenha'=>'nullable',
            'otros_datos'=>'nullable'

        ];
    }
}
