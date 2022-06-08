<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NominaRequest extends FormRequest
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
            'fecha_inicio'=>'required|date',
            'fecha_fin'=>'required|date',
            'horas_alta_ss'=>'required|numeric',
            'importe_total'=>'required|numeric',
            'importe_pagado'=>'required|numeric',
            'pago_extra'=>'nullable|numeric',
            'fecha_pago'=>'nullable|date',
        ];
    }
}
