<x-app-layout>

    <div class="pl-8 ml-8 mt-4 flex justify-between">
        <x-boton2 tipo="link" class="bg-green-600 hover:bg-green-700 flex justify-around w-52 items-center" direccion="{{ route('empleados.create') }}">
            <x-slot name="boton">
                Añadir empleado
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
            </x-slot>
        </x-boton2>

        <form method="POST" action="{{ route('empleados.index') }}" enctype="multipart/form-data" class="flex pr-16 mt-4 items-center" id="filtroForm">
            @csrf

            <div class="ml-3">
                <select name="ambito" class="form-input rounded-md shadow-sm mt-1 block"  onChange="mandarFormAmbito()">
                    <option value="">--Selecciona ámbito--</option>
                    <option value="sin">Sin ámbito</option>
                    @foreach ($ambitos as $ambito)
                        <option value="{{ $ambito->id }}" name='ambito[{{$ambito->id}}]'>
                                {{$ambito->nombre}}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Empleados
        </h2>
    </x-slot>

    <div class="pt-4 pb-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div>
                <div class="mx-auto pb-10 sm:px-6 lg:px-8">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200 w-full">
                                        <thead>
                                        <tr>
                                            <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                ID
                                            </th>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Nombre
                                            </th>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                DNI
                                            </th>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Número SS
                                            </th>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Ámbitos
                                            </th>
                                            @role($rolConPoderes)
                                            <th scope="col" width="200" class="px-6 py-3 bg-gray-50">
                                                Opciones
                                            </th>
                                            @endrole
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($empleados as $empleado)
                                            <tr class="hover:bg-green-200" onclick="detalles('{{ route('empleados.show', $empleado->id) }}', event)">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                    {{ $empleado->id }}
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                    {{ $empleado->nombre }} {{ $empleado->apellidos }}
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                    {{ $empleado->dni }}
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                    {{ $empleado->numero_ss }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                    @foreach ($empleado->ambitos as $ambito)
                                                        {{ $ambito->nombre }}
                                                    @endforeach
                                                </td>
                                                @role($rolConPoderes)
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex items-start">
                                                    <x-boton2 tipo="link" class="bg-yellow-400 hover:bg-yellow-600 mr-4 w-16" direccion="{{ route('empleados.edit', $empleado->id) }}">
                                                        <x-slot name="boton">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                                        </x-slot>
                                                    </x-boton2>

                                                    <form id="{{ $empleado->id }}" class="empleado inline-block" action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" onclick="deleteConfirm('{{ $empleado->id }}', event)">
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
                                    {{ $empleados->links() }}
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
