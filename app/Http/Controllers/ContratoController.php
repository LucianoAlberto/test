<?php

namespace App\Http\Controllers;

use App\Models\Ambito;
use App\Models\Cliente;
use App\Models\Contrato;
use Illuminate\Http\Request;
use App\Models\ConceptoFactura;
use App\Http\Requests\ContratoRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;

class ContratoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cliente $cliente)
    {
        $rolConPoderes = self::ROLCONPODERES;
        $conceptos = ConceptoFactura::all();
        $contratos = Contrato::where('cliente_id', $cliente->id)->paginate(10);

        return view('contratos.index', compact('cliente', 'contratos', 'rolConPoderes', 'conceptos'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexTotal(Request $request)
    {
        $rolConPoderes = self::ROLCONPODERES;
        $conceptos = ConceptoFactura::all();
        $criterios = Schema::getColumnListing('contratos');

        if(!is_null($request->busqueda) && !is_null($request->criterio)){
            $contratos = Contrato::where($request->criterio, 'LIKE', '%'.$request->busqueda.'%')->paginate(10);
        }
        else{
            $contratos = Contrato::paginate(10);
        }

        return view ('contratos.indexTotal',compact('contratos','rolConPoderes', 'criterios', 'conceptos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cliente $cliente)
    {
        $conceptos = ConceptoFactura::all(['id','nombre']);
        return view('contratos.create',compact('cliente', 'conceptos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContratoRequest $request, Cliente $cliente)
    {
        $validated = $request->validated();
        $contrato = new Contrato;

        if($request->hasFile('archivo')){
            $contrato->archivo = Storage::disk('public')->putFile('contratos/archivos',$validated['archivo'], 'public');
        }

        if($request->hasFile('presupuesto')){
            $contrato->presupuesto = Storage::disk('public')->putFile('contratos/presupuestos',$validated['presupuesto'], 'public');
        }

        $contrato->concepto_facturas_id = $validated['concepto'];

        $contrato->referencia = $validated['referencia'];
        $contrato->fecha_firma = $validated['fecha_firma'];
        $contrato->base_imponible = $validated['base_imponible'];
        $contrato->iva = $validated['iva'];
        $contrato->irpf = $validated['irpf'];
        $contrato->total = $validated['total'];
        $contrato->cliente_id = $cliente->id;

        $contrato->save();

        $rolConPoderes = self::ROLCONPODERES;
        return redirect()->route('contratos.index',compact('cliente', 'rolConPoderes'))->with('creado','si');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente, Contrato $contrato)
    {
        $conceptos = ConceptoFactura::all();
        $rolConPoderes = self::ROLCONPODERES;
        return view('contratos.show', compact('cliente', 'contrato', 'conceptos','rolConPoderes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente, Contrato $contrato)
    {
        $conceptos = ConceptoFactura::all();

        return view('contratos.edit', compact('cliente', 'contrato', 'conceptos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContratoRequest $request, Cliente $cliente, Contrato $contrato)
    {
        $validated = $request->validated();

        if($request->hasFile('archivo')){
            //Si tiene un archivo lo elimina y guarda el nuevo
            if($contrato->archivo != null){
                Storage::disk('public')->delete($contrato->archivo);
            }
            $contrato->archivo = Storage::disk('public')->putFile('contratos/archivos',$validated['archivo'], 'public');
        }

        if($request->hasFile('presupuesto')){
            //Si tiene un presupuesto lo elimina y guarda el nuevo
            if($contrato->presupuesto != null){
                Storage::disk('public')->delete($contrato->presupuesto);
            }
            $contrato->presupuesto = Storage::disk('public')->putFile('contratos/presupuestos',$validated['presupuesto'], 'public');
        }

        $contrato->concepto_facturas_id = $validated['concepto'];

        $contrato->referencia = $validated['referencia'];
        $contrato->fecha_firma = $validated['fecha_firma'];
        $contrato->base_imponible = $validated['base_imponible'];
        $contrato->iva = $validated['iva'];
        $contrato->irpf = $validated['irpf'];
        $contrato->total = $validated['total'];
        $contrato->cliente_id = $cliente->id;

        $contrato->save();

        $rolConPoderes = self::ROLCONPODERES;
        return redirect()->route('contratos.index', compact('cliente', 'contrato', 'rolConPoderes'))->with('editado','si');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente, Contrato $contrato)
    {
        if($contrato->archivo != null){
            Storage::disk('public')->delete($contrato->archivo);
        }
        if($contrato->presupuesto != null){
            Storage::disk('public')->delete($contrato->presupuesto);
        }

        $contrato->delete();
        $rolConPoderes = self::ROLCONPODERES;

        return redirect()->route('contratos.index', compact('rolConPoderes','cliente'))->with('eliminado','si');
    }
}
