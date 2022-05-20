<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Asistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AsistenciaRequest;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Empleado $empleado)
    {
        $vacaciones = $empleado->vacaciones();     
        $asistencias=Asistencia::where('empleado_id',$empleado->id)->paginate(10);


        $rolConPoderes = self::ROLCONPODERES;
        return view('asistencias.index', compact('empleado', 'asistencias', 'rolConPoderes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Empleado $empleado)
    {
        return view('asistencias.create', compact('empleado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\AsistenciaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AsistenciaRequest $request, Empleado $empleado)
    {
        $validated = $request->validated();

        $asistencia = new Asistencia;
        $asistencia->empleado_id = $empleado->id;

        if($request->hasFile('archivo')){
            $asistencia->archivo = Storage::disk('public')->putFile('asistencias', $validated['archivo'], 'public');
        }

        $asistencia->fecha_inicio = $validated["fecha_inicio"];
        $asistencia->fecha_fin = $validated["fecha_fin"];

        $asistencia->save();

        $rolConPoderes = self::ROLCONPODERES;
        return redirect()->route('asistencias.index', compact('empleado', 'rolConPoderes'))->with('creado','si');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function show(Asistencia $asistencia)
    {
        return view('asistencias.show', compact('empleado', 'asistencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado, Asistencia $asistencia)
    {
        return view('asistencias.edit', compact('empleado', 'asistencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\AsistenciaRequest  $request
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(AsistenciaRequest $request, Empleado $empleado, Asistencia $asistencia)
    {
        $validated = $request->validated();

        $asistencia->empleado_id = $empleado->id;

        if($request->hasFile('archivo')){
            //Si tiene un archivo lo elimina y guarda el nuevo
            if($asistencia->archivo != null){
                Storage::disk('public')->delete($asistencia->archivo);
            }
            $asistencia->archivo = Storage::disk('public')->putFile('asistencias', $validated['archivo'], 'public');
        }
        $asistencia->fecha_inicio = $validated["fecha_inicio"];
        $asistencia->fecha_fin = $validated["fecha_fin"];

        $asistencia->save();

        $rolConPoderes = self::ROLCONPODERES;
        return redirect()->route('asistencias.index', compact('empleado', 'rolConPoderes'))->with('editado','si');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado, Asistencia $asistencia)
    {
        $asistencia->delete();

        $rolConPoderes = self::ROLCONPODERES;
       return redirect()->route('asistencias.index', compact('empleado', 'rolConPoderes'))->with('eliminado','si');
    }
}
