<?php

namespace App\Http\Controllers;

use App\Models\Falta;
use App\Models\Ambito;
use App\Models\Nomina;
use App\Models\Empleado;
use App\Models\Practica;
use App\Models\Vacacion;
use Illuminate\Http\Request;
use App\Http\Requests\FiltroRequest;
use App\Http\Requests\EmpleadoRequest;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $empleados = Empleado::paginate(10);
        // $ambitos = Ambito::all();
        // $rolConPoderes = self::ROLCONPODERES;

        // return view('empleados.index', compact('empleados', 'ambitos', 'rolConPoderes'));
        if(is_null($request->ambito)){
            $empleados = Empleado::paginate(10);
        }
        else{
            //dd($request->ambito);
            //dd($request->ambito);
            if($request->ambito == "sin"){
                $empleados = Empleado::sinAmbito();
            }
            else{
                //dd($request->ambito);
                //dd($request->ambito);
                $empleados = Empleado::conAmbito($request->ambito);
            }
        // return view('clientes.index', compact('clientes', 'ambitos', 'rolConPoderes'));
          // dd($buscar);
        }

        $ambitos = Ambito::all();
        $rolConPoderes = self::ROLCONPODERES;

        return view('empleados.index', compact('empleados', 'ambitos', 'rolConPoderes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ambitos = Ambito::all();
        return view('empleados.create', compact('ambitos'));
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
        $empleado = new Empleado;
        $empleado->nombre = $validated["nombre"];
        $empleado->apellidos = $validated["apellidos"];
        $empleado->dni = $validated["dni"];
        $empleado->numero_ss = $validated["numero_ss"];
        $empleado->fecha_comienzo = $validated["fecha_comienzo"];
        $empleado->fecha_fin = $validated["fecha_fin"];
        $empleado->created_at=now('Europe/Madrid');
        $empleado->updated_at=now('Europe/Madrid');

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

        if(isset($validated['ambito'])){
            foreach($validated['ambito'] as $clave => $ambito){
                $ambito = Ambito::where('id', $clave)->select('id')->first();

                $empleado->ambitos()->attach($ambito);
            }
        }


        if($request->has('practicas')){
            $practicas = new Practica;

            $practicas->empleado_id = $empleado->id;
            $practicas->instituto = $validated["instituto"];
            $practicas->localidad = $validated["localidad"];
            $practicas->provincia = $validated["provincia"];
            $practicas->tutor_practicas = $validated["tutor_practicas"];
            $practicas->fecha_inicio = $validated["fecha_inicio_practicas"];
            $practicas->fecha_fin = $validated["fecha_fin_practicas"];
            $practicas->created_at=now('Europe/Madrid');
            $practicas->updated_at=now('Europe/Madrid');

            if(isset($validated["convenio_practicas"])){
                $practicas->convenio = Storage::disk('public')->putFile('practicas/convenios', $validated["convenio_practicas"], 'public');
            }

            if(isset($validated["doc_confidencialidad_practicas"])){
                $practicas->doc_confidencialidad = Storage::disk('public')->putFile('practicas/doc_confidencialidad', $validated["doc_confidencialidad_practicas"], 'public');
            }

            $practicas->save();
        }

        $rolConPoderes = self::ROLCONPODERES;
        return redirect()->route('empleados.index', compact('rolConPoderes'))->with('creado','si');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        return view('empleados.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        $ambitos = Ambito::all();

        return view('empleados.edit', compact('empleado', 'ambitos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(EmpleadoRequest $request, Empleado $empleado)
    {

        $validated = $request->validated();
        $empleado->nombre = $validated["nombre"];
        $empleado->apellidos = $validated["apellidos"];
        $empleado->dni = $validated["dni"];
        $empleado->numero_ss = $validated["numero_ss"];
        $empleado->fecha_comienzo = $validated["fecha_comienzo"];
        $empleado->fecha_fin = $validated["fecha_fin"];

        if(isset($validated["contrato"])){
            if($empleado->contrato != null){
                Storage::disk('public')->delete($empleado->contrato);
            }
            $empleado->contrato = Storage::disk('public')->putFile('empleados/contratos', $validated["contrato"], 'public');
        }

        if(isset($validated["doc_confidencialidad"])){
            if($empleado->doc_confidencialidad != null){
                Storage::disk('public')->delete($empleado->doc_confidencialidad);
            }
            $empleado->doc_confidencialidad = Storage::disk('public')->putFile('empleados/doc_confidencialidad', $validated["doc_confidencialidad"], 'public');
        }

        if(isset($validated["doc_normas"])){
            if($empleado->doc_normas != null){
                Storage::disk('public')->delete($empleado->doc_normas);
            }
            $empleado->doc_normas = Storage::disk('public')->putFile('empleados/doc_normas', $validated["doc_normas"], 'public');
        }

        if(isset($validated["doc_prevencion_riesgos"])){
            if($empleado->doc_prevencion_riesgos != null){
                Storage::disk('public')->delete($empleado->doc_prevencion_riesgos);
            }
            $empleado->doc_prevencion_riesgos = Storage::disk('public')->putFile('empleados/doc_prevencion_riesgos', $validated["doc_prevencion_riesgos"], 'public');
        }

        if(isset($validated["doc_reglamento_interno"])){
            if($empleado->doc_reglamento_interno != null){
                Storage::disk('public')->delete($empleado->doc_reglamento_interno);
            }
            $empleado->doc_reglamento_interno = Storage::disk('public')->putFile('empleados/doc_reglamento_interno', $validated["doc_reglamento_interno"], 'public');
        }

        $empleado->save();

        $empleado->ambitos()->detach();

        if(isset($validated['ambito'])){
            foreach($validated['ambito'] as $clave => $ambito){        
                $empleado->ambitos()->attach($clave);

            }
        }

        if($request->has('practicas')){
         
            if( $empleado->practica == null){
                $practicas = new Practica;
                
            }
            else $practicas = $empleado->practica;
            
            $practicas->empleado_id = $empleado->id;
            $practicas->instituto = $validated["instituto"];
            $practicas->localidad = $validated["localidad"];
            $practicas->provincia = $validated["provincia"];
            $practicas->tutor_practicas = $validated["tutor_practicas"];
            $practicas->fecha_inicio = $validated["fecha_inicio_practicas"];
            $practicas->fecha_fin = $validated["fecha_fin_practicas"];


            if($request->has('convenio_practicas')){
                if($practicas->convenio_practicas!=null){
                Storage::disk('public')->delete($practicas->convenio);  //eliminamos le antiguo 
                }
                $practicas->convenio = Storage::disk('public')->putFile('practicas/convenios', $validated["convenio_practicas"], 'public'); //escribimos el nuevo
            }

            if($request->has('doc_confidencialidad_practicas')){
                if($practicas->doc_confidencialidad!=null){
                Storage::disk('public')->delete($practicas->doc_confidencialidad); 
                }
                $practicas->doc_confidencialidad=Storage::disk('public')->putFile('practicas/doc_confidencialidad', $validated["doc_confidencialidad_practicas"], 'public');
            }
            
            $practicas->save();
        }

        $rolConPoderes = self::ROLCONPODERES;
        return redirect()->route('empleados.index')->with('editado','si');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)

    {
        
        if(isset($empleado->practica)) $empleado->practica->delete(); 
         $empleado->ambitos()->detach();
         $empleado->delete();

         $rolConPoderes = self::ROLCONPODERES;
         return redirect()->route('empleados.index')->with('eliminado','si');

    }

}
