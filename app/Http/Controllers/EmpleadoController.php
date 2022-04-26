<?php

namespace App\Http\Controllers;

use App\Models\Falta;
use App\Models\Nomina;
use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Http\Requests\EmpleadoRequest;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::paginate(10);

        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\EmpleadoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadoRequest $request)
    {
        $validated = $request->validated();

        //dd($validated);

        $empleado = new Empleado;
        $empleado->nombre = $validated["nombre"];
        $empleado->apellidos = $validated["apellidos"];
        $empleado->dni = $validated["dni"];
        $empleado->numero_ss = $validated["numero_ss"];
        $empleado->fecha_comienzo = $validated["fecha_comienzo"];
        $empleado->fecha_fin = $validated["fecha_fin"];

        if(isset($validated["contrato"])){
            $empleado->contrato = Storage::disk('public')->putFile('empleados/contratos', $validated["contrato"], 'public');
        }

        if(isset($validated["doc_confidencialidad"])){
            $empleado->doc_confidencialidad = Storage::disk('public')->putFile('empleados/doc_confidencialidad', $validated["doc_confidencialidad"], 'public');
        }

        if(isset($validated["doc_normas"])){
            $empleado->doc_normas = Storage::disk('public')->putFile('empleados/doc_normas', $validated["doc_normas"], 'public');
        }

        if(isset($validated["doc_prevencion_riesgos"])){
            $empleado->doc_prevencion_riesgos = Storage::disk('public')->putFile('empleados/doc_prevencion_riesgos', $validated["doc_prevencion_riesgos"], 'public');
        }

        if(isset($validated["doc_reglamento_interno"])){
            $empleado->doc_reglamento_interno = Storage::disk('public')->putFile('empleados/doc_reglamento_interno', $validated["doc_reglamento_interno"], 'public');
        }

        $empleado->save();

        if($validated["nominas"][0]["fecha_inicio"] != null){
            foreach($validated["nominas"] as $nomina){
                $nueva_nomina = new Nomina;

                $nueva_nomina->empleado_id = $empleado->id;
                $nueva_nomina->fecha_inicio = $nomina["fecha_inicio"];
                $nueva_nomina->fecha_fin = $nomina["fecha_fin"];
                $nueva_nomina->importe_total = $nomina["importe_total"];
                $nueva_nomina->importe_pagado = $nomina["importe_pagado"];
                $nueva_nomina->fecha_pago = $nomina["fecha_pago"];

                $nueva_nomina->save();
            }
        }

        if($validated["faltas"][0]["fecha_falta"] != null){
            foreach($validated["faltas"] as $falta){
                $nueva_falta = new Falta;

                $nueva_falta->empleado_id = $empleado->id;
                $nueva_falta->fecha_falta = $falta["fecha_falta"];
                $nueva_falta->justificacion = $falta["justificacion"];
                $nueva_falta->notas = $falta["notas"];

                $nueva_falta->save();
            }
        }

        if($validated["vacaciones"][0]["fecha_inicio"] != null){
            foreach($validated["vacaciones"] as $vacaciones){
                $nuevas_vacaciones = new Vacaciones;

                $nuevas_vacaciones->empleado_id = $empleado->id;
                $nuevas_vacaciones->fecha_inicio = $falta["fecha_inicio"];
                $nuevas_vacaciones->fecha_fin = $falta["fecha_fin"];

                $nuevas_vacaciones->save();
            }
        }

        return redirect()->route('empleados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}
