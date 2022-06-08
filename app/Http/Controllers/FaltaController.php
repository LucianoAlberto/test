<?php

namespace App\Http\Controllers;

use App\Models\Falta;
use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Http\Requests\FaltaRequest;

class FaltaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Empleado $empleado)
    {
        $faltas = $empleado->faltas();

        $rolConPoderes = self::ROLCONPODERES;
        return view('faltas.index', compact('empleado', 'faltas', 'rolConPoderes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Empleado $empleado)
    {
        return view('faltas.create', compact('empleado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\FaltaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaltaRequest $request, Empleado $empleado)
    {
        $validated = $request->validated();

        $falta = new Falta;
        $falta->empleado_id = $empleado->id;
        $falta->fecha_falta = $validated["fecha_falta"];
        if(!is_null($request->justificacion)){
            $falta->justificacion = "si";
        }else $falta->justificacion = "";

        $falta->notas = $validated["notas"];

        $falta->save();

        $rolConPoderes = self::ROLCONPODERES;
        return redirect()->route('faltas.index', compact('empleado', 'rolConPoderes'))->with('creado','si');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Falta  $falta
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado, Falta $falta)
    {
        return view('faltas.show', compact('empleado', 'falta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Falta  $falta
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado, Falta $falta)
    {
        return view('faltas.edit', compact('empleado', 'falta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\FaltaRequest  $request
     * @param  \App\Models\Falta  $falta
     * @return \Illuminate\Http\Response
     */
    public function update(FaltaRequest $request, Empleado $empleado, Falta $falta)
    {
        $validated = $request->validated();

        $falta->empleado_id = $empleado->id;
        $falta->fecha_falta = $validated["fecha_falta"];

        if(!is_null($request->justificacion)){
            $falta->justificacion = "si";
        }else $falta->justificacion = "";
        $falta->notas = $validated["notas"];

        $falta->save();

        $rolConPoderes = self::ROLCONPODERES;
        return redirect()->route('faltas.index', compact('empleado', 'rolConPoderes'))->with('editado','si');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Falta  $falta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado, Falta $falta)
    {
        $falta->delete();

        $rolConPoderes = self::ROLCONPODERES;
        return redirect()->route('faltas.index', compact('empleado', 'rolConPoderes'))->with('eliminado','si');
    }
}
