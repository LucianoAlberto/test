<x-app-layout>
 <!--Menu superior-->
 <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      <a class="text-red-500 uppercase underline" href="{{route('empleados.show', $empleado)}}"> {{$empleado->nombre}} {{$empleado->apellidos}}</a>
    </h2>

    <div class="flex justify-end ">

        <div class="block  mx-2">
            <a href="{{route('nominas.index', $empleado)}}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Nóminas</a>
        </div>

        <div class="block  mx-2">
            <a href="{{route('asistencias.index', $empleado)}}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Asistencias</a>
        </div>
            
        <div class="block  mx-2">
            <a href="{{route('vacaciones.index', $empleado)}}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Vacaciones</a>
        </div>
    </div>
</x-slot>
<!---Fin menu superior-->

     {{--Mostramos las faltas existentes--}}
    <div class="pt-4 pb-4 flex mx-auto ">
        <div class="mx-auto sm:px-6 lg:px-8">
                <div id="contenedor">
                    <div class="mx-auto pb-10 sm:px-6 lg:px-8 ">
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200 w-full ">
                                            <h3 class="text-center font-bold uppercase w-full py-4 bg-gray-300">
                                                <x-boton2 tipo="link" class="bg-gray-800 hover:bg-gray-700 flex justify-around w-44 h-9" direccion="{{ route('faltas.create', $empleado) }}">
                                                    <x-slot name="boton">
                                                        Añadir falta
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                                    </x-slot>
                                                </x-boton2>    
                                            
                                            </h3>  
                                            <thead>
                                            <tr >
                                                <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    ID
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Fecha de la falta
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Justificación
                                                </th>
                                                @role($rolConPoderes)
                                                <th scope="col" width="200" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Opciones
                                                </th>
                                                @endrole
                                            </tr>
                                            </thead>

                                            <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($empleado->faltas as $falta)
                                                <tr class="hover:bg-green-200 cursor-pointer" onclick="detalles('{{ route('faltas.show', ['empleado' => $empleado, 'falta' => $falta]) }}', event)">
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                        {{ $falta->id }}
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                        {{ $falta->fecha_falta }}
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                        @if($falta->justificacion)
                                                            <svg class="mx-auto text-green-500 font-bold" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                                        @else
                                                            <svg class="mx-auto text-red-500 font-bold" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        @endif

                                                    </td>

                                                    @role($rolConPoderes)
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex items-start">
                                                        <x-boton2 tipo="link" class="bg-yellow-400 hover:bg-yellow-600 mr-4 w-14 h-14" direccion="{{ route('faltas.edit', ['empleado' => $empleado, 'falta' => $falta]) }}">
                                                            <x-slot name="boton">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                                            </x-slot>
                                                        </x-boton2>

                                                        <form id="{{ $falta->id }}" class="falta inline-block" action="{{ route('faltas.destroy', ['empleado' => $empleado, 'falta' => $falta]) }}" method="POST" onclick="deleteConfirm('{{ $falta->id }}', event)">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                            <x-boton2 tipo="input" nombre="Borrar" class="bg-red-600 hover:bg-red-700 w-14 h-14">
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
        {{--avisos mensages --}}
    @if (session('creado') == 'si')
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Falta creada con exito',
            showConfirmButton: false,
            timer: 1500
        })
    </script>

@elseif (session('eliminado') == 'si')store
            timer: 1500
        })
    </script>

@elseif (session('editado') == 'si')
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Datos guardados',
            showConfirmButton: false,
            timer: 1500
        })
    </script>

@elseif (session('ambito_creado') == 'si')
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Nuevo ambito creado',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif

{{--fin avisos--}}
    </div>
</x-app-layout>

