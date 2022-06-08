<x-app-layout>
    <form method="POST" action="{{ route('pagosTotal.index') }}" class="flex pr-16 mt-4 items-center pl-34.25">
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

                        @case('abonado')
                            <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                Abonado
                            </option>
                            @break

                            @case('pendiente')
                            <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                Pendiente
                            </option>
                            @break

                            @case('fecha')
                            <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                Fecha
                            </option>
                            @break

                            @case('referencia')
                            <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                Referencia
                            </option>
                            @break

                            @case('contrato_id')
                            <option value="{{ $criterio }}" name='criterio[{{ $criterio }}]'>
                                ID del contrato
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

    {{-- Mostramos los pagos existentes --}}
    <div class="pt-4 pb-4 flex mx-auto ">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div id="contenedor">
                <div class="mx-auto pb-10 sm:px-6 lg:px-8 ">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-500 w-full ">
                                        <thead>
                                            <tr>
                                                <th scope="col" width="50"
                                                    class="px-6 py-3  text-center text-xs font-medium text-black-uppercase font-bold  tracking-wider">
                                                    FECHA
                                                </th>

                                                <th scope="col"
                                                    class="px-6 py-3 font-bold  text-center text-xs font-medium text-black uppercase tracking-wider">
                                                    IMPORTE ABONADO
                                                </th>


                                                <th scope="col"
                                                    class="px-6 py-3 font-bold   text-center text-xs font-medium text-black uppercase tracking-wider ">
                                                    IMPORTE PENDIENTE
                                                </th>

                                                <th scope="col"
                                                    class="px-6 py-3 font-bold  text-center text-xs font-medium text-black uppercase tracking-wider">
                                                    REFERENCIA CONTRATO
                                                </th>
                                                @role($rolConPoderes)
                                                <th scope="col" width="200"
                                                    class=" w-1/4 py-3 font-bold  text-xs font-medium text-black uppercase tracking-wider ">
                                                    Opciones
                                                </th>
                                                @endrole
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($pagos as $pago)
                                                <tr class="hover:bg-green-300">

                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                        {{ $pago->fecha }}
                                                    </td>

                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                        {{ $pago->abonado }}
                                                    </td>

                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center text-red-500">
                                                        {{ $pago->pendiente }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center underline decoration-1 text-blue-800 hover:text-red-800 hover:text-2xl">
                                                        @if ($pago->contrato_id == NULL)
                                                            ---
                                                        @else
                                                        <a
                                                        href="{{ route('contratos.show',['cliente' => $pago->cliente, 'contrato' => $pago->contrato]) }}">{{ $pago->contrato->referencia }}</a>

                                                        @endif
                                                    </td>
                                                    @role($rolConPoderes)
                                                    <td class="px-6 py-6 whitespace-nowrap text-sm font-medium flex justify-center justify-center">
                                                        <x-boton2 tipo="link"
                                                            class="bg-yellow-400 hover:bg-yellow-600 mr-4 w-14 h-14 flex items-center"
                                                            direccion="{{ route('pagos.edit', ['pago' => $pago, 'cliente' => $pago->cliente]) }}">
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
                            </div>
                            {{ $pagos->links()}}
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
                title: 'Pago creado con exito',
                showConfirmButton: false,
                timer: 1500
            })
        </script>

    @elseif (session('eliminado') == 'si')
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Pago Eliminado',
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
    @endif

    {{--fin avisos--}}
    </div>
</x-app-layout>
