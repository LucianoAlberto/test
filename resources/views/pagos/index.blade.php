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

                <div class="block  mx-2">
                    <a href="{{route('proyectos.index',$cliente)}}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Proyectos</a>
                </div>
            </div>
        </div>

        </x-slot>
        <!---Fin menu superior-->

    {{-- Formulario para crear un nuevo pago --}}
    <div class="w-full max-w-xs  m-auto mt-5" id='nuevo_pago' hidden>
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('pagos.store', $cliente->id) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha">
                    Fecha Pago *
                </label>
                <input
                    class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="fecha" type="date" name="fecha" required>
                @error('fecha')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="abonado">
                    Importe Abonado
                </label>
                <input
                    class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="abonado" type="text" name="abonado" required pattern="^\d+(\.\d{2})?$">
                @error('abonado')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="pendiente">
                    Importe Pendiente *
                </label>
                <input
                    class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="pendiente" type="text" name="pendiente" required pattern="^\d+(\.\d{2})?$">
                @error('pendiente')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="referencia">
                    Referencia Contrato *
                </label>
                <select
                    class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="referencia" name="referencia" required>
                    <option value="">Seleciona una referencia</option>
                    <option value="0">Sin Contrato</option>
                    @foreach ($cliente->contratos as $contrato)
                        <option value={{ $contrato->referencia }}>{{ $contrato->referencia }}</option>
                    @endforeach

                </select>
                @error('referencia')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <div class="flex items-center justify-center">
                <button
                    class="bg-gray-800 hover:bg-gray-700 hover:scale-125 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Guardar
                </button>
            </div>
        </form>
    </div>

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
                                        <div >
                                            <label class=" justify-center font-bold uppercase w-full py-5 bg-gray-300 flex items-center ">
                                                Pagos
                                                <x-boton2 tipo="div"
                                                    class="ml-2 bg-green-800 hover:bg-green-700 w-10 h-10 fill-none "
                                                    onclick="anadirPago()">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg>
                                                    </x-slot>
                                                </x-boton2>
                                            </label>
                                        </div><hr><hr>
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
                                            @foreach ($cliente->pagos as $pago)
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
                                                        @if ($pago->contrato_id == 0)
                                                            ---
                                                        @else
                                                        <a
                                                        href="{{ route('contratos.show',['cliente' => $cliente, 'contrato' => $pago->contrato]) }}">{{ $pago->contrato->referencia }}</a>

                                                        @endif
                                                    </td>
                                                    @role($rolConPoderes)
                                                    <td class="px-6 py-6 whitespace-nowrap text-sm font-medium flex justify-center justify-center">
                                                        <x-boton2 tipo="link"
                                                            class="bg-yellow-400 hover:bg-yellow-600 mr-4 w-14 h-14 flex items-center"
                                                            direccion="{{ route('pagos.edit', ['pago' => $pago, 'cliente' => $cliente]) }}">
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
