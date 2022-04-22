<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Dominio;
use App\Models\Proyecto;
use App\Models\BaseDatos;
use Illuminate\Http\Request;
use App\Models\ConceptoFactura;
use App\Models\EmailCorporativo;
use App\Http\Requests\ProyectoRequest;

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

        return view('proyectos.index', ['proyectos' => $proyectos, 'cliente' => $cliente]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cliente $cliente)
    {
        //recuperamos los contratos del cliente
        $contratos=$cliente->contratos;

        //obtenemos todos los conceptos de la BD
       $conceptos=ConceptoFactura::all(['id','nombre']);

        return view('proyectos.create',compact('cliente','conceptos','contratos'));
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
        $conceptos=ConceptoFactura::all(['id','nombre']);
            //dd($cliente->id);
        //recuperamos los contratos del cliente
        $contratos=$cliente->contratos;

        $valido=$request->validated();


        $proyecto = new Proyecto;
        $proyecto->concepto = $valido['concepto'];
        $proyecto->referencia = $valido['referencia'];
        $proyecto->proveedor_dominio_usuario = $valido['provedor_dominio_usuario'];
        $proyecto->proveedor_dominio_contrasenha = $valido['provedor_dominio_password'];
        $proyecto->proveedor_hosting_usuario = $valido['provedor_hosting_usuario'];
        $proyecto->proveedor_hosting_contrasenha = $valido['provedor_hosting_password'];
        $proyecto->cliente_id = $cliente->id;
        $proyecto->save();

        foreach($valido['dominio_nombre'] as $key=>$valor){
            if($valor != null){
                $dominio=new Dominio;
                $dominio->nombre=$valor;
                $dominio->usuario=$valido['dominio_usuario'][$key];
                $dominio->password=$valido['dominio_password'][$key];
                $dominio->proyecto_id=$proyecto->id;
                $dominio->save();
            }
        }


        foreach($valido['bd_nombre'] as $key=>$valor){
            $bd=new BaseDatos;
            $bd->nombre=$valor;
            $bd->host=$valido['host'][$key];
            $bd->password=$valido['bd_password'][$key];
            $bd->proyecto_id=$proyecto->id;
            $bd->save();
        }

        foreach($valido['email'] as $key=>$valor){
            $email=new EmailCorporativo;
            $email->email=$valor;
            $email->password=$valido['password'][$key];
            $email->ruta_accesso=$valido['ruta_accesso'][$key];
            $email->proyecto_id=$proyecto->id;
            $email->save();
        }

        foreach($valido['dominio_accesso'] as $key=>$valor){
            $accesso=new Accesso;
            $accesso->dominio=$valor;
            $accesso->usuario=$valido['usuario_accesso'][$key];
            $accesso->password=$valido['password_accesso'][$key];
            $accesso->proyecto_id=$proyecto->id;
            $accesso->save();
        }

        return view('clientes.crear_proyecto',compact('cliente','conceptos','contratos'));
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente, Proyecto $proyecto)
    {
        return view('proyectos.show', ['cliente' => $cliente, 'proyecto' => $proyecto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {
        //
    }
}
