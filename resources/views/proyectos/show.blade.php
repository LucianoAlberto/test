<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            CLIENTE: <a class="text-red-500 uppercase underline"
                href="{{ route('clientes.show', $proyecto->cliente) }}"> {{ $proyecto->cliente->nombre }}
                {{ $proyecto->cliente->apellidos }}
            </a>
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">

            <div class="flex justify-start">

                <div class="block mb-8 mx-3">
                    <a href="{{ route('clientes.index') }}"
                        class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Vovler a la
                        lista</a>
                </div>

                <div class="block mb-8 mx-3">
                    <a href="{{ route('clientes.contratos', $proyecto->cliente) }}"
                        class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Contratos</a>
                </div>

                <div class="block mb-8 mx-3">
                    <a href="{{ route('clientes.facturas', $proyecto->cliente) }}"
                        class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Facturas</a>
                </div>

                <div class="block mb-8 mx-3">
                    <a href="{{ route('clientes.proyectos', $proyecto->cliente) }}"
                        class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Proyectos</a>
                </div>
            </div>


            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <div>
                                <h2 class="text-red-500 font-bold text-center text-2xl">PROYECTO</h2>
                            </div>
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID PROYECTO
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $proyecto->id }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        CONCEPTO
                                    </th>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $proyecto->concepto }}
                                    </td>

                                </tr>

                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        REFERENCIA CONTRATO
                                    </th>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $proyecto->referencia }}
                                    </td>

                                </tr>
                                {{-- Provedor Dominio --}}
                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        PROVEDOR DOMINIO
                                    </th>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200  ">
                                        <div class="flex justify-between ">
                                            <div class=" w-1/2">Usuario: @if ($proyecto->provedor_dominio_usuario != null)
                                                    {{ $proyecto->provedor_dominio_usuario }}
                                                @else
                                                    ---
                                                @endif
                                            </div>
                                            <div class=" w-1/2"> Password: @if ($proyecto->provedor_dominio_password != null)
                                                    {{ $proyecto->provedor_dominio_password }}
                                                @else
                                                    ---
                                                @endif
                                            </div>
                                        </div>
                                    </td>

                                </tr>

                                {{-- Provedor Hosting --}}
                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        PROVEDOR HOSTING
                                    </th>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200  ">
                                        <div class="flex justify-between ">
                                            <div class=" w-1/2">Usuario: @if ($proyecto->provedor_hosting_usuario != null)
                                                    {{ $proyecto->provedor_hosting_usuario }}
                                                @else
                                                    ---
                                                @endif
                                            </div>
                                            <div class=" w-1/2"> Password: @if ($proyecto->provedor_hosting_password != null)
                                                    {{ $proyecto->provedor_hosting_password }}
                                                @else
                                                    ---
                                                @endif
                                            </div>
                                        </div>
                                    </td>

                                </tr>

                                {{-- recuperamos los Emails --}}
                              <tr class="border-b">
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    EMAIL CORPORATIVO
                                </th>

                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200  ">
                                    <div class="flex justify-between  bg-gray-200">
                                        <div class=" w-1/2">EMAIL</div>
                                        <div class=" w-1/2">PASSWORD</div>
                                        <div class=" w-1/2">RUTA ACCESO</div>
                                    </div>

                                    @foreach ($proyecto->emails as $email)
                                        <div class="flex justify-between ">

                                            <div class=" w-1/2">
                                                @if ($email->email != null)
                                                    {{ $email->email }}
                                                @else
                                                    ---
                                                @endif
                                            </div>
                                            <div class=" w-1/2">
                                                @if ($email->password != null)
                                                    {{ $email->password }}
                                                @else
                                                    ---
                                                @endif
                                            </div>
                                            <div class=" w-1/2">
                                                @if ($email->ruta_accesso != null)
                                                    {{ $email->ruta_accesso }}
                                                @else
                                                    ---
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </td>
                            </tr>


                            {{--recupramos los dominios--}}
                              <tr class="border-b">
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    DOMINIOS
                                </th>

                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200  ">
                                    <div class="flex justify-between  bg-gray-200">
                                        <div class=" w-1/2">NOMBRE DOMINIO</div>
                                        <div class=" w-1/2">USUARIO</div>
                                        <div class=" w-1/2">PASSWORD</div>
                                    </div>

                                    @foreach ($proyecto->dominios as $dominio)
                                        <div class="flex justify-between ">

                                            <div class=" w-1/2">
                                                @if ($dominio->nombre != null)
                                                    {{ $dominio->nombre }}
                                                @else
                                                    ---
                                                @endif
                                            </div>
                                            <div class=" w-1/2">
                                                @if ($dominio->usuario != null)
                                                    {{ $dominio->usuario }}
                                                @else
                                                    ---
                                                @endif
                                            </div>
                                            <div class=" w-1/2">
                                                @if ($dominio->password != null)
                                                    {{ $dominio->password }}
                                                @else
                                                    ---
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </td>
                            </tr>


                                {{-- recuperamos las Base de Datos --}}
                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        BASE DE DATOS
                                    </th>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200  ">
                                        <div class="flex justify-between  bg-gray-200">
                                            <div class=" w-1/2">NOMBRE</div>
                                            <div class=" w-1/2">HOST</div>
                                            <div class=" w-1/2">PASSWORD</div>
                                        </div>

                                        @foreach ($proyecto->baseDatos as $bd)
                                            <div class="flex justify-between ">

                                                <div class=" w-1/2">
                                                    @if ($bd->nombre != null)
                                                        {{ $bd->nombre }}
                                                    @else
                                                        ---
                                                    @endif
                                                </div>
                                                <div class=" w-1/2">
                                                    @if ($bd->host != null)
                                                        {{ $bd->host }}
                                                    @else
                                                        ---
                                                    @endif
                                                </div>
                                                <div class=" w-1/2">
                                                    @if ($bd->password != null)
                                                        {{ $bd->password }}
                                                    @else
                                                        ---
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </td>
                                </tr>

                                 {{-- recuperamos los accessos --}}
                                 <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ACCESOS
                                    </th>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200  ">
                                        <div class="flex justify-between  bg-gray-200">
                                            <div class=" w-1/2">DOMINIO</div>
                                            <div class=" w-1/2">USUARIO</div>
                                            <div class=" w-1/2">PASSWORD</div>
                                        </div>

                                        @foreach ($proyecto->accessos as $acceso)
                                            <div class="flex justify-between ">

                                                <div class=" w-1/2">
                                                    @if ($acceso->dominio != null)
                                                        {{$acceso->dominio }}
                                                    @else
                                                        ---
                                                    @endif
                                                </div>
                                                <div class=" w-1/2">
                                                    @if ($acceso->usuario != null)
                                                        {{ $acceso->usuario }}
                                                    @else
                                                        ---
                                                    @endif
                                                </div>
                                                <div class=" w-1/2">
                                                    @if ($acceso->password != null)
                                                        {{ $acceso->passwod }}
                                                    @else
                                                        ---
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </td>
                                </tr>





                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        SEPA
                                    </th>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        <div>

                                               <a href="{{ asset("storage/{$proyecto->sepa}") }}" target="_blank" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 border border-green-700 rounded ">Ver</a>

                                                <a href="" download="{{ asset("storage/{$proyecto->sepa}") }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded px-5"> Descargar</a>

                                      </div>

                                    </td>

                                </tr>

                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        HOJA DE PREFERENCIAS
                                    </th>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        <div>

                                            <a href="{{ asset("storage/{$proyecto->hoja_preferencia}") }}" target="_blank" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 border border-green-700 rounded ">Ver</a>

                                             <a href="" download="{{ asset("storage/{$proyecto->hoja_preferencia}") }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded px-5"> Descargar</a>

                                   </div>
                                    </td>

                                </tr>

                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        OTROS DATOS
                                    </th>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $proyecto->otros_datos }}
                                    </td>

                                </tr>

                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        CLIENTE ID
                                    </th>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $proyecto->cliente_id }}
                                    </td>

                                </tr>

                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        FECHA-CREACION
                                    </th>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $proyecto->created_at }}
                                    </td>

                                </tr>
                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ULTIMA ACTUALIZACION
                                    </th>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $proyecto->updated_at }}
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
