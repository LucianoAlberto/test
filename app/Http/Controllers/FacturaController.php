<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Factura;
use App\Models\Contrato;
use Illuminate\Http\Request;
use App\Http\Requests\FacturaRequest;
use Illuminate\Support\Facades\Schema;
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
        $rolConPoderes = self::ROLCONPODERES;
        $facturas = $cliente->facturas()->paginate(10);

        return view('facturas.index', compact('cliente', 'facturas', 'rolConPoderes'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexTotal(Request $request)
    {
        $rolConPoderes = self::ROLCONPODERES;
        $criterios = Schema::getColumnListing('facturas');

        if(!is_null($request->busqueda) && !is_null($request->criterio)){
            $facturas = Factura::where($request->criterio, 'LIKE', '%'.$request->busqueda.'%')->paginate(10);
        }
        else{
            $facturas = Factura::paginate(10);
        }

        return view ('facturas.indexTotal', compact('facturas', 'rolConPoderes', 'criterios'));
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

        $factura = new Factura;
        $factura->cliente_id = $cliente->id;
        $factura->fecha_cargo = $validated['fecha_cargo'];
        $factura->referencia_contrato = $validated['referencia_contrato'];

        if($request->hasFile('factura')){
            $factura->factura = Storage::disk('public')->putFile('facturas', $validated['factura'], 'public');
        }

        $factura->save();

        if($validated['referencia_contrato'] != 0){
            $contrato = Contrato::where('referencia', $validated['referencia_contrato'])->select('id')->first();

            $factura->contratos()->attach($contrato->id);
        }

        $rolConPoderes = self::ROLCONPODERES;
        return redirect()->route('facturas.index', compact('cliente', 'rolConPoderes'))->with('creado','si');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente, Factura $factura)
    {

        $rolConPoderes = self::ROLCONPODERES;
        return view('facturas.show', compact('cliente', 'factura','rolConPoderes'));
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

        $facutra_antigua=$factura;
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

        $rolConPoderes = self::ROLCONPODERES;
        return redirect()->route('facturas.index', compact('cliente', 'rolConPoderes'))->with('editado','si');
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
        $factura->contratos()->detach();
        $factura->delete();

        $rolConPoderes = self::ROLCONPODERES;
        return redirect()->route('facturas.index', compact('cliente', 'factura', 'rolConPoderes'))->with('eliminado','si');
    }
}
