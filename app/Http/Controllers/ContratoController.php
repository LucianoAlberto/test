<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Contrato;
use Illuminate\Http\Request;
use App\Models\ConceptoFactura;
use App\Http\Requests\ContratoRequest;
use Illuminate\Support\Facades\Storage;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cliente $cliente)
    {
        $contratos = Contrato::where('cliente_id', $cliente->id)->paginate(10);
        //dd($contratos[0]->concepto());
        $rolConPoderes = self::ROLCONPODERES;
        $conceptos = ConceptoFactura::all();

        return view('contratos.index', compact('cliente', 'contratos', 'rolConPoderes', 'conceptos'));
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
        $valido = $request->validated();

        //$cliente=Cliente::where('id',"=",$valido['cliente_id'])->get()->first();

        $contrato = new Contrato;

        if($request->hasFile('archivo')){
            $contrato->archivo = Storage::disk('public')->putFile('contratos/archivos',$valido['archivo'], 'public');
        }

        if($request->hasFile('presupuesto')){
            $contrato->presupuesto = Storage::disk('public')->putFile('contratos/presupuestos',$valido['presupuesto'], 'public');
        }

        $concepto = Concepto::where("nombre", $valido['concepto']);
        $contrato->concepto = $concepto->id;

        $contrato->referencia = $valido['referencia'];
        $contrato->fecha_firma = $valido['fecha_firma'];
        $contrato->base_imponible = $valido['base_imponible'];
        $contrato->iva = $valido['iva'];
        $contrato->irpf = $valido['irpf'];
        $contrato->total = $valido['total'];
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
       $conceptos=ConceptoFactura::all();

        return view('contratos.show', compact('cliente','contrato','conceptos'));
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
        $valido = $request->validated();

        if($request->hasFile('archivo')){
            //Si tiene un archivo lo elimina y guarda el nuevo
            if($contrato->archivo != null){
                Storage::disk('public')->delete($contrato->archivo);
            }
            $contrato->archivo = Storage::disk('public')->putFile('contratos/archivos',$valido['archivo'], 'public');
        }

        if($request->hasFile('presupuesto')){
            //Si tiene un presupuesto lo elimina y guarda el nuevo
            if($contrato->presupuesto != null){
                Storage::disk('public')->delete($contrato->presupuesto);
            }
            $contrato->presupuesto = Storage::disk('public')->putFile('contratos/presupuestos',$valido['presupuesto'], 'public');
        }

        $contrato->concepto = $valido['concepto'];
        $contrato->referencia = $valido['referencia'];
        $contrato->fecha_firma = $valido['fecha_firma'];
        $contrato->base_imponible = $valido['base_imponible'];
        $contrato->iva = $valido['iva'];
        $contrato->irpf = $valido['irpf'];
        $contrato->total = $valido['total'];
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
        $contrato_destruido = Contrato::find($contrato->id);

        if($contrato_destruido->archivo != null){
            Storage::delete($contrato_destruido->archivo);
        }
        if($contrato_destruido->presupuesto != null){
            Storage::delete($contrato_destruido->presupuesto);
        }

        $contrato_destruido->delete();
        $rolConPoderes = self::ROLCONPODERES;

        return redirect()->route('contratos.index', compact('rolConPoderes','cliente'))->with('eliminado','si');
    }
}
