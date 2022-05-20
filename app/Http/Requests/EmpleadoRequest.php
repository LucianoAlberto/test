<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
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
            'ambito.*'=>'nullable',
            'nombre'=>'required|string',
            'apellidos'=>'required|string',
            'dni' =>'regex:/^([0-9]{8}[A-Z])|[XYZ][0-9]{7}[A-Z]$/',
            'numero_ss'=>'regex:/^\d{12}$/',
            'fecha_comienzo'=>'required|date',
            'fecha_fin'=>'nullable|date',
            'contrato'=>'nullable|mimes:png,jpg,pdf,docx,txt',
            'doc_confidencialidad'=>'nullable|mimes:png,jpg,pdf,docx,txt',
            'doc_normas'=>'nullable|mimes:png,jpg,pdf,docx,txt',
            'doc_prevencion_riesgos'=>'nullable|mimes:png,jpg,pdf,docx,txt',
            'doc_reglamento_interno'=>'nullable|mimes:png,jpg,pdf,docx,txt',
            'practicas'=>'nullable',
            'instituto'=>'nullable|string',
            'localidad'=>'nullable|string',
            'provincia'=>'nullable|string',
            'tutor_practicas'=>'nullable|string',
            'fecha_inicio_practicas'=>'nullable|date',
            'fecha_fin_practicas'=>'nullable|date',
            'convenio_practicas'=>'nullable|mimes:png,jpg,pdf,docx,txt',
            'doc_confidencialidad_practicas'=>'nullable|mimes:png,jpg,pdf,docx,txt',
            'dias_vacaciones'=>'nullable|numeric',
         
        ];
    }
}
