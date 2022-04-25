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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacturaRequest $request, Cliente $cliente)
    {
        $valido=$request->validated();
        //dd($cliente);
        if($request->hasFile('file')){
            $valido['file']=Storage::disk('public')->putFile('uploads_factura',$valido['file']);
        }

        $factura = new Factura;
        $factura->cliente_id = $cliente->id;

        $factura->fecha_cargo = $valido['fecha_cargo'];
        $factura->factura = $valido['file'];
        $factura->referencia_contrato = $valido['referencia_contrato'];

        $factura->save();

        if($valido['referencia_contrato']!=0){
            $contrato = Contrato::where('referencia',$valido['referencia_contrato'])->select('id')->get();
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
        return view('facturas.show', ['cliente' => $cliente, 'factura' => $factura]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente, Factura $factura)
    {
        return view('facturas.edit', ['cliente' => $cliente, 'factura' => $factura]);
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

        $valido=$request->validated();

        $factura->cliente_id = $cliente->id;
        $factura->fecha_cargo = $valido['fecha_cargo'];
        $factura->referencia_contrato = $valido['referencia_contrato'];

        if($request->hasFile('file')){
            $valido['file']=Storage::disk('public')->putFile('facturas',$valido['file']);
            $factura->factura=$valido['file'];
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
        //wtf...
        $factura_destruida = Factura::find($factura->id);

        if($factura_destruida->factura != null){
            Storage::delete($factura_destruida->factura);
        }
            //dd($factura_destruida->contratos);
        $factura_destruida->contratos()->detach();
        $factura_destruida->delete();

        return redirect()->route('facturas.index', ['cliente' => $cliente, 'factura' => $factura]);
    }
}
