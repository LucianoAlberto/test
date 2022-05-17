<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContratoRequest extends FormRequest
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
            'referencia'=>'required|string|unique:contratos',
            'base_imponible'=>'required|numeric',
            'iva'=>'required|numeric',
            'irpf'=>'required|numeric',
            'total'=>'required|numeric',
            'fecha_firma'=>'required|date',
            'archivo'=>'nullable|mimes:png,jpg,pdf,docx,txt',
            'presupuesto'=>'nullable|mimes:png,jpg,pdf,docx,txt',
        ];
    }

    public function messages(){
        return [
            'concepto.required' => 'El :attribute es obligatorio.',
            'referencia.required' => 'La :attribute es obligatoria.',
            'referencia.string' => 'La :attribute es una cadena de caracteres.',
            'referencia.unique:contratos' => 'Esa :attribute ya existe en otro contrato.',
            'base_imponible.required' => 'La :attribute es obligatoria.',
            'base_imponible.numeric' => 'La :attribute es un número.',
            'iva.required' => 'El :attribute es obligatorio.',
            'iva.numeric' => 'El :attribute es un número.',
            'irpf.required' => 'El :attribute es obligatorio.',
            'irpf.numeric' => 'El :attribute es un número.',
            'total.required' => 'La :attribute es obligatoria.',
            'total.numeric' => 'La :attribute es un número.',
            'fecha_firma.required' => 'La :attribute es obligatoria.',
            'fecha_firma.date' => 'La :attribute es una fecha.',
            'archivo.mimes:png,jpg,pdf,docx,txt' => 'El :attribute debe ser un archivo de tipo png, jpg, pdf, docx o txt.',
            'presupuesto.mimes:png,jpg,pdf,docx,txt' => 'El :attribute debe ser un archivo de tipo png, jpg, pdf, docx o txt.',
        ];
    }

    public function attributes(){
        return [
            'concepto' => 'concepto',
            'referencia' => 'referencia',
            'base_imponible' => 'base imponible',
            'iva' => 'IVA',
            'irpf' => 'IRPF',
            'total' => 'cantidad total',
            'fecha_firma' => 'fecha de la firma',
            'archivo' => 'contrato',
            'presupuesto' => 'presupuesto',
        ];
    }
}
