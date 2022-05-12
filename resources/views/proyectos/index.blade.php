<x-app-layout>
    <!--Menu superior-->
    <x-slot name="header">
        <div class="flex justify-between ">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              <a class="text-red-500 uppercase underline" href="{{route('clientes.show', $cliente)}}"> {{$cliente->nombre}} {{$cliente->apellidos}}</a>
            </h2>

            <div class="flex justify-end "> 
                <div class="block  mx-2">
                    <a href="{{ route('contratos.index', $cliente) }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Contratos</a>
                </div>
    
                <div class="block  mx-2">
                    <a href="{{ route('facturas.index',$cliente) }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Facturas</a>
                </div>
            </div>
        </div>
        </x-slot>
        <!---Fin menu superior-->
        <div class="pl-8 ml-8 mt-4 flex justify-start">
            <x-boton2 tipo="link" class="bg-green-600 hover:bg-green-700 flex justify-around w-44 h-10" direccion="{{ route('proyectos.create',$cliente) }}">
                <x-slot name="boton">
                    Añadir Proyecto
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg>
                </x-slot>
            </x-boton2>
        </div>
    
    <div class="pt-4 pb-12 ">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="mx-auto pb-10 sm:px-6 lg:px-8 ">
                <div class="flex flex-col-8 ">
                    <div class="my-2 mx-auto">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 w-full">
                                    <h3 class="text-center font-bold uppercase w-full py-5 bg-gray-300">Proyectos</h3>
                                    <thead>
                                    <tr>
                                        <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            ID
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Concepto
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Referencia
                                        </th>
                                        @role($rolConPoderes)
                                        <th scope="col" width="200" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Opciones
                                        </th>
                                        @endrole
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($proyectos as $proyecto)
                                        <tr class="hover:bg-green-200 cursor-pointer" onclick="detalles('{{ route('proyectos.show', ['cliente' => $cliente->id, 'proyecto' => $proyecto->id]) }}', event)">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                {{$proyecto->id}}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                {{($proyecto->concepto)}}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                @if ($proyecto->referencia==0)
                                                Sin contrato
                                                    @else{{$proyecto->referencia}}
                                                @endif
                                            </td>

                                            @role($rolConPoderes)
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex items-start">
                                                <x-boton2 tipo="link" class="bg-yellow-400 hover:bg-yellow-600 mr-4 w-16" direccion="{{ route('proyectos.edit', ['cliente' => $cliente, 'proyecto' => $proyecto]) }}">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                                    </x-slot>
                                                </x-boton2>

                                                <form id="{{ $proyecto->id }}" class="proyecto inline-block" action="{{ route('proyectos.destroy', ['cliente' => $cliente, 'proyecto' => $proyecto]) }}" method="POST" onclick="deleteConfirm('{{ $proyecto->id }}', event)">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                    <x-boton2 tipo="input" nombre="Borrar" class="bg-red-600 hover:bg-red-700 w-16">
                                                        <x-slot name="boton">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                        </x-slot>
                                                    </x-boton2>
                                                </form>
                                            </td>
                                            @endrole
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
</x-app-layout>

