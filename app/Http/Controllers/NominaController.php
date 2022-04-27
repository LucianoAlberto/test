<?php

namespace App\Http\Controllers;

use App\Models\Nomina;
use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Http\Requests\NominaRequest;

class NominaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Empleado $empleado)
    {
        $nominas = $empleado->nominas();

        return view('nominas.index', compact('empleado', 'nominas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Empleado $empleado)
    {
        return view('nominas.create', compact('empleado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NominaRequest $request, Empleado $empleado)
    {
        $validated = $request->validated();

        $nomina = new Nomina;
        $nomina->empleado_id = $empleado->id;
        $nomina->fecha_inicio = $validated["fecha_inicio"];
        $nomina->fecha_fin = $validated["fecha_fin"];
        $nomina->importe_total = $validated["importe_total"];
        $nomina->importe_pagado = $validated["importe_pagado"];
        $nomina->fecha_pago = $validated["fecha_pago"];

        $nomina->save();

        return redirect()->route('nominas.index', compact('empleado'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nomina  $nomina
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado, Nomina $nomina)
    {
        return view('nominas.show', compact('empleado', 'nomina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nomina  $nomina
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado, Nomina $nomina)
    {
        return view('nominas.edit', compact('empleado', 'nomina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nomina  $nomina
     * @return \Illuminate\Http\Response
     */
    public function update(NominaRequest $request, Empleado $empleado, Nomina $nomina)
    {
        $validated = $request->validated();

        $nomina->empleado_id = $empleado->id;
        $nomina->fecha_inicio = $validated["fecha_inicio"];
        $nomina->fecha_fin = $validated["fecha_fin"];
        $nomina->importe_total = $validated["importe_total"];
        $nomina->importe_pagado = $validated["importe_pagado"];
        $nomina->fecha_pago = $validated["fecha_pago"];

        $nomina->save();

        return redirect()->route('nominas.index', compact('empleado'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nomina  $nomina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nomina $nomina)
    {
        //
    }
}
