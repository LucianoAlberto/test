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
        //$contratos = $cliente->contratos;

        return view('contratos.index', compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cliente $cliente)
    {
        $conceptos=ConceptoFactura::all(['id','nombre']);
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
        $valido=$request->validated();

        //$cliente=Cliente::where('id',"=",$valido['cliente_id'])->get()->first();

        $contrato=new Contrato;

        if($request->hasFile('archivo')){
            $valido['archivo']=Storage::disk('public')->putFile('contratos/archivos',$valido['archivo']);
            $contrato->archivo=$valido['archivo'];
        }

        if($request->hasFile('presupuesto')){
            $valido['presupuesto']=Storage::disk('public')->putFile('contratos/presupuestos',$valido['presupuesto']);
            $contrato->presupuesto=$valido['presupuesto'];
        }

        $contrato->concepto=$valido['concepto'];
        $contrato->referencia=$valido['referencia'];
        $contrato->fecha_firma=$valido['fecha_firma'];
        $contrato->base_imponible=$valido['base_imponible'];
        $contrato->iva=$valido['iva'];
        $contrato->irpf=$valido['irpf'];
        $contrato->total=$valido['total'];
        $contrato->cliente_id=$cliente->id;

        $contrato->save();

        return redirect()->route('contratos.index',compact('cliente'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente, Contrato $contrato)
    {
        return view('contratos.show', ['cliente' => $cliente, 'contrato' => $contrato]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente, Contrato $contrato)
    {
        return view('contratos.edit', ['cliente' => $cliente, 'contrato' => $contrato]);
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
        $contrato_editado = Contrato::find($contrato->id);

        $valido=$request->validated();

        if($request->hasFile('archivo')){
            $valido['archivo']=Storage::disk('public')->putFile('contratos/archivos',$valido['archivo']);
            $contrato_editado->archivo=$valido['archivo'];
        }

        if($request->hasFile('presupuesto')){
            $valido['presupuesto']=Storage::disk('public')->putFile('contratos/presupuestos',$valido['presupuesto']);
            $contrato_editado->presupuesto=$valido['presupuesto'];
        }

        $contrato_editado->concepto=$valido['concepto'];
        $contrato_editado->referencia=$valido['referencia'];
        $contrato_editado->fecha_firma=$valido['fecha_firma'];
        $contrato_editado->base_imponible=$valido['base_imponible'];
        $contrato_editado->iva=$valido['iva'];
        $contrato_editado->irpf=$valido['irpf'];
        $contrato_editado->total=$valido['total'];
        $contrato_editado->cliente_id=$cliente->id;

        $contrato_editado->save();

        return redirect()->route('contratos.index', ['cliente' => $cliente, 'contrato' => $contrato]);
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

        return redirect()->back();
    }
}
