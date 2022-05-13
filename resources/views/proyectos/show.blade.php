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

            <div class="block  mx-2">
                <a href="{{route('pagos.index',$cliente)}}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Pagos</a>
            </div>
        </div>
    </div>
    </x-slot>
    <!---Fin menu superior-->

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <h3 class="text-center font-bold uppercase w-full py-5 bg-gray-300">Detalles Del  Proyecto</h3>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">                        
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

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        @if($proyecto->referencia == 0)
                                            Sin referencia
                                        @else
                                            {{ $proyecto->referencia }}
                                        @endif
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
                                            <div class=" w-1/2">Usuario:

                                                @if ($proyecto->proveedor_dominio_usuario != null)
                                                    {{ $proyecto->proveedor_dominio_usuario }}
                                                @else
                                                    ---
                                                @endif
                                            </div>
                                            <div class=" w-1/2"> Contraseña:
                                                @if ($proyecto->proveedor_dominio_contrasenha != null)
                                                    {{ $proyecto->proveedor_dominio_contrasenha }}
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
                                            <div class=" w-1/2">Usuario:
                                                @if ($proyecto->proveedor_hosting_usuario != null)
                                                    {{ $proyecto->proveedor_hosting_usuario }}
                                                @else
                                                    ---
                                                @endif
                                            </div>
                                            <div class=" w-1/2"> Contraseña:
                                                @if ($proyecto->proveedor_hosting_contrasenha != null)
                                                    {{ $proyecto->proveedor_hosting_contrasenha }}
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
                                        <div class=" w-1/2">CONTRASEÑA</div>
                                        <div class=" w-1/2">RUTA ACCESO</div>
                                    </div>

                                    @if(count($proyecto->emailcorporativos) > 0)
                                        @foreach ($proyecto->emailcorporativos as $email)
                                            <div class="flex justify-between ">

                                                <div class=" w-1/2">
                                                    @if ($email->email != null)
                                                        {{ $email->email }}
                                                    @else
                                                        ---
                                                    @endif
                                                </div>
                                                <div class=" w-1/2">
                                                    @if ($email->contrasenha != null)
                                                        {{ $email->contrasenha }}
                                                    @else
                                                        ---
                                                    @endif
                                                </div>
                                                <div class=" w-1/2">
                                                    @if ($email->ruta_acceso != null)
                                                        {{ $email->ruta_acceso }}
                                                    @else
                                                        ---
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
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
                                        <div class=" w-1/2">CONTRASEÑA</div>
                                    </div>

                                    @if(count($proyecto->dominios) > 0)
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
                                                    @if ($dominio->contrasenha != null)
                                                        {{ $dominio->contrasenha }}
                                                    @else
                                                        ---
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
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
                                            <div class=" w-1/2">CONTRASEÑA</div>
                                        </div>

                                        @if(count($proyecto->basedatoss) > 0)
                                            @foreach ($proyecto->basedatoss as $bd)
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
                                                        @if ($bd->contrasenha != null)
                                                            {{ $bd->contrasenha }}
                                                        @else
                                                            ---
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
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
                                            <div class=" w-1/2">CONTRASEÑA</div>
                                        </div>

                                        @if(count($proyecto->accesos) > 0)
                                            @foreach ($proyecto->accesos as $acceso)
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
                                                        @if ($acceso->contrasenha != null)
                                                            {{ $acceso->contrasenha }}
                                                        @else
                                                            ---
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>

                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        SEPA
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        @if($proyecto->sepa != null)
                                            <div class="flex">
                                                <x-boton2 tipo="linkConAsset" class="bg-blue-500 hover:bg-blue-700 mr-4 w-16" direccion="{{$proyecto->sepa}}">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                    </x-slot>
                                                </x-boton2>

                                                <x-boton2 tipo="descargaConAsset" class="bg-green-500 hover:bg-green-700 mr-4 w-16" direccion="{{$proyecto->sepa}}">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                                    </x-slot>
                                                </x-boton2>
                                            </div>
                                        @else
                                            <div class="flex">
                                                <x-boton2 tipo="div" class="bg-slate-300 mr-4 w-16 cursor-not-allowed">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                    </x-slot>
                                                </x-boton2>

                                                <x-boton2 tipo="div" class="bg-slate-300 mr-4 w-16 cursor-not-allowed">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                                    </x-slot>
                                                </x-boton2>
                                            </div>
                                        @endif
                                    </td>
                                </tr>

                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        HOJA DE PREFERENCIAS
                                    </th>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        <div class="flex">
                                            @if($proyecto->preferencias)
                                                <x-boton2 tipo="linkConAsset" class="bg-blue-500 hover:bg-blue-700 mr-4 w-16" direccion="{{$proyecto->preferencias}}">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                    </x-slot>
                                                </x-boton2>

                                                <x-boton2 tipo="descargaConAsset" class="bg-green-500 hover:bg-green-700 mr-4 w-16" direccion="{{$proyecto->preferencias}}">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                                    </x-slot>
                                                </x-boton2>
                                            @else
                                                <x-boton2 tipo="div" class="bg-slate-300 mr-4 w-16 cursor-not-allowed">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                    </x-slot>
                                                </x-boton2>

                                                <x-boton2 tipo="div" class="bg-slate-300 mr-4 w-16 cursor-not-allowed">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                                    </x-slot>
                                                </x-boton2>
                                            @endif
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
