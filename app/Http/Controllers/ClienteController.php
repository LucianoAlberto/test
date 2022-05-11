<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
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
use App\Http\Requests\FiltroRequest;
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
    public function index(Request $request)
    {

        if(is_null($request->ambito)){
            $clientes = Cliente::paginate(10);
        }
        else{
            //dd($request->ambito);
            //dd($request->ambito);
            if($request->ambito == "sin"){
                $clientes = Cliente::sinAmbito();
            }
            else{
                //dd($request->ambito);
                //dd($request->ambito);
                $clientes = Cliente::conAmbito($request->ambito);
            }




       // return view('clientes.index', compact('clientes', 'ambitos', 'rolConPoderes'));
          // dd($buscar);
        }

        $ambitos = Ambito::all();
        $rolConPoderes = self::ROLCONPODERES;

       return view('clientes.index', compact('clientes', 'ambitos', 'rolConPoderes'));
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

        if(isset($validated['ambito'])){
            foreach($validated['ambito'] as $clave => $ambito){
                //dd($ambito);
                $ambito = Ambito::where('id', $clave)->select('id')->first();

                $cliente->ambitos()->attach($ambito);
            }
        }

        $rolConPoderes = self::ROLCONPODERES;
        return redirect()->route('clientes.index', compact('rolConPoderes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
         //recuperamos los ambitos existentes
         $ambitos=Ambito::all();

        return view('clientes.show', compact('cliente','ambitos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        $ambitos = Ambito::all();

        return view('clientes.edit', compact('cliente', 'ambitos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, Cliente $cliente)
    {
        $validated = $request->validated();

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

        $rolConPoderes = self::ROLCONPODERES;
        return redirect()->route('clientes.index', compact('rolConPoderes'));
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

        $rolConPoderes = self::ROLCONPODERES;
        return redirect()->route('clientes.index', compact('rolConPoderes'));
    }



}

