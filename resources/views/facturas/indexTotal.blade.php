<x-app-layout>
    <form method="POST" action="{{ route('facturasTotal.index') }}" class="flex pr-16 mt-4 items-center pl-37.33">
        @csrf
            <select name="criterio" class="form-input rounded-md shadow-sm mt-1 block">
                <option value="">-- Selecciona criterio --</option>
                @foreach ($criterios as $criterio)
                    @switch($criterio)
                        @case('cliente_id')
                            <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                ID del cliente
                            </option>
                        @break

                        @case('fecha_cargo')
                            <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                Fecha de cargo
                            </option>
                            @break

                            @case('referencia_contrato')
                            <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                Referencia del contrato
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

        <div class="w-1/6 ml-2 mr-2">
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
    {{-- Mostramos las facturas existentes --}}
    <div class="pt-4 pb-4 flex mx-auto ">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div id="contenedor">
                <div class="mx-auto pb-10 sm:px-6 lg:px-8 ">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200 w-full ">

                                        <div >
                                            <label class=" justify-center font-bold uppercase w-full py-5 bg-gray-300 flex items-center ">
                                                Facturas
                                                <x-boton2 tipo="div"
                                                    class="ml-2 bg-green-800 hover:bg-green-700 w-10 h-10 fill-none ">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg>
                                                    </x-slot>
                                                </x-boton2>
                                            </label>
                                        </div><hr><hr>

                                        <thead>
                                            <tr>
                                                <th scope="col" width="50"
                                                    class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    ID
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Fecha Cargo
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Referencia contrato
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Archivo
                                                </th>
                                                @role($rolConPoderes)
                                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Opciones
                                                    </th>
                                                @endrole
                                            </tr>
                                        </thead>

                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($facturas as $factura)
                                                <tr class="hover:bg-green-200 cursor-pointer"
                                                    onclick="detalles('{{ route('facturas.show', ['cliente' => $factura->cliente, 'factura' => $factura]) }}', event)">
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                        {{ $factura->id }}
                                                    </td>

                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                        {{ $factura->fecha_cargo }}
                                                    </td>

                                                    @if ($factura->referencia_contrato == 0)
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center decoration-1 text-blue-800 hover:text-red-800 hover:text-2xl">
                                                        ---
                                                    </td>
                                                    @else
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center underline decoration-1 text-blue-800 hover:text-red-800 hover:text-2xl">
                                                            <a href="{{ route('contratos.show', ['cliente' => $factura->cliente, 'contrato' => $factura->contratos()->where('referencia', $factura->referencia_contrato)->first()]) }}">{{ $factura->referencia_contrato  }}</a>
                                                        </td>
                                                    @endif

                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                        <x-boton2 tipo="linkConAsset"
                                                            class="bg-blue-500 hover:bg-blue-700 w-14 h-14"
                                                            direccion="{{ $factura->factura }}">
                                                            <x-slot name="boton">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                                    height="32" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-eye">
                                                                    <path
                                                                        d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                    </path>
                                                                    <circle cx="12" cy="12" r="3"></circle>
                                                                </svg>
                                                            </x-slot>
                                                        </x-boton2>
                                                    </td>
                                                    @role($rolConPoderes)
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium flex justify-center">

                                                            <x-boton2 tipo="link"
                                                                class="bg-yellow-400 hover:bg-yellow-600 mr-4 w-14 h-14 flex items-center"
                                                                direccion="{{ route('facturas.edit', ['cliente' => $factura->cliente, 'factura' => $factura]) }}">
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
                                                        </td>
                                                    @endrole
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                {{ $facturas->links()}}
                            </div>

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
                title: 'Factura creada con exito',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @elseif (session('eliminado') == 'si')
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Factura Eliminada',
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
