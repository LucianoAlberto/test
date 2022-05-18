<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsistenciaRequest extends FormRequest
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
            'archivo' => 'nullable|mimes:png,jpg,pdf,docx,txt,xsl,xsls',
            'fecha_inicio'=>'nullable|date',
            'fecha_fin'=>'nullable|date',
        ];
    }
}
