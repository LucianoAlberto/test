<x-app-layout>
    <!--Menu superior-->
    <x-slot name="header">
        <div class="flex justify-between ">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a class="text-red-500 uppercase underline" href="{{ route('clientes.show', $cliente) }}">
                    {{ $cliente->nombre }} {{ $cliente->apellidos }}</a>
            </h2>

            <div class="flex justify-end ">
                <div class="block  mx-2">
                    <a href="{{ route('contratos.index', $cliente) }}"
                        class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Contratos</a>
                </div>

                <div class="block  mx-2">
                    <a href="{{ route('facturas.index', $cliente) }}"
                        class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Facturas</a>
                </div>

                <div class="block  mx-2">
                    <a href="{{ route('proyectos.index', $cliente) }}"
                        class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Proyectos</a>
                </div>

                <div class="block  mx-2">
                    <a href="{{ route('pagos.index', $cliente) }}"
                        class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Pagos</a>
                </div>
            </div>
        </div>
    </x-slot>
    <!---Fin menu superior-->

    <div>
        <div class="w-2/6 mx-auto py-10 sm:px-6 lg:px-8">

            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <div class="flex items-center relative">
                                    <h3 class="text-center font-bold uppercase w-full py-4 bg-gray-300">Detalles factura
                                    </h3>
                                    @role($rolConPoderes)
                                    <x-boton2 tipo="link"
                                        class="bg-yellow-400 hover:bg-yellow-600 w-14 h-14 flex items-center absolute top-0 right-0"
                                        direccion="{{ route('facturas.edit', ['cliente' => $cliente->id, 'factura' => $factura->id]) }}">
                                        <x-slot name="boton" class="w-full">
                                            <svg class="p-2.5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-edit">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                </path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                </path>
                                            </svg>
                                        </x-slot>
                                    </x-boton2>
                                    @endrole
                                </div>
                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $factura->id }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Fecha cargo
                                    </th>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $factura->fecha_cargo }}
                                    </td>
                                </tr>

                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Archivo
                                    </th>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        <div class="flex">
                                            <x-boton2 tipo="linkConAsset"
                                                class="bg-blue-500 hover:bg-blue-700 mr-4 w-16"
                                                direccion="{{ $factura->factura }}">
                                                <x-slot name="boton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-eye">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </x-slot>
                                            </x-boton2>

                                            <x-boton2 tipo="descargaConAsset"
                                                class="bg-green-500 hover:bg-green-700 mr-4 w-16"
                                                direccion="{{ $factura->factura }}">
                                                <x-slot name="boton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-download">
                                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                        <polyline points="7 10 12 15 17 10"></polyline>
                                                        <line x1="12" y1="15" x2="12" y2="3"></line>
                                                    </svg>
                                                </x-slot>
                                            </x-boton2>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Referencia del contrato
                                    </th>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $factura->referencia_contrato }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
