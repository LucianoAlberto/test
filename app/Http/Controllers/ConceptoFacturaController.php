<?php

namespace App\Http\Controllers;

use App\Models\ConceptoFactura;
use Illuminate\Http\Request;

class ConceptoFacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $conceptoFactura=new ConceptoFactura;
        $conceptoFactura->nombre=$request['nuevoConcepto'];
        $conceptoFactura->save();

        return redirect()->back()->with('conceptoCreado','si');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConceptoFactura  $conceptoFactura
     * @return \Illuminate\Http\Response
     */
    public function show(ConceptoFactura $conceptoFactura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConceptoFactura  $conceptoFactura
     * @return \Illuminate\Http\Response
     */
    public function edit(ConceptoFactura $conceptoFactura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConceptoFactura  $conceptoFactura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConceptoFactura $conceptoFactura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConceptoFactura  $conceptoFactura
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConceptoFactura $conceptoFactura)
    {
        $conceptoFactura->delete();
    }

    public function eliminar(Request $request)
    {
        //dd($request);
        ConceptoFactura::where('nombre', $request['eliminarConcepto'])->delete();

        return redirect()->back()->with('conceptoEliminado','si');
    }
}
