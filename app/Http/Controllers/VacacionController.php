<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Vacacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\VacacionRequest;

class VacacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Empleado $empleado)
    {
        $vacaciones = $empleado->vacaciones;

        $dias = DB::table('vacacions')
             ->select(DB::raw('DATEDIFF(fecha_fin, fecha_inicio) as dias'))
             ->get('dias');           
      
        $rolConPoderes = self::ROLCONPODERES;
        return view('vacaciones.index', compact('empleado', 'vacaciones', 'rolConPoderes','dias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Empleado $empleado)
    {
        return view('vacaciones.create', compact('empleado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\VacacionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VacacionRequest $request, Empleado $empleado)
    {
        $validated = $request->validated();

        $vacacion = new Vacacion;
        $vacacion->empleado_id = $empleado->id;
        $vacacion->fecha_inicio = $validated["fecha_inicio"];
        $vacacion->fecha_fin = $validated["fecha_fin"];

        $vacacion->save();

        $rolConPoderes = self::ROLCONPODERES;
        return redirect()->route('vacaciones.index', compact('empleado', 'rolConPoderes'))->with('creado','si');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacacion  $vacacion
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado, Vacacion $vacacion)
    {
        return view('vacaciones.show', compact('empleado', 'vacacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacacion  $vacacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado, Vacacion $vacacion)
    {
        return view('vacaciones.edit', compact('empleado', 'vacacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\VacacionRequest  $request
     * @param  \App\Models\Vacacion  $vacacion
     * @return \Illuminate\Http\Response
     */
    public function update(VacacionRequest $request, Empleado $empleado, Vacacion $vacacion)
    {
        $validated = $request->validated();

        $vacacion->empleado_id = $empleado->id;
        $vacacion->fecha_inicio = $validated["fecha_inicio"];
        $vacacion->fecha_fin = $validated["fecha_fin"];

        $vacacion->save();

        $rolConPoderes = self::ROLCONPODERES;
        return redirect()->route('vacaciones.index', compact('empleado', 'rolConPoderes'))->with('editado','si');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacacion  $vacacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado, Vacacion $vacacion)
    {
        $vacacion->delete();

        $rolConPoderes = self::ROLCONPODERES;
        return redirect()->route('vacaciones.index', compact('empleado', 'rolConPoderes'))->with('eliminado','si');
    }
}
