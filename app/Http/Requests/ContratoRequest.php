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
            'referencia'=>'required|string',
            'base_imponible'=>'required|numeric',
            'iva'=>'required|numeric',
            'irpf'=>'required|numeric',
            'total'=>'required|numeric',
            'fecha_firma'=>'required|date',
            'archivo'=>'nullable|mimes:png,jpg,pdf,docx,txt',
            'presupuesto'=>'nullable|mimes:png,jpg,pdf,docx,txt',
        ];
    }
}
