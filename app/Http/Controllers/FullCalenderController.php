<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Event;
use Illuminate\Http\Request;

class FullCalenderController extends Controller
{

    public function index(Request $request)
    {
        //dd($request->start);
        $citado = auth()->user()->id;

        if($request->ajax())
    	{
    		// $data = Event::where('user_id', auth()->user()->id)
            //             ->whereDate('comienzo', '>=', $request->start)
            //            ->whereDate('final',   '<=', $request->end)
            //            ->get(['id', 'nombre', 'descripcion', 'comienzo', 'final']);
            $data = Event::where('user_id', auth()->user()->id)->get(['id', 'nombre', 'descripcion', 'comienzo', 'final']);
            return response()->json($data);
    	}

    	return view('eventos.index');
    }

    public function indexAndres(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Event::where()
                        ->whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
    	}
    	return view('full-calender');
    }

    public function action(Request $request)
    {
        $id = ($request->user()->id);
    	if($request->ajax())
    	{
    		if($request->type == 'add')
    		{

    			$event = Event::create([
    				'nombre' => $request->nombre,
                    'descripcion' => $request->descripcion,
    				'comienzo' => $request->comienzo,
    				'final' => $request->final,
                    'user_id' => $id,
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'update')
    		{
                //dd($request->id);
    			$event = Event::find($request->id)->update([
    				'nombre' => $request->nombre,
                    'descripcion' => $request->descripcion,
    				'comienzo' => $request->comienzo,
                    'final' => $request->final,
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'delete')
    		{
    			$event = Event::find($request->id)->delete();

    			return response()->json($event);
    		}
    	}
    }
}
?>
