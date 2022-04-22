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
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'dni' => 'nullable|string',
            'anho' => 'nullable|numeric',
            'direccion_fiscal' => 'nullable|string',
            'domicilio' => 'nullable|string',
            'nombre_comercial' => 'nullable|string',
            'nombre_sociedad' => 'nullable|string',
            'cif' => 'nullable|string',
            'cuenta_bancaria' => 'nullable|string',
            'n_tarjeta' => 'nullable|numeric',
            'email' => 'nullable|email',
            'telefono' => 'nullable|numeric|min:5',
            'contratos.concepto.*' => 'nullable|string',
            'contratos.referencia.*' => 'nullable|string',
            'contratos.base_imponible.*' => 'nullable|numeric',
            'contratos.iva.*' => 'nullable|numeric',
            'contratos.irpf.*' => 'nullable|numeric',
            'contratos.total.*' => 'nullable|numeric',
            'contratos.fecha.*' => 'nullable|date',
            'contratos.archivo.*' => 'nullable|file',
            'contratos.presupuesto.*' => 'nullable|file',
            'contratos.*.facturas.fechas.*' => 'nullable|date',
            'contratos.*.facturas.archivos.*' => 'nullable|file',
            'facturas.fechas.*' => 'nullable|date',
            'facturas.archivos.*' => 'nullable|file',
            'proyectos.referencia.*' => 'nullable|string',
            'proyectos.concepto.*' => 'nullable|string',
            'proyectos.dominio.usuario.*' => 'nullable|string',
            'proyectos.dominio.contrasenha.*' => 'nullable|string',
            'proyectos.hosting.usuario.*' => 'nullable|string',
            'proyectos.hosting.contrasenha.*' => 'nullable|string',
            'proyectos.*.dominio.nombre.*' => 'nullable|string',
            'proyectos.datos.*' => 'nullable|string',
            'proyectos.*.bd.nombre.*' => 'nullable|string',
            'proyectos.*.bd.host.*' => 'nullable|string',
            'proyectos.*.bd.contrasenha.*' => 'nullable|string',
            'proyectos.*.email.email.*' => 'nullable|string|unique',
            'proyectos.*.email.contrasenha.*' => 'nullable|string',
            'proyectos.*.email.ruta.*' => 'nullable|string',
            'proyectos.*.acceso.dominio.*' => 'nullable|string',
            'proyectos.*.acceso.usuario.*' => 'nullable|string',
            'proyectos.*.acceso.contrasenha.*' => 'nullable|string',
            'proyectos.sepa.*' => 'nullable|file',
            'proyectos.preferencias.*' => 'nullable|file',
            'proyectos.preferencias.*' => 'nullable|file',
            'pagos.abonado.*' => 'nullable|numeric',
            'pagos.pendiente.*' => 'nullable|numeric',
            'pagos.fecha.*' => 'nullable|date',
            'pagos.referencia.*' => 'nullable|string',
        ];
    }

    public function messages(){
        return [
            'nombre.required' => 'El :attribute es obligatorio.',
            'nombre.string' => 'El :attribute es una cadena de caracteres.',
            'apellidos.required' => 'Los :attribute son obligatorios.',
            'apellidos.string' => 'Los :attribute son una cadena de caracteres.',
            'dni.string' => 'El :attribute es una cadena de caracteres.',
            'anho.numeric' => 'El :attribute es un número.',
            'direccionFiscal.string' => 'La :attribute es una cadena de caracteres.',
            'domicilio.string' => 'El :attribute es una cadena de caracteres.',
            'nombreComercial.string' => 'El :attribute es una cadena de caracteres.',
            'nombreSociedad.string' => 'El :attribute es una cadena de caracteres.',
            'cif.string' => 'El :attribute es una cadena de caracteres.',
            'email.email' => 'El :attribute es un correo electrónico.',
            'telefono.numeric' => 'El :attribute es un número de teléfono.',
        ];
    }

    public function attributes(){
        return [
            'nombre' => 'nombre del cliente',
            'apellidos' => 'apenumerollidos del cliente',
            'dni' => 'DNI del cliente',
            'anho' => 'año',
            'direccionFiscal' => 'dirección fiscal del cliente',
            'domicilio' => 'domicilio del cliente',
            'nombreComercial' => 'nombre comercial del cliente',
            'nombreSociedad' => 'nombre de la sociedad del cliente',
            'cif' => 'CIF del cliente',
            'cuentaBancaria' => 'cuenta bancaria del cliente',
            'n_tarjeta' => 'número de la tarjeta del cliente',
            'email' => 'e-mail del cliente',
            'telefono' => 'teléfono del cliente',
            'factura' => 'factura de la mensualidad',
            'fecha_cargo_recurrente' => 'fecha cargo recurrente de la factura',
        ];
    }
}
