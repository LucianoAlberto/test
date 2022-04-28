<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Facturas del cliente : <a class="text-red-500 uppercase underline" href="{{route('clientes.show',$cliente)}}"> {{$cliente->nombre}} {{$cliente->apellidos}}
            </a>
        </h2>
        <x-boton2 tipo="div" nombre="Añadir" class="bg-green-600 hover:bg-green-700 w-44 mr-6 justify-between" onclick="anadirFactura(event)">
            <x-slot name="boton">
                <span>Añadir factura</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg>
            </x-slot>
        </x-boton2>
    </x-slot>

       {{--Formulario para un nueva factura--}}
    <div class="w-full max-w-xs  m-auto mt-5"  id='nueva_factura' hidden >
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('facturas.store', $cliente->id ) }}"  method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_cliente" value="{{ $cliente->id }}">

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_cargo">
                Fecha Cargo
                </label>
                <input class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="fecha_cargo" type="date" name="fecha_cargo" required>
                @error('fecha')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="factura">
              Seleciona Fichero
            </label>
            <input class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="factura" type="file" name="factura" required >
            @error('factura')
            <p class="text-sm text-red-600">{{ $message }}</p>
       @enderror
          </div>

          <div class="mb-3">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="referencia_contrato">
             Referencia Contrato
            </label>
            <select class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="referencia" name="referencia_contrato" required>
                <option value="">Seleciona una referencia</option>
                <option value="0">Sin Contrato</option>
            @foreach ($cliente->contratos as $contrato )
                 <option value={{$contrato->referencia}}>{{$contrato->referencia}}</option>
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
     {{--Mostramos las facturas existentes--}}
    <div class="pt-4 pb-4 flex mx-auto ">
        <div class="mx-auto sm:px-6 lg:px-8">
                <div id="contenedor">
                    <div class="mx-auto pb-10 sm:px-6 lg:px-8 ">
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200 w-full ">
                                            <thead>
                                            <tr >
                                                <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    ID
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Fecha Cargo
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Referencia contrato
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Archivo
                                                </th>
                                                <th scope="col" width="200" class="px-6 py-3 bg-gray-50">
                                                    Opciones
                                                </th>

                                            </tr>
                                            </thead>

                                            <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($cliente->facturas as $factura)
                                                <tr class="hover:bg-green-200" onclick="detalles('{{ route('facturas.show', ['cliente' => $cliente->id, 'factura' => $factura->id]) }}', event)">
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                        {{$factura->id }}
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                        {{ $factura->fecha_cargo }}
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                        {{ $factura->referencia_contrato }}
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                        <x-boton2 tipo="linkConAsset" class="bg-blue-500 hover:bg-blue-700 mr-4 w-16 h-12" direccion="{{$contrato->archivo}}">
                                                            <x-slot name="boton">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                            </x-slot>
                                                        </x-boton2>
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex items-start">
                                                        <x-boton2 tipo="link" class="bg-yellow-400 hover:bg-yellow-600 mr-4 w-16" direccion="{{ route('facturas.edit', ['cliente' => $cliente->id, 'factura' => $factura->id]) }}">
                                                            <x-slot name="boton">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                                            </x-slot>
                                                        </x-boton2>

                                                        <form id="{{ $cliente->id }}" class="factura inline-block" action="{{ route('facturas.destroy', ['cliente' => $cliente->id, 'factura' => $factura->id]) }}" method="POST" onclick="deleteConfirm('{{ $cliente->id }}', event)">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                            <x-boton2 tipo="input" nombre="Borrar" class="bg-red-600 hover:bg-red-700 w-16">
                                                                <x-slot name="boton">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                </x-slot>
                                                            </x-boton2>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                        {{-- {{ $clientes->links()}} --}}
                                    </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

        </div>
    </div>
</x-app-layout>

