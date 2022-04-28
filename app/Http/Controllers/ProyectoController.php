<?php

namespace App\Http\Controllers;

use App\Models\Acceso;
use App\Models\Cliente;
use App\Models\Dominio;
use App\Models\Proyecto;
use App\Models\BaseDatos;
use Illuminate\Http\Request;
use App\Models\ConceptoFactura;
use App\Models\EmailCorporativo;
use App\Http\Requests\ProyectoRequest;
use Illuminate\Support\Facades\Storage;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cliente $cliente)
    {
        $proyectos = $cliente->proyectos;

        return view('proyectos.index', compact('cliente','proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cliente $cliente)
    {
        //recuperamos los contratos del cliente
        $contratos = $cliente->contratos;

        //obtenemos todos los conceptos de la BD
        $conceptos = ConceptoFactura::all(['id','nombre']);

        return view('proyectos.create', compact('cliente','conceptos','contratos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\ProyectoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProyectoRequest $request, Cliente $cliente)
    {
        //obtenemos todos los conceptos de la BD
        $conceptos = ConceptoFactura::all(['id','nombre']);

        //recuperamos los contratos de este cliente
        $contratos = $cliente->contratos;

        $valido = $request->validated();
        //dd($valido);
        $proyecto = new Proyecto;

        if($request->hasFile('sepa')){
            $proyecto->sepa = Storage::disk('public')->putFile('sepa', $valido['sepa'], 'public');
        }

        if($request->hasFile('hoja_preferencia')){
            $proyecto->preferencias = Storage::disk('public')->putFile('hojas_preferencia', $valido['hoja_preferencia'], 'public');
        }

        $proyecto->concepto = $valido['concepto'];
        $proyecto->referencia = $valido['referencia'];
        $proyecto->proveedor_dominio_usuario = $valido['proveedor_dominio_usuario'];
        $proyecto->proveedor_dominio_contrasenha = $valido['proveedor_dominio_contrasenha'];
        $proyecto->proveedor_hosting_usuario = $valido['proveedor_hosting_usuario'];
        $proyecto->proveedor_hosting_contrasenha = $valido['proveedor_hosting_contrasenha'];
        $proyecto->otros_datos = $valido['otros_datos'];
        $proyecto->cliente_id = $cliente->id;

        $proyecto->save();

        foreach($valido['dominio'] as $dominio){
            $nuevo_dominio = new Dominio;
            $nuevo_dominio->nombre = $dominio['nombre'];
            $nuevo_dominio->usuario = $dominio['usuario'];
            $nuevo_dominio->contrasenha = $dominio['contrasenha'];
            $nuevo_dominio->proyecto_id = $proyecto->id;
            $nuevo_dominio->save();
        }

        foreach($valido['bd'] as $bd){
            $nueva_bd = new BaseDatos;
            $nueva_bd->nombre = $bd['nombre'];
            $nueva_bd->host = $bd['host'];
            $nueva_bd->contrasenha = $bd['contrasenha'];
            $nueva_bd->proyecto_id = $proyecto->id;
            $nueva_bd->save();
        }

        foreach($valido['email'] as $email){
            $nuevo_email = new EmailCorporativo;
            $nuevo_email->email = $email['email'];
            $nuevo_email->contrasenha = $email['contrasenha'];
            $nuevo_email->ruta_acceso = $email['ruta_acceso'];
            $nuevo_email->proyecto_id = $proyecto->id;
            $nuevo_email->save();
        }

        foreach($valido['acceso'] as $acceso){
            $nuevo_acceso = new Acceso;
            $nuevo_acceso->dominio = $acceso['dominio'];
            $nuevo_acceso->usuario = $acceso['usuario'];
            $nuevo_acceso->contrasenha = $acceso['contrasenha'];
            $nuevo_acceso->proyecto_id = $proyecto->id;
            $nuevo_acceso->save();
        }

        return redirect()->route('proyectos.index',compact('cliente'));
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente, Proyecto $proyecto)
    {
        return view('proyectos.show', compact('cliente', 'proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente, Proyecto $proyecto)
    {
        //recuperamos los contratos del cliente
        $contratos = $proyecto->cliente->contratos;

        //obtenemos todos los conceptos de la BD
        $conceptos = ConceptoFactura::all(['id','nombre']);

        return view('proyectos.edit', compact('proyecto','conceptos','contratos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(ProyectoRequest $request, Cliente $cliente, Proyecto $proyecto)
    {
        //obtenemos todos los conceptos de la BD
        $conceptos = ConceptoFactura::all(['id','nombre']);
        //dd($proyecto);
        //recuperamos los contratos de este cliente
        $contratos = $proyecto->cliente->contratos;

        $valido = $request->validated();

        $proyecto->updated_at = now("Europe/Madrid");

        if($request->hasFile('sepa')){
            //Si tiene un sepa lo elimina y guarda el nuevo
            if($proyecto->sepa != null){
                Storage::disk('public')->delete($proyecto->sepa);
            }
            $proyecto->sepa = Storage::disk('public')->putFile('sepa', $valido['sepa'], 'public');
        }

        if($request->hasFile('hoja_preferencia')){
            //Si tiene una hja de preferencia la elimina y guarda la nueva
            if($proyecto->preferencias != null){
                Storage::disk('public')->delete($proyecto->preferencias);
            }
            $proyecto->preferencias = Storage::disk('public')->putFile('hojas_preferencia', $valido['hoja_preferencia'], 'public');
        }

        $proyecto->concepto = $valido['concepto'];
        $proyecto->referencia = $valido['referencia'];
        $proyecto->proveedor_dominio_usuario = $valido['proveedor_dominio_usuario'];
        $proyecto->proveedor_dominio_contrasenha = $valido['proveedor_dominio_contrasenha'];
        $proyecto->proveedor_hosting_usuario = $valido['proveedor_hosting_usuario'];
        $proyecto->proveedor_hosting_contrasenha = $valido['proveedor_hosting_contrasenha'];
        $proyecto->otros_datos = $valido['otros_datos'];
        $proyecto->cliente_id = $proyecto->cliente->id;

        $proyecto->save();


        //recuperamos los dominios de este proyecto y los eliminamos y guardaremos los nuevos
        $dominios_antiguos = Dominio::where('proyecto_id',$proyecto->id)->delete();
        foreach($valido['dominio_nombre'] as $key => $valor){
            if($valido['dominio_nombre'][$key] != null && $valido['dominio_usuario'][$key] != null && $valido['dominio_password'][$key] != null){
            $dominio = new Dominio;
            $dominio->nombre = $valor;
            $dominio->usuario = $valido['dominio_usuario'][$key];
            $dominio->password = $valido['dominio_password'][$key];
            $dominio->proyecto_id = $proyecto->id;
            $dominio->save();
            }
        }

        //recuperamos las BBDD de este proyecto y los eliminamos y guardaremos los nuevos
        $bd_antiguas = BaseDatos::where('proyecto_id',$proyecto->id)->delete();
        foreach($valido['bd_nombre'] as $key => $valor){
            if($valido['bd_nombre'][$key] != null && $valido['host'][$key] != null && $valido['bd_password'][$key] != null){
            $bd = new BaseDatos;
            $bd->nombre = $valor;
            $bd->host = $valido['host'][$key];
            $bd->password = $valido['bd_password'][$key];
            $bd->proyecto_id = $proyecto->id;
            }
        }


        //recuperamos los emails de este proyecto y los eliminamos y guardaremos los nuevos
        $emails_antiguos=EmailCorporativo::where('proyecto_id',$proyecto->id)->delete();
        foreach($valido['email'] as $key => $valor){
            if($valido['email'][$key] != null && $valido['password'][$key] != null && $valido['ruta_accesso'][$key] != null){
                $email = new EmailCorporativo;
                $email->email = $valor;
                $email->password = $valido['password'][$key];
                $email->ruta_accesso = $valido['ruta_accesso'][$key];
                $email->proyecto_id = $proyecto->id;
                $email->save();
            }
        }

        //recuperamos los accesos de este proyecto y los eliminamos y guardaremos los nuevos
        $accesos_antiguos=Acceso::where('proyecto_id',$proyecto->id)->delete();
        foreach($valido['dominio_accesso'] as $key => $valor){
            if($valido['dominio_accesso'][$key] != null && $valido['usuario_accesso'][$key] != null && $valido['password_accesso'][$key] != null){
            $acceso = new Acceso;
            $acceso->dominio = $valor;
            $acceso->usuario = $valido['usuario_accesso'][$key];
            $acceso->password = $valido['password_accesso'][$key];
            $acceso->proyecto_id = $proyecto->id;
            $acceso->save();
            }
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente, Proyecto $proyecto)
    {
        //dd($proyecto);
        $proyecto->delete();

        return redirect()->route('proyectos.index', compact('cliente'));
    }
}
