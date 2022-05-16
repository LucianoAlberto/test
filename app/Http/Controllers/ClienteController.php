<?php

namespace App\Http\Controllers;


use App\Models\Pago;
use App\Models\Acceso;
use App\Models\Ambito;
use App\Models\Cliente;
use App\Models\Dominio;
use App\Models\Factura;
use App\Models\Contrato;
use App\Models\Proyecto;
use App\Models\BaseDatos;
use Illuminate\Http\Request;
use App\Models\ConceptoFactura;
use App\Models\EmailCorporativo;
use App\Http\Requests\FiltroRequest;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ClienteRequest;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;https://www.google.com/search?channel=fs&client=ubuntu&q=dev


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
            if($request->ambito == "sin"){
                $clientes = Cliente::sinAmbito();
            }
            else{
                $clientes = Cliente::conAmbito($request->ambito);
            }
        }
      //  dd($request->busqueda);
        if(!is_null($request->busqueda) && !is_null($request->criterio)){
            $clientes = Cliente::where($request->criterio, 'LIKE','%'.$request->busqueda.'%')->paginate(10);
        }

        $ambitos = Ambito::all();
        $rolConPoderes = self::ROLCONPODERES;
        
       if(Cliente::first()){
        $cliente = Cliente::first();
       }
       $criterios = Schema::getColumnListing('clientes');
       return view('clientes.index', compact('clientes', 'ambitos', 'rolConPoderes', 'criterios'));

        //dd($clientes);
      
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
                $ambito = Ambito::where('id', $clave)->select('id')->first();

                $cliente->ambitos()->attach($ambito);
            }
        }

        $rolConPoderes = self::ROLCONPODERES;
        return redirect()->route('clientes.index', compact('rolConPoderes'))->with('creado','si');
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
    public function update(ClienteRequest $request, Cliente $cliente){
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
        $cliente->updated_at = now("Europe/Madrid");

        $cliente->save();

        $cliente->ambitos()->detach();
        //dd($validated['ambito']);
        if(isset($validated['ambito'])){
            foreach($validated['ambito'] as $clave => $ambito){
                //dd($clave);
                //$ambito = Ambito::where('id', $clave)->select('id')->first();
                $cliente->ambitos()->attach($clave);
            }
        }

        $rolConPoderes = self::ROLCONPODERES;
        return redirect()->route('clientes.index')->with('editado','si');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        foreach($cliente->contratos as $contrato){
            if($contrato->archivo != null){
                Storage::disk('public')->delete($contrato->archivo);
            }
            if($contrato->presupuesto != null){
                Storage::disk('public')->delete($contrato->presupuesto);
            }
            $contrato->facturas()->detach();
            $contrato->delete();
        }

        foreach($cliente->facturas as $factura){
            if($factura->factura != null){
                Storage::disk('public')->delete($factura->factura);
            }
                //dd($factura_destruida->contratos);
            $factura->contratos()->detach();
            $factura->delete();
        }

        foreach($cliente->proyectos as $proyecto){
            if($proyecto->sepa != null){
                Storage::disk('public')->delete($proyecto->sepa);
            }

            if($proyecto->preferencias != null){
                Storage::disk('public')->delete($proyecto->preferencias);
            }
            $proyecto->basedatoss()->delete();
            $proyecto->dominios()->delete();
            $proyecto->emailcorporativos()->delete();
            $proyecto->accesos()->delete();

            $proyecto->delete();
        }

        $cliente->ambitos()->detach();
        $cliente->delete();

        $rolConPoderes = self::ROLCONPODERES;
        return redirect()->route('clientes.index', compact('rolConPoderes'))->with('eliminado','si');
    }
}

