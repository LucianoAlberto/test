<x-app-layout>
  <!--Menu superior-->
<x-slot name="header">
    <div class="flex justify-between ">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          <a class="text-red-500 uppercase underline" href="{{route('clientes.show', $proyecto->cliente)}}"> {{$proyecto->cliente->nombre}} {{$proyecto->cliente->apellidos}}</a>
        </h2>

        <div class="flex justify-end "> 
            <div class="block  mx-2">
                <a href="{{ route('contratos.index', $proyecto->cliente) }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Contratos</a>
            </div>

            <div class="block  mx-2">
                <a href="{{ route('facturas.index',$proyecto->cliente) }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Facturas</a>
            </div>

            <div class="block  mx-2">
                <a href="{{route('proyectos.index',$proyecto->cliente)}}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Proyectos</a>
            </div>
        </div>
    </div>
    </x-slot>
    <!---Fin menu superior-->
    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">

            {{-- Formulario para un Nuevo concepto --}}
            <div class="w-1/2 max-w-xs  m-auto mt-5 mb-5 bg-gray-300 border-2" id='nuevoConcepto' hidden >

                <div class="flex justify-end mb-5">
                    <x-boton2 tipo="div" class="bg-red-600 hover:bg-red-700 w-6 h-6 " onclick="closeNuevoConcepto()">
                        <x-slot name="boton">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </x-slot>
                    </x-boton2>
                </div>
        
                <form class="bg-gray-300  rounded mb-4" action="{{ route('conceptos.store') }}"
                    method="POST" enctype="multipart/form-data">            
                    @csrf
                    <div class="flex justify-between mx-5 place-content-center py-2">
                        <input
                            class="shadow appearance-none border border-black rounded py-2 mx-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-3/4"
                            type="text" name="nuevoConcepto" placeholder="Crear nuevo concepto" required>
        
                            <x-boton2 tipo="input" nombre="Borrar" class="bg-green-600 hover:bg-green-700 w-12">
                                <x-slot name="boton">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                      </svg>
                                </x-slot>
                            </x-boton2>
                        @error('nuevoConcepto')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>           
                </form>
        
                {{--Eliminar concepto--}}       
                <form class="bg-gray-300  rounded  mb-4" action="{{ route('conceptos.eliminar') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class=" flex justify-between mx-5 place-content-center py-2">
                    
                        <select name="eliminarConcepto" id="eliminarConcepto"  class="form-input rounded-md shadow-sm mt-1 block w-3/4 mx-auto">
                            <option value="">Seleciona concepto</option>
                            @foreach ($conceptos as $concepto)
                                <option value="{{ $concepto->nombre }}"
                                    {{ old('concepto') == $concepto->id ? 'selected' : '' }}>
                                        {{$concepto->nombre}}
                                </option>
                            @endforeach
                        </select>
        
                        <x-boton2 tipo="input" nombre="Borrar" class="bg-red-600 hover:bg-red-700 w-12 ">
                            <x-slot name="boton">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                            </x-slot>
                        </x-boton2>
                        
                        @error('eliminaConcepto')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </form><hr>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2" id="contenedorPrincipal">
                <h3 class="text-center font-bold uppercase w-full py-5 bg-gray-300">Editando Proyecto . . . </h3>
                <form method="post" action="{{route('proyectos.update',['cliente' => $proyecto->cliente, 'proyecto' => $proyecto])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="number" name="cliente_id" id="cliente_id" value="{{ $proyecto->cliente->id }}" hidden>
                    <div class="shadow overflow-hidden sm:rounded-md">

                        <div class="px-4 py-5 bg-white sm:p-6">

                            <div >
                                <div class="flex justify-between mb-4">
                                    <div class="w-1/3">
                                        <label for="concepto"
                                            class="flex font-medium text-sm text-gray-700">Concepto
                                            <x-boton2 tipo="div" class="ml-1 bg-gray-400 hover:bg-gray-300 w-6 h-6 fill-none " onclick="nuevoConcepto()">
                                                <x-slot name="boton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-slash-minus" viewBox="0 0 16 16">
                                                        <path d="m1.854 14.854 13-13a.5.5 0 0 0-.708-.708l-13 13a.5.5 0 0 0 .708.708ZM4 1a.5.5 0 0 1 .5.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2A.5.5 0 0 1 4 1Zm5 11a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5A.5.5 0 0 1 9 12Z"/>
                                                      </svg>
                                                </x-slot>
                                            </x-boton2>
                                        </label>


                                        <select name="concepto" id="concepto"
                                            class="form-input rounded-md shadow-sm mt-1 block w-full"
                                           >

                                            {{-- recuperamos todos los conceptos de la BD para poder selecionar alguno --}}
                                            @foreach ($conceptos as $concepto)
                                                <option value="{{ $concepto->nombre }}"
                                                    {{ $proyecto->concepto == $concepto->nombre ? 'selected' : '' }}>
                                                    {{ $concepto->nombre }}</option>
                                            @endforeach
                                        </select>


                                        @error('concepto')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/3">
                                        <label for="referencia"
                                            class="block font-medium text-sm text-gray-700 mt-1">Referencia</label>

                                        <select name="referencia" id="referencia"
                                            class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            >

                                            {{-- recuperamos todos los conceptos de la BD para poder selecionar alguno --}}
                                            @foreach ($contratos as $contrato)
                                                <option value="{{ $contrato->referencia}}"
                                                    {{ $proyecto->referencia == $contrato->referencia ? 'selected' :'' }}>
                                                    {{ $contrato->referencia }}</option>
                                            @endforeach
                                        </select>
                                        @error('referencia')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex justify-between mb-4">
                                    <div class="w-1/8">
                                        <label for="proveedor_dominio_usuario"
                                            class="block font-medium text-sm text-gray-700">Proveedor Dominio Usuario</label>
                                        <input type="text" name="proveedor_dominio_usuario" id="proveedor_dominio_usuario"
                                        value="{{ old('proveedor_dominio_usuario', $proyecto->proveedor_dominio_usuario)}}"/>
                                        @error('proveedor_dominio_usuario')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/8">
                                        <label for="proveedor_dominio_contrasenha"
                                            class="block font-medium text-sm text-gray-700">Proveedor Dominio Password</label>
                                        <input type="text" name="proveedor_dominio_contrasenha"
                                        value="{{ old('proveedor_dominio_contrasenha', $proyecto->proveedor_dominio_contrasenha) }}" >
                                        @error('proveedor_dominio_contrasenha')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/8">
                                        <label for="proveedor_hosting_usuario"
                                            class="block font-medium text-sm text-gray-700">Proveedor Hosting Usuario</label>
                                        <input type="text" name="proveedor_hosting_usuario" id="proveedor_hosting_usuario"
                                        value="{{ old('proveedor_hosting_usuario', $proyecto->proveedor_hosting_usuario) }}"  >
                                        @error('proveedor_hosting_usuario')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/8">
                                        <label for="proveedor_hosting_contrasenha"
                                            class="block font-medium text-sm text-gray-700">Proveedor Hosting Password</label>
                                        <input type="text" name="proveedor_hosting_contrasenha"
                                        value="{{ old('proveedor_hosting_contrasenha', $proyecto->proveedor_hosting_contrasenha) }}" >
                                        @error('proveedor_hosting_contrasenha')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>


                                </div>

                                <div class="flex justify-between mb-4">
                                    <div class="mb-4 w-1/2 mr-6">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="sepa">
                                          Subir SEPA
                                        </label>
                                        <input class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="sepa" type="file" name="sepa"  >
                                        @error('sepa')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                     @enderror
                                     </div>

                                     <div class="mb-4 w-1/2 ">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="hoja_preferencia">
                                          Subir Hoja Preferencia
                                        </label>
                                        <input class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="hoja_preferencia" type="file" name="hoja_preferencia"  >
                                        @error('hoja_preferencia')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                     @enderror
                                     </div>
                                </div>
                            </div>
                            <hr>

                            {{-- Dominios --}}
                            <div class="divDominios mb-4 pb-b relative">
                                <h3 class="flex justify-center mt-3 font-bold mb-3 text-2xl">Dominios</h3>
                                <div class="absolute right-0 flex -mt-10">
                                    <x-boton2 tipo="div" nombre="Añadir" class="bg-green-600 hover:bg-green-700 w-16 mr-6" onclick="masDominio(event)">
                                        <x-slot name="boton">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                        </x-slot>
                                    </x-boton2>
    
                                    <x-boton2 tipo="div" nombre="menos" class="bg-red-600 hover:bg-red-700 w-16" onclick="menosDominio(event)">
                                        <x-slot name="boton">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                        </x-slot>
                                    </x-boton2>

                                </div>
                               

                                @if (count($proyecto->dominios) > 0)
                                    @foreach ($proyecto->dominios as $key => $dominio)
                                        <div class="contenedorDominios flex justify-between" >
                                            <div class="divNombreDominio w-1/3">
                                                <label for="dominio[{{$key}}][nombre]"
                                                    class="block font-medium text-sm text-gray-700">Nombre Dominio</label>
                                                <input type="text" name="dominio[{{$key}}][nombre]"
                                                    value="{{ old("dominio[$key][nombre]", "$dominio->nombre") }}">
                                                @error('dominio[{{$key}}][nombre]')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="w-1/3 divUsuarioDominio">
                                                <label for="dominio[{{$key}}][usuario]"
                                                    class="block font-medium text-sm text-gray-700">Dominio Usuario</label>
                                                <input type="text" name="dominio[{{$key}}][usuario]"
                                                    value="{{ old("dominio[$key][usuario]", "$dominio->usuario") }}">
                                                @error('dominio[{{$key}}][usuario]')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="w-1/3 divContrasenhaDominio">
                                                <label for="dominio[{{$key}}][contrasenha]"
                                                    class="block font-medium text-sm text-gray-700">Dominio Contraseña</label>
                                                <input type="text" name="dominio[{{$key}}][contrasenha]"
                                                    value="{{ old("dominio[$key][contrasenha]", "$dominio->contrasenha") }}">
                                                @error('dominio[{{$key}}][contrasenha]')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="contenedorDominios flex justify-between" >
                                        <div class="w-1/3 divNombreDominio">
                                            <label for="dominio[0][nombre]"
                                                class="block font-medium text-sm text-gray-700">Nombre Dominio</label>
                                            <input type="text" name="dominio[0][nombre]"
                                                value="{{ old("dominio[0][nombre]", "") }}">
                                            @error('dominio[0][nombre]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/3 divUsuarioDominio">
                                            <label for="dominio[0][usuario]"
                                                class="block font-medium text-sm text-gray-700">Dominio Usuario</label>
                                            <input type="text" name="dominio[0][usuario]"
                                                value="{{ old("dominio[0][usuario]", "") }}">
                                            @error('dominio[0][usuario]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/3 divContrasenhaDominio">
                                            <label for="dominio[0][contrasenha]"
                                                class="block font-medium text-sm text-gray-700">Dominio Contraseña</label>
                                            <input type="text" name="dominio[0][contrasenha]"
                                                value="{{ old("dominio[0][contrasenha]", "") }}">
                                            @error('dominio[0][contrasenha]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <hr>

                            {{-- Base de datos --}}
                            <div class=" divBasesDatos  mb-4 relative">
                                <h3 class="flex justify-center mt-3 mb-3 font-bold text-2xl">Base De Datos</h3>
                                <div class="absolute right-0 flex -mt-10">
                                    <x-boton2 tipo="div" nombre="Añadir" class="bg-green-600 hover:bg-green-700 w-16 mr-6" onclick="masBasesDatos(event)">
                                        <x-slot name="boton">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                        </x-slot>
                                    </x-boton2>

                                    <x-boton2 tipo="div" nombre="menos" class="bg-red-600 hover:bg-red-700 w-16" onclick="menosBasesDatos(event)">
                                        <x-slot name="boton">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                        </x-slot>
                                    </x-boton2>
                                </div>
                              
                                @if (count($proyecto->baseDatoss) > 0)
                                     @foreach ($proyecto->baseDatoss as $key => $bd)
                                        <div class="flex justify-between  contenedorBasesDatos">
                                            <div class="w-1/3 divNombreBD">
                                                <label for="bd[{{$key}}][nombre]" class="block font-medium text-sm text-gray-700">Nombre
                                                    BBDD</label>
                                                <input type="text" name="bd[{{$key}}][nombre]"
                                                    value="{{ old("bd[$key][nombre]", "$bd->nombre") }}">
                                                @error('bd[{{$key}}][nombre]')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="w-1/3 divHostBD">
                                                <label for="bd[{{$key}}][host]" class="block font-medium text-sm text-gray-700">Host</label>
                                                <input type="text" name="bd[{{$key}}][host]"
                                                    value="{{ old("bd[$key][host]", "$bd->host") }}">
                                                @error('bd[{{$key}}][host]')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="w-1/3 divContrasenhaBD">
                                                <label for="bd[{{$key}}][contrasenha]"
                                                    class="block font-medium text-sm text-gray-700">Password</label>
                                                <input type="text" name="bd[{{$key}}][contrasenha]"
                                                    value="{{ old("bd[$key][contrasenha]", "$bd->contrasenha") }}">
                                                @error('bd[{{$key}}][contrasenha]')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="flex justify-between  contenedorBasesDatos">
                                        <div class="w-1/3 divNombreBD">
                                            <label for="bd[0][nombre]" class="block font-medium text-sm text-gray-700">Nombre
                                                BBDD</label>
                                            <input type="text" name="bd[0][nombre]"
                                                value="{{ old("bd[0][nombre]", "") }}">
                                            @error('bd[][nombre]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/3 divHostBD">
                                            <label for="bd[0][host]" class="block font-medium text-sm text-gray-700">Host</label>
                                            <input type="text" name="bd[0][host]"
                                                value="{{ old("bd[0][host]", "") }}">
                                            @error('bd[][host]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/3 divContrasenhaBD">
                                            <label for="bd[0][contrasenha]"
                                                class="block font-medium text-sm text-gray-700">Contraseña</label>
                                            <input type="text" name="bd[0][contrasenha]"
                                                value="{{ old("bd[0][contrasenha]", "") }}">
                                            @error('bd[0][contrasenha]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <hr>


                            {{-- Emails Coorporativos --}}
                            <div class="divEmail mb-4">
                                <div class="flex items-center justify-center relative">
                                    <h3 class="flex justify-center mt-3 mb-3 font-bold text-2xl">Email Corporativo</h3>
                                    <div class="absolute right-0 flex">
                                        <x-boton2 tipo="div" nombre="Añadir" class="bg-green-600 hover:bg-green-700 w-16 mr-6" onclick="masEmail(event)">
                                            <x-slot name="boton">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                            </x-slot>
                                        </x-boton2>

                                        <x-boton2 tipo="div" nombre="menos" class="bg-red-600 hover:bg-red-700 w-16" onclick="menosEmail(event)">
                                            <x-slot name="boton">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                            </x-slot>
                                        </x-boton2>
                                    </div>
                                </div>

                                @if (count($proyecto->emailcorporativos) > 0)
                                    @foreach ($proyecto->emailcorporativos as $key => $email)
                                    <div class="contenedorEmails flex justify-between">
                                        <div class="divEmailEmail w-1/3">
                                            <label for="email[{{$key}}][email]"
                                                class="block font-medium text-sm text-gray-700">Email</label>
                                            <input type="text" name="email[{{$key}}][email]"
                                                value="{{ old("email[$key][email]", "$email->email") }}">
                                            @error('email[][email]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="divEmailContrasenha w-1/3">
                                            <label for="email[{{$key}}][contrasenha]"
                                                class="block font-medium text-sm text-gray-700">Contraseña</label>
                                            <input type="text" name="email[{{$key}}][contrasenha]"
                                                value="{{ old("email[$key][contrasenha]", "$email->contrasenha") }}">
                                            @error('email[][contrasenha]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="divEmailRuta w-1/3">
                                            <label for="email[{{$key}}][ruta_acceso]" class="block font-medium text-sm text-gray-700">Ruta
                                                Accesso</label>
                                            <input type="text" name="email[{{$key}}][ruta_acceso]"
                                                value="{{ old("email[$key][ruta_acceso]", "$email->ruta_acceso") }}">
                                            @error('email[][ruta_acceso]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    @endforeach
                                @else
                                    <div class="contenedorEmails flex justify-between">
                                        <div class="divEmailEmail w-1/3">
                                            <label for="email[0][email]"
                                                class="block font-medium text-sm text-gray-700">Email</label>
                                            <input type="text" name="email[0][email]"
                                                value="{{ old("email[0][email]", "") }}">
                                            @error('email[][email]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="divEmailContrasenha w-1/3">
                                            <label for="email[0][contrasenha]"
                                                class="block font-medium text-sm text-gray-700">Contraseña</label>
                                            <input type="text" name="email[0][contrasenha]"
                                                value="{{ old("email[0][email]", "") }}">
                                            @error('email[][contrasenha]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="divEmailRuta w-1/3">
                                            <label for="email[0][ruta_acceso]" class="block font-medium text-sm text-gray-700">Ruta
                                                Accesso</label>
                                            <input type="text" name="email[0][ruta_acceso]"
                                                value="{{ old("email[0][email]", "") }}">
                                            @error('email[][ruta_acceso]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <hr>


                            {{-- Accesso --}}
                            <div class="divAccesos mb-4">
                                <div class="flex items-center justify-center relative">
                                    <h3 class="flex justify-center mt-3 mb-3 font-bold text-2xl">Acceso</h3>
                                    <div class="absolute right-0 flex">
                                        <x-boton2 tipo="div" nombre="Añadir" class="bg-green-600 hover:bg-green-700 w-16 mr-6" onclick="masAcceso(event)">
                                            <x-slot name="boton">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                            </x-slot>
                                        </x-boton2>

                                        <x-boton2 tipo="div" nombre="menos" class="bg-red-600 hover:bg-red-700 w-16" onclick="menosAcceso(event)">
                                            <x-slot name="boton">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                            </x-slot>
                                        </x-boton2>
                                    </div>
                                </div>
                                @if (count($proyecto->accesos) > 0)
                                    @foreach ($proyecto->accesos as $key => $acceso)
                                        <div class="contenedorAccesos flex justify-between">
                                            <div class="divDominioAcceso w-1/3">
                                                <label for="acceso[{{$key}}][dominio]"
                                                    class="block font-medium text-sm text-gray-700">Dominio</label>
                                                <input type="text" name="acceso[{{$key}}][dominio]"
                                                value="{{ old("acceso[$key][dominio]", "$acceso->dominio") }}">
                                                @error('acceso[{{$key}}][dominio]')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="divUsuarioAcceso w-1/3">
                                                <label for="acceso[{{$key}}][usuario]"
                                                    class="block font-medium text-sm text-gray-700">Usuario</label>
                                                <input type="text" name="acceso[{{$key}}][usuario]"
                                                value="{{ old("acceso[$key][usuario]", "$acceso->usuario") }}">
                                                @error('acceso[{{$key}}][usuario]')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="divContrasenhaAcceso w-1/3">
                                                <label for="acceso[{{$key}}][contrasenha]"
                                                    class="block font-medium text-sm text-gray-700">Contraseña</label>
                                                <input type="text" name="acceso[{{$key}}][contrasenha]"
                                                    value="{{ old("acceso[$key][usuario]", "$acceso->contrasenha") }}">
                                                @error('acceso[{{$key}}][contrasenha]')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="contenedorAccesos flex justify-between">
                                        <div class="divDominioAcceso w-1/3">
                                            <label for="accesos[0][dominio]"
                                                class="block font-medium text-sm text-gray-700">Dominio</label>
                                            <input type="text" name="acceso[0][dominio]"
                                            value="{{ old("acceso[0][dominio]", "") }}">
                                            @error('acceso[0][dominio]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="divUsuarioAcceso w-1/3">
                                            <label for="acceso[0][usuario]"
                                                class="block font-medium text-sm text-gray-700">Usuario</label>
                                            <input type="text" name="acceso[0][usuario]"
                                            value="{{ old("acceso[0][usuario]", "") }}">
                                            @error('acceso[0][usuario]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="divContrasenhaAcceso w-1/3">
                                            <label for="acceso[0][contrasenha]"
                                                class="block font-medium text-sm text-gray-700">Contraseña</label>
                                            <input type="text" name="acceso[0][contrasenha]"
                                                value="{{ old("acceso[0][usuario]", "") }}">
                                            @error('acceso[0][contrasenha]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <hr>

                            <div class="mx-auto mt-3 mb-3">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="otros_datos">
                                    Otros Datos
                                 </label>
                                 <textarea name="otros_datos" id="otros_datos" cols="102" rows="10" scroll>
                                 {{ old("otros_datos", "$proyecto->otros_datos") }}
                                 </textarea>

                            </div>


                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button
                                    class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-500 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    Guardar Cambios
                                </button>
                            </div>
                        </div>
                </form>
            </div>
            @if(session('eliminado')=='si')
                <script>alert('Concepto Eliminado con Exito');</script>
            @endif

            @if(session('creado')=='si')
            <script>alert('Concepto Creado con Exito');</script>
          @endif
        </div>
    </div>
</x-app-layout>
