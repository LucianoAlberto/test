<x-app-layout>
    <div class="flex justify-center">
    <form method="POST" action="{{ route('proyectosTotal.index') }}" class="flex pr-16 mt-4 items-center pl-3.25">
        @csrf
        <div class="ml-3">
            <select name="criterio" class="form-input rounded-md shadow-sm mt-1 block">
                <option value="">-- Selecciona criterio --</option>
                @foreach ($criterios as $criterio)
                    @switch($criterio)
                        @case('cliente_id')
                            <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                ID del cliente
                            </option>
                        @break

                        @case('concepto_facturas_id')
                            <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                Concepto
                            </option>
                            @break

                            @case('referencia')
                            <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                Referencia
                            </option>
                            @break

                            @case('proveedor_dominio_usuario')
                            <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                Usuario del proveedor de dominio
                            </option>
                            @break

                            @case('proveedor_dominio_contrasenha')
                            <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                Contraseña del proveedor de dominio
                            </option>
                            @break

                            @case('proveedor_hosting_usuario')
                            <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                Usuario del proveedor de hosting
                            </option>
                            @break

                            @case('proveedor_hosting_contrasenha')
                            <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                Contraseña del proveedor de hosting
                            </option>
                            @break

                            @case('otros_datos')
                            <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                Otros datos
                            </option>
                            @break

                            @case('created_at')
                            <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                Fecha de creación
                            </option>
                            @break

                            @case('updated_at')
                            <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                Fecha de actualización
                            </option>
                            @break
                        @endswitch
                @endforeach
            </select>
        </div>

        <div class="w-4/6 ml-2 mr-2">
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
</div>
    <!---Fin menu superior-->
    <div class="pt-4 pb-12 ">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="mx-auto pb-10 sm:px-6 lg:px-8 ">
                <div class="flex flex-col-8 ">
                    <div class="my-2 mx-auto">
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
                                                Concepto
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Referencia
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
                                        @foreach ($proyectos as $proyecto)
                                            <tr class="hover:bg-green-200 cursor-pointer"
                                                onclick="detalles('{{ route('proyectos.show', ['cliente' => $proyecto->cliente->id, 'proyecto' => $proyecto->id]) }}', event)">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                    {{ $proyecto->id }}
                                                </td>

                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                    {{ $proyecto->concepto }}
                                                </td>

                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                    @if ($proyecto->referencia == 0)
                                                        Sin contrato
                                                        @else{{ $proyecto->referencia }}
                                                    @endif
                                                </td>

                                                @role($rolConPoderes)
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium flex justify-center">
                                                        <x-boton2 tipo="link"
                                                            class="bg-yellow-400 hover:bg-yellow-600 mr-4 w-14 h-14 flex items-center"
                                                            direccion="{{ route('proyectos.edit', ['cliente' => $proyecto->cliente, 'proyecto' => $proyecto]) }}">
                                                            <x-slot name="boton" class="w-full">
                                                                <svg class="p-2.5"
                                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                    fill="none" stroke="currentColor" stroke-width="2"
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
                                                    </td>
                                                @endrole
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                            {{ $proyectos->links()}}
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    {{-- aviso usando la variable de session --}}
    @if (session('creado') == 'si')
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Proyecto creado con exito',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @elseif (session('eliminado') == 'si')
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Proyecto Eliminado',
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
    @elseif (session('conceptoCreado') == 'si')
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Nuevo concepto creado',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @elseif (session('conceptoEliminado') == 'si')
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Concepto eliminado',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    {{-- fin avisos sessiones --}}

    </div>
</x-app-layout>
