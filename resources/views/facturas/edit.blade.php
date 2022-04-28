<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Facturas del cliente : <a class="text-red-500 uppercase underline" href="{{route('clientes.show',$cliente)}}"> {{$cliente->nombre}} {{$cliente->apellidos}}
            </a>
        </h2>
        <button type="button" onclick="anadirFactura()" class="flex justify-center text-white px-4 py-2 rounded-md text-1xl font-medium transition duration-300
        bg-green-700  hover:bg-green-600  id='anadirFactura' ">Añadir Factura</button>
    </x-slot>

       {{--Formulario para un nueva factura--}}
    <div class="w-full max-w-xs  m-auto mt-5"  id='nueva_factura'>
        <form action="{{ route('facturas.update', ['cliente' => $cliente->id, 'factura' => $factura->id]) }}" method="post" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" >
            @csrf
            @method('PUT')
            <input type="hidden" name="id_cliente" value="{{ $cliente->id }}">

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_cargo">
                Fecha Cargo
                </label>
                <input class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="fecha_cargo" type="date" name="fecha_cargo" value="{{ old('fecha_cargo', $factura->fecha_cargo) }}">
                @error('fecha_cargo')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="file">
                Adjunta factura
                </label>
                <span>{{$factura->factura}}</span>
                <div class="flex">
                    <x-boton2 tipo="linkConAsset" class="bg-blue-500 hover:bg-blue-700 mr-4 w-16" direccion="{{$factura->factura}}">
                        <x-slot name="boton">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                        </x-slot>
                    </x-boton2>

                    <x-boton2 tipo="descargaConAsset" class="bg-green-500 hover:bg-green-700 mr-4 w-16" direccion="{{$factura->factura}}">
                        <x-slot name="boton">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                        </x-slot>
                    </x-boton2>
                </div>
                <input class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                id="factura" type="file" name="factura" value="{{ old('factura', '') }}">
                @error('factura')
                <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="referencia_contrato">
                Referencia Contrato
                </label>
                <select class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                id="referencia" name="referencia_contrato">
                    <option value="">Seleciona una referencia</option>
                    <option value="0">Sin Contrato</option>
                @foreach ($cliente->contratos as $contrato_cliente)
                    <option value={{$contrato_cliente->referencia}}
                        {{$contrato_cliente->referencia == $factura->referencia_contrato ? 'selected':''}}>{{$contrato_cliente->referencia}}</option>
                @endforeach
                </select>
                @error('referencia_contrato')
                <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-center">
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Enviar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
