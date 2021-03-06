<x-app-layout>
    <div class="flex justify-between">
        <div class="pl-8 ml-8 mt-4 flex justify-start">
            <x-boton2 tipo="link" class="bg-green-600 hover:bg-green-700 flex justify-around w-44 h-10"
                direccion="{{ route('clientes.create') }}">
                <x-slot name="boton">
                    Añadir cliente
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-user-plus">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="8.5" cy="7" r="4"></circle>
                        <line x1="20" y1="8" x2="20" y2="14"></line>
                        <line x1="23" y1="11" x2="17" y2="11"></line>
                    </svg>
                </x-slot>
            </x-boton2>
        </div>

        <form method="POST" action="{{ route('clientes.index') }}" class="flex pr-16 mt-4 items-center">

            @csrf
            <div class="ml-3">
                <select name="criterio" class="form-input rounded-md shadow-sm mt-1 block">
                    <option value="">-- Selecciona criterio --</option>
                    @foreach ($criterios as $criterio)
                        @switch($criterio)
                            @case('nombre')
                                <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                    Nombre
                                </option>
                            @break

                            @case('apellidos')
                                <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                    Apellidos
                                </option>
                                @break

                                @case('dni')
                                <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                    DNI
                                </option>
                                @break

                                @case('anho_contable')
                                <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                    Año contable
                                </option>
                                @break

                                @case('direccion_fiscal')
                                <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                    Dirección fiscal
                                </option>
                                @break

                                @case('domicilio')
                                <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                    Domicilio
                                </option>
                                @break

                                @case('nombre_comercial')
                                <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                    Nombre comercial
                                </option>
                                @break

                                @case('nombre_sociedad')
                                <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                    Nombre sociedad
                                </option>
                                @break

                                @case('cif')
                                <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                    CIF
                                </option>
                                @break

                                @case('cuenta_bancaria')
                                <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                    Cuenta bancaria
                                </option>
                                @break

                                @case('n_tarjeta')
                                <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                    Número de tarjeta
                                </option>
                                @break

                                @case('email')
                                <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                    E-mail
                                </option>
                                @break

                                @case('telefono')
                                <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                    Teléfono
                                </option>
                                @break

                                @case('created_at')
                                <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                    Fecha de creación
                                </option>
                                @break
                            @endswitch
                    @endforeach
                    <option value="referencia_contrato">Referencia contrato</option>
                </select>
            </div>

            <div class="w-2/5 ml-2 mr-2">
                <input placeholder="Búsqueda" type="text" name="busqueda"
                    class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('busqueda', '') }}" />
                @error('busqueda')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <x-boton2 tipo="input" class="flex items-center justify-center bg-red-600 hover:bg-red-700">
                <x-slot name="boton">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-search  w-11 h-11 p-2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </x-slot>
            </x-boton2>
        </form>


        <form method="POST" action="{{ route('clientes.index') }}" class="flex pr-16 mt-4 items-center"
            id="filtroForm">
            @csrf
            <div class="ml-3">
                <select name="ambito" class="form-input rounded-md shadow-sm mt-1 block" onChange="mandarFormAmbito()">
                    <option value="">-- Selecciona ámbito --</option>
                    <option value="sin">Sin ámbito</option>
                    @foreach ($ambitos as $ambito)
                        <option value="{{ $ambito->id }}" name='ambito[{{ $ambito->id }}]'>
                            {{ $ambito->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>

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
                                                <th scope="col" width="50"
                                                    class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    ID
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Nombre
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Nombre comercial
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Nombre sociedad
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Email
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Teléfono
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Ámbitos
                                                </th>
                                                @role($rolConPoderes)
                                                    <th scope="col" width="200"
                                                        class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Opciones
                                                    </th>
                                                @endrole
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($clientes as $cliente)
                                                <tr class="hover:bg-green-200 hover:cursor-pointer"
                                                    onclick="detalles('{{ route('clientes.show', $cliente->id) }}', event)">
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                        {{ $cliente->id }}
                                                    </td>

                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                        {{ $cliente->nombre }} {{ $cliente->apellidos }}
                                                    </td>

                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                        {{ $cliente->nombre_comercial }}
                                                    </td>

                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                        {{ $cliente->nombre_sociedad }}
                                                    </td>

                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                        {{ $cliente->email }}
                                                    </td>

                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                        {{ $cliente->telefono }}
                                                    </td>

                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                        @foreach ($cliente->ambitos as $ambito)
                                                            {{ $ambito->nombre }}
                                                        @endforeach
                                                    </td>
                                                    @role($rolConPoderes)
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex items-start">
                                                            <x-boton2 tipo="link"
                                                                class="bg-yellow-400 hover:bg-yellow-600 mr-4 w-14 h-14 flex items-center"
                                                                direccion="{{ route('clientes.edit', $cliente) }}">
                                                                <x-slot name="boton" class="w-full">
                                                                    <svg class="p-2.5"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-edit">
                                                                        <path
                                                                            d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                        </path>
                                                                        <path
                                                                            d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                        </path>
                                                                    </svg>
                                                                </x-slot>
                                                            </x-boton2>


                                                            <form id="{{ $cliente->id }}" class="cliente inline-block"
                                                                action="{{ route('clientes.destroy', $cliente->id) }}"
                                                                method="POST"
                                                                onclick="deleteConfirm('{{ $cliente->id }}', event)">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token"
                                                                    value="{{ csrf_token() }}">

                                                                    <x-boton2 tipo="input" nombre="Borrar" class="bg-red-600 hover:bg-red-700 w-14">
                                                                        <x-slot name="boton" class="w-full">
                                                                            <svg class="p-2.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                            </svg>
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

                                {{ $clientes->links() }}

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
                title: 'Cliente creado con exito',
                showConfirmButton: false,
                timer: 1500
            })
        </script>

    @elseif (session('eliminado') == 'si')
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Cliente Eliminado',
                showConfirmButton: false,
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
