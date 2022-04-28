<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Factura;
use App\Models\Contrato;
use Illuminate\Http\Request;
use App\Http\Requests\FacturaRequest;
use Illuminate\Support\Facades\Storage;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cliente $cliente)
    {
        $proyectos = $cliente->proyectos();
        $facturas = $cliente->facturas();

        return view('facturas.index', compact('cliente', 'proyectos', 'facturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\FacturaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacturaRequest $request, Cliente $cliente)
    {
        $validated = $request->validated();
        //dd($valido);


        $factura = new Factura;
        $factura->cliente_id = $cliente->id;
        $factura->fecha_cargo = $validated['fecha_cargo'];
        $factura->referencia_contrato = $validated['referencia_contrato'];

        if($request->hasFile('factura')){
            $factura->factura = Storage::disk('public')->putFile('facturas', $validated['factura'], 'public');
        }

        $factura->save();

        if($validated['referencia_contrato'] != 0){
            $contrato = Contrato::where('referencia', $validated['referencia_contrato'])->select('id')->get();
            $factura->contratos()->attach($contrato[0]);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente, Factura $factura)
    {
        return view('facturas.show', compact('cliente', 'factura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente, Factura $factura)
    {
        return view('facturas.edit', compact('cliente', 'factura'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(FacturaRequest $request, Cliente $cliente, Factura $factura)
    {

        $validated = $request->validated();

        $factura->cliente_id = $cliente->id;
        $factura->fecha_cargo = $validated['fecha_cargo'];
        $factura->referencia_contrato = $validated['referencia_contrato'];

        if($request->hasFile('factura')){
            //Si tiene una factura la elimina y guarda la nueva
            if($factura->factura != null){
                Storage::disk('public')->delete($factura->factura);
            }
            $factura->factura = Storage::disk('public')->putFile('facturas', $validated['factura'], 'public');
        }

        $factura->save();

        return redirect()->route('facturas.index', compact('cliente'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente, Factura $factura)
    {
        if($factura->factura != null){
            Storage::disk('public')->delete($factura->factura);
        }
            //dd($factura_destruida->contratos);
        $factura->contratos()->detach();
        $factura->delete();

        return redirect()->route('facturas.index', compact('cliente', 'factura'));
    }
}
