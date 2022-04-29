<?php

namespace App\Http\Controllers;

use Request;
use App\Models\Pago;
use App\Models\Acceso;
use App\Models\Ambito;
use App\Models\Cliente;
use App\Models\Dominio;
use App\Models\Factura;
use App\Models\Contrato;
use App\Models\Proyecto;
use App\Models\BaseDatos;
use App\Models\ConceptoFactura;
use App\Models\EmailCorporativo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ClienteRequest;
use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::paginate(10);

        return view('clientes.index', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ambitos = Ambito::all();

        return view('clientes.create', compact('ambitos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ClienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {

        $validated = $request->validated();

        //dd($validated);
        //$datos = $request->except('_token');

        //$errors = $request->errors();
        //dd($validated);
        //Cliente::insert($validated);
        $cliente = new Cliente;
        $cliente->nombre = $validated["nombre"];
        $cliente->apellidos = $validated["apellidos"];
        $cliente->dni = $validated["dni"];
        $cliente->anho_contable = $validated["anho_contable"];
        $cliente->direccion_fiscal = $validated["direccion_fiscal"];
        $cliente->domicilio = $validated["domicilio"];
        $cliente->nombre_comercial = $validated["nombre_comercial"];
        $cliente->nombre_sociedad = $validated["nombre_sociedad"];
        $cliente->cif = $validated["cif"];
        $cliente->cuenta_bancaria = $validated["cuenta_bancaria"];
        $cliente->n_tarjeta = $validated["n_tarjeta"];
        $cliente->email = $validated["email"];
        $cliente->telefono = $validated["telefono"];

        $cliente->save();

        if($validated['ambito'] != 0){
            $ambito = Ambito::where('nombre', $validated['ambito'])->select('id')->first();
            $cliente->ambitos()->attach($ambito);
        }

        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $validated = $request->except('_token');

        $cliente->nombre = $validated["nombre"];
        $cliente->apellidos = $validated["apellidos"];
        $cliente->dni = $validated["dni"];
        $cliente->anho_contable = $validated["anho_contable"];
        $cliente->direccion_fiscal = $validated["direccion_fiscal"];
        $cliente->domicilio = $validated["domicilio"];
        $cliente->nombre_comercial = $validated["nombre_comercial"];
        $cliente->nombre_sociedad = $validated["nombre_sociedad"];
        $cliente->cif = $validated["cif"];
        $cliente->cuenta_bancaria = $validated["cuenta_bancaria"];
        $cliente->n_tarjeta = $validated["n_tarjeta"];
        $cliente->email = $validated["email"];
        $cliente->telefono = $validated["telefono"];

        $cliente->save();

        return redirect()->route('clientes.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        Contrato::where('cliente_id', $cliente->id)->delete();
        Factura::where('cliente_id', $cliente->id)->delete();
        Proyecto::where('cliente_id', $cliente->id)->delete();

        $cliente->delete();

        return redirect()->route('clientes.index');
    }

    public function filtrado(Request $request){

        $clientes = Cliente::where('nombre', $validated['ambito'])->select('id')->first();

        return view('clientes.index', ['clientes' => $clientes]);

        return view ('contratos.index',compact('cliente'));
    }

}
