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
            'nombre'=>'required|string',
            'apellidos'=>'required|string',
            'dni'=>'required|numeric',
            'numero_ss'=>'required|numeric',
            'fecha_comienzo'=>'required|date',
            'fecha_fin'=>'nullable|date',
            'contrato'=>'nullable|mimes:png,jpg,pdf,docx,txt',
            'doc_confidencialidad'=>'nullable|mimes:png,jpg,pdf,docx,txt',
            'doc_normas'=>'nullable|mimes:png,jpg,pdf,docx,txt',
            'doc_prevencion_riesgos'=>'nullable|mimes:png,jpg,pdf,docx,txt',
            'doc_reglamento_interno'=>'nullable|mimes:png,jpg,pdf,docx,txt',
            'nominas.*.fecha_inicio'=>'nullable|date',
            'nominas.*.fecha_fin'=>'nullable|date',
            'nominas.*.horas_alta_ss'=>'nullable|numeric',
            'nominas.*.importe_total'=>'nullable|numeric',
            'nominas.*.importe_pagado'=>'nullable|numeric',
            'nominas.*.fecha_pago'=>'nullable|date',
            'faltas.*.fecha_falta'=>'nullable|date',
            'faltas.*.justificacion'=>'nullable|string',
            'faltas.*.notas'=>'nullable|string',
            'vacaciones_total'=>'nullable|numeric',
            'vacaciones_disfrutadas.*.fecha_inicio'=>'nullable|date',
            'vacaciones_disfrutadas.*.fecha_fin'=>'nullable|date',
            'practicas'=>'nullable|boolean',
            'instituto'=>'nullable|string',
            'localidad'=>'nullable|string',
            'provincia'=>'nullable|string',
            'tutor_practicas'=>'nullable|string',
            'fecha_inicio_practicas'=>'nullable|date',
            'fecha_fin_practicas'=>'nullable|date',
            'convenio_practicas'=>'nullable|mimes:png,jpg,pdf,docx,txt',
            'doc_confidencialidad_practicas'=>'nullable|mimes:png,jpg,pdf,docx,txt',
            'faltas_practicas.*.fecha_falta'=>'nullable|date',
            'faltas_practicas.*.justificacion'=>'nullable|string',
            'faltas_practicas.*.notas'=>'nullable|string',
        ];
    }
}
