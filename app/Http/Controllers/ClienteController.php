<?php

namespace App\Http\Controllers;

use Request;
use App\Models\Pago;
use App\Models\Acceso;
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
        return view('clientes.create');
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

        if($validated["contratos"]["referencia"][0] != null){
            foreach($validated["contratos"]["concepto"] as $clave_contrato => $concepto){
                $contrato = new Contrato;

                $contrato->cliente_id = $cliente->id;
                $contrato->concepto = $concepto;
                $contrato->referencia = $validated["contratos"]["referencia"][$clave_contrato];
                $contrato->base_imponible = $validated["contratos"]["base_imponible"][$clave_contrato];
                $contrato->iva = $validated["contratos"]["iva"][$clave_contrato];
                $contrato->irpf = $validated["contratos"]["irpf"][$clave_contrato];
                $contrato->total = $validated["contratos"]["total"][$clave_contrato];
                $contrato->fecha_firma = $validated["contratos"]["fecha"][$clave_contrato];

                if(isset($validated["contratos"]["archivo"][$clave_contrato])){
                    $validated["contratos"]["archivo"][$clave_contrato] = Storage::disk('public')->putFile('contratos', $validated["contratos"]["archivo"][$clave_contrato], 'public');
                    $contrato->archivo = $validated["contratos"]["archivo"][$clave_contrato];
                }

                if(isset($validated["contratos"]["presupuesto"][$clave_contrato])){
                    $validated["contratos"]["presupuesto"][$clave_contrato] = Storage::disk('public')->putFile('contratos', $validated["contratos"]["presupuesto"][$clave_contrato], 'public');
                    $contrato->presu1puesto = $validated["contratos"]["presupuesto"][$clave_contrato];
                }

                $contrato->save();

                if(isset($validated["contratos"][$clave_contrato]["facturas"]["archivos"])){
                    foreach($validated["contratos"][$clave_contrato]["facturas"]["fechas"] as $clave_factura => $fecha_factura){
                        $factura_dependiente = new Factura;

                        $factura_dependiente->cliente_id = $cliente->id;
                        $factura_dependiente->fecha_cargo= $fecha_factura;
                        $validated["contratos"][$clave_contrato]["facturas"]["archivos"][$clave_factura] = Storage::disk('public')->putFile('facturas', $validated["contratos"][$clave_contrato]["facturas"]["archivos"][$clave_factura], 'public');
                        $factura_dependiente->factura = $validated["contratos"][$clave_contrato]["facturas"]["archivos"][$clave_factura];

                        $factura_dependiente->save();

                        $contrato->facturas()->attach($factura_dependiente->id);
                    }
                }

            }
        }

        if(isset($validated["facturas"]["archivos"][0])){
            foreach($validated["facturas"]["fechas"] as $clave_factura_independiente => $fecha_factura_independiente){
                $factura_independiente = new Factura;

                $factura_independiente->cliente_id = $cliente->id;
                $factura_independiente->fecha_cargo = $fecha_factura_independiente;
                $validated["facturas"]["archivos"][$clave_factura_independiente] = Storage::disk('public')->putFile('facturas', $validated["facturas"]["archivos"][$clave_factura_independiente], 'public');
                $factura_independiente->factura = $validated["facturas"]["archivos"][$clave_factura_independiente];

                $factura_independiente->save();
            }
        }

        if($validated["proyectos"]["referencia"][0] != null){
            foreach($validated["proyectos"]["referencia"] as $clave_proyecto => $referencia){
                $proyecto = new Proyecto;

                $proyecto->cliente_id = $cliente->id;
                $proyecto->referencia = $validated["proyectos"]["referencia"][$clave_proyecto];
                $proyecto->concepto = $validated["proyectos"]["concepto"][$clave_proyecto];
                $proyecto->proveedor_dominio_usuario = $validated["proyectos"]["dominio"]["usuario"][$clave_proyecto];
                $proyecto->proveedor_dominio_contrasenha = $validated["proyectos"]["dominio"]["contrasenha"][$clave_proyecto];
                $proyecto->proveedor_hosting_usuario = $validated["proyectos"]["hosting"]["usuario"][$clave_proyecto];
                $proyecto->proveedor_hosting_contrasenha = $validated["proyectos"]["hosting"]["contrasenha"][$clave_proyecto];
                $proyecto->otros_datos = $validated["proyectos"]["datos"][$clave_proyecto];

                if(isset($validated["proyectos"]["sepa"][$clave_proyecto])){
                    $validated["proyectos"]["sepa"][$clave_proyecto] = Storage::disk('public')->putFile('sepas', $validated["proyectos"]["sepa"][$clave_proyecto], 'public');
                    $proyecto->sepa = $validated["proyectos"]["sepa"][$clave_proyecto];
                }


                $proyecto->save();

                if($validated["proyectos"][$clave_proyecto]["dominio"]["nombre"][0] != null){
                    foreach($validated["proyectos"][$clave_proyecto]["dominio"]["nombre"] as $nombre_dominio){
                        $objeto_dominio = new Dominio;

                        $objeto_dominio->proyecto_id = $proyecto->id;
                        $objeto_dominio->nombre = $nombre_dominio;

                        $objeto_dominio->save();
                    }
                }

                if($validated["proyectos"][$clave_proyecto]["bd"]["nombre"][0] != null){
                    foreach($validated["proyectos"][$clave_proyecto]["bd"]["nombre"] as $clave_bd => $nombre_bd){
                        $objeto_bd = new BaseDatos;

                        $objeto_bd->proyecto_id = $proyecto->id;
                        $objeto_bd->nombre = $nombre_bd;
                        $objeto_bd->host = $validated["proyectos"][$clave_proyecto]["bd"]["host"][$clave_bd];
                        $objeto_bd->contrasenha = $validated["proyectos"][$clave_proyecto]["bd"]["contrasenha"][$clave_bd];

                        $objeto_bd->save();
                    }
                }

                if($validated["proyectos"][$clave_proyecto]["email"]["email"][0] != null){
                    foreach($validated["proyectos"][$clave_proyecto]["email"]["email"] as $clave_email => $email){
                        $objeto_email = new EmailCorporativo;

                        $objeto_email->proyecto_id = $proyecto->id;
                        $objeto_email->email = $email;
                        $objeto_email->contrasenha = $validated["proyectos"][$clave_proyecto]["email"]["contrasenha"][$clave_email];
                        $objeto_email->ruta_acceso = $validated["proyectos"][$clave_proyecto]["email"]["ruta"][$clave_email];

                        $objeto_email->save();
                    }
                }

                if($validated["proyectos"][$clave_proyecto]["acceso"]["dominio"][0] != null){
                    foreach($validated["proyectos"][$clave_proyecto]["acceso"]["dominio"] as $clave_acceso => $acceso_dominio){
                        $objeto_acceso = new Acceso;

                        $objeto_acceso->proyecto_id = $proyecto->id;
                        $objeto_acceso->dominio = $acceso_dominio;
                        $objeto_acceso->usuario = $validated["proyectos"][$clave_proyecto]["acceso"]["usuario"][$clave_acceso];
                        $objeto_acceso->contrasenha = $validated["proyectos"][$clave_proyecto]["acceso"]["contrasenha"][$clave_acceso];

                        $objeto_acceso->save();
                    }
                }

            }
        }

        if($validated["pagos"]["fecha"][0]){
            foreach($validated["pagos"]["fecha"] as $clave_pago => $fecha_pago){
                $objeto_pago = new Pago;

                $objeto_pago->cliente_id = $cliente->id;
                $objeto_pago->abonado = $validated["pagos"]["abonado"][$clave_pago];
                $objeto_pago->pendiente = $validated["pagos"]["pendiente"][$clave_pago];
                $objeto_pago->fecha = $fecha_pago;
                $objeto_pago->referencia = $validated["pagos"]["referencia"][$clave_pago];

                if($objeto_pago->referencia != null){
                    $objeto_pago->contrato_id = Contrato::where('referencia', '=', $objeto_pago->referencia)->get('id')->first()->id;
                }



                //dd($objeto_pago->contrato_id);
                $objeto_pago->save();
            }
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

    public function contratos(Cliente $cliente){

        return view ('contratos.index',compact('cliente'));
    }

    public function facturas(Cliente $cliente){

        return view ('clientes.facturas',compact('cliente'));
    }
}
