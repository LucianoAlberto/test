<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Cliente;
use App\Models\Contrato;
use Illuminate\Http\Request;
use App\Http\Requests\PagoRequest;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cliente $cliente)
    {
        $rolConPoderes=self::ROLCONPODERES;
        return view ('pagos.index',compact('cliente','rolConPoderes'));
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
    public function store(Request $request, Cliente $cliente)
    {
       $pago= new Pago;
       $pago->cliente_id = $cliente->id;
       $pago->abonado = $request['abonado'];
       $pago->pendiente = $request['pendiente'];
       $pago->fecha = $request['fecha'];

       if($request['referencia'] == 0){
           $pago->contrato_id=null;
       }else{
           //recuperamos el id del contrato
           $contrato=Contrato::where('referencia',$request['referencia'])->select('id')->get();
           $pago->contrato_id=$contrato[0]['id'];
       }
        $pago->save();
        return redirect()->back()->with('creado','si');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit (Cliente $cliente, Pago $pago)
    {
        return view('pagos.edit',compact('pago', 'cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente, Pago $pago)
    {
        $pago_modificado=  new Pago;
        $pago->cliente_id = $cliente->id;
        $pago->abonado = $request['abonado'];
        $pago->pendiente = $request['pendiente'];
        $pago->fecha = $request['fecha'];

        $pago->contrato_id = Contrato::where('referencia',$request['referencia'])->first()->id;
        $pago->save();

        return redirect()->route('pagos.index',$pago->cliente);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente, Pago $pago)
    {
        $pago->delete();

        return redirect()->back()->with('eliminado','si');
    }
}
