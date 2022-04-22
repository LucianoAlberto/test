<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nuevo Contrato : <a class="text-red-500 uppercase underline"
                href="{{ route('clientes.show', $proyecto->cliente->id) }} {{ $proyecto->cliente->apellidos }}"> {{ $proyecto->cliente->nombre }}
                {{ $proyecto->cliente->apellidos }}</a>
        </h2>
        <label class="mr-5">Conceptos
            <x-mi_boton></x-mi_boton>
        </label>

        <label class="mr-5">Añadir Dominio
            <x-mi_buton2></x-mi_buton2>
        </label>

        <label class="mr-5">Añadir DB
            <x-mi_buton3></x-mi_buton3>
        </label>

        <label class="mr-5">Añadir Email
            <x-mi_buton4></x-mi_buton4>
        </label>

        <label class="mr-5">Añadir Accesso
            <x-mi_buton5></x-mi_buton5>
        </label>
    </x-slot>


    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">

            {{-- Formulario para un Nuevo concepto --}}
            <div class="w-full max-w-xs  m-auto mt-5 mb-5 bg-gray-200" id='nuevoConcepto' hidden>
                <div class="flex justify-end ">
                    <x-ocultar_Div></x-ocultar_Div>
                </div>
                <form class="bg-gray-300 shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('conceptos.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <input
                            class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="nombre concepto"
                            type="text" name="nuevoConcepto" required>
                        @error('nuevoConcepto')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-center">
                        <button
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Crear Concepto
                        </button>
                    </div>
                </form><hr>

                {{--Eliminar concepto--}}

                <form class="bg-gray-300 shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('conceptos.eliminar') }}"
                    method="GET" onsubmit="estasSeguro(event)"  id="formulario_eliminar_concepto">
                    @csrf
                    <div class="mb-4">
                        <select name="eliminarConcepto" id="eliminarConcepto">
                            @foreach ($conceptos as $concepto)
                                                <option value="{{ $concepto->nombre }}"
                                                    {{ old('concepto') == $concepto->id ? 'selected' : '' }}>
                                                     {{$concepto->nombre}}</option>
                                            @endforeach
                        </select>
                        @error('eliminarConcepto')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-center">
                        <button
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" >
                            Eliminar Concepto
                        </button>
                    </div>
                </form><hr>
            </div>






            <div class="mt-5 md:mt-0 md:col-span-2" id="contenedorPrincipal">
                <form method="post" action="{{route('proyectos.update',$proyecto)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="number" name="cliente_id" id="cliente_id" value="{{ $proyecto->cliente->id }}" hidden>
                    <div class="shadow overflow-hidden sm:rounded-md">

                        <div class="px-4 py-5 bg-white sm:p-6">

                            <div >
                                <div class="flex justify-between mb-4">
                                    <div class="w-1/3">
                                        <label for="concepto"
                                            class="block font-medium text-sm text-gray-700">Concepto</label>


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
                                            class="block font-medium text-sm text-gray-700">Referencia</label>

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
                                        <label for="provedor_dominio_usuario"
                                            class="block font-medium text-sm text-gray-700">Provedor Dominio Usuario</label>
                                        <input type="text" name="provedor_dominio_usuario" id="provedor_dominio_usuario" value="{{ old('provedor_dominio_usuario',$proyecto->provedor_dominio_usuario)}}"/>
                                        @error('provedor_dominio_usuario')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/8">
                                        <label for="provedor_dominio_password"
                                            class="block font-medium text-sm text-gray-700">Provedor Dominio Password</label>
                                        <input type="text" name="provedor_dominio_password" id="provedor_dominio_password"  value="{{ old('provedor_dominio_password',$proyecto->provedor_dominio_password) }}" >
                                        @error('provedor_dominio_password')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/8">
                                        <label for="provedor_hosting_usuario"
                                            class="block font-medium text-sm text-gray-700">Provedor Hosting Usuario</label>
                                        <input type="text" name="provedor_hosting_usuario" id="provedor_hosting_usuario" value="{{ old('provedor_hosting_usuario',$proyecto->provedor_hosting_usuario) }}"  >
                                        @error('provedor_hosting_usuario')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/8">
                                        <label for="provedor_hosting_password"
                                            class="block font-medium text-sm text-gray-700">Provedor Hosting Password</label>
                                        <input type="text" name="provedor_hosting_password" id="provedor_hosting_password" value="{{ old('provedor_hosting_password',$proyecto->provedor_hosting_password) }}" >
                                        @error('provedor_hosting_password')
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

                            <div class="div_dominios mb-4">
                                <h3 class="flex justify-center mt-3 font-bold mb-3 text-2xl">Dominios</h3>
                                @if ($proyecto->dominios!=null)
                                    @foreach ($proyecto->dominios as $key=>$dominio)
                                <div class="flex justify-between contenedor_dominio" >
                                    <div class="w-1/3 div_nombreDominio">
                                        <label for="dominio_nombre[{{$key}}]"
                                            class="block font-medium text-sm text-gray-700">Nombre Dominio</label>
                                        <input type="text" name="dominio_nombre[{{$key}}]" value="{{$dominio->nombre}}" />
                                        @error('dominio_nombre[{{$key}}]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/3">
                                        <label for="dominio_usuario[{{$key}}]"
                                            class="block font-medium text-sm text-gray-700">Dominio Usuario</label>
                                        <input type="text" name="dominio_usuario[{{$key}}]" value="{{$dominio->usuario}}" >
                                        @error('dominio_usuario[{{$key}}]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/3">
                                        <label for="dominio_password[{{$key}}]"
                                            class="block font-medium text-sm text-gray-700">Dominio Password</label>
                                        <input type="text" name="dominio_password[{{$key}}]" value="{{$dominio->password}}">
                                        @error('dominio_password[{{$key}}]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                @endforeach

                                @else

                                <div class="flex justify-between contenedor_dominio" >
                                    <div class="w-1/3 div_nombreDominio">
                                        <label for="dominio_nombre[]"
                                            class="block font-medium text-sm text-gray-700">Nombre Dominio</label>
                                        <input type="text" name="dominio_nombre[]" value="" />
                                        @error('dominio_nombre[]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/3">
                                        <label for="dominio_usuario[]"
                                            class="block font-medium text-sm text-gray-700">Dominio Usuario</label>
                                        <input type="text" name="dominio_usuario[]" value="" >
                                        @error('dominio_usuario[]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/3">
                                        <label for="dominio_password[]"
                                            class="block font-medium text-sm text-gray-700">Dominio Password</label>
                                        <input type="text" name="dominio_password[]" value="">
                                        @error('dominio_password[]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>


                                @endif
                            </div>
                            <hr>

                            {{-- Base de datos --}}
                            <div class="div_BBDD mb-4">
                                <h3 class="flex justify-center mt-3 mb-3 font-bold text-2xl">Base De Datos</h3>
                                @if ($proyecto->baseDatos!=null)
                                     @foreach ($proyecto->baseDatos as $key=>$bd)
                                     <div class="flex justify-between  contenedor_BBDD">
                                        <div class="w-1/3 div_nombreBD">
                                            <label for="bd_nombre[{{$key}}]" class="block font-medium text-sm text-gray-700">Nombre
                                                BBDD</label>
                                            <input type="text" name="bd_nombre[{{$key}}]" value="{{$bd->nombre}}" >
                                            @error('bd_nombre[{{$key}}]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/3">
                                            <label for="host[{{$key}}]" class="block font-medium text-sm text-gray-700">Host</label>
                                            <input type="text" name="host[{{$key}}]" value="{{$bd->host}}">
                                            @error('host[{{$key}}]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/3">
                                            <label for="bd_password[{{$key}}]"
                                                class="block font-medium text-sm text-gray-700">Password</label>
                                            <input type="text" name="bd_password[{{$key}}]" value="{{$bd->password}}">
                                            @error('bd_password[{{$key}}]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                     @endforeach
                                     @else

                                     <div class="flex justify-between  contenedor_BBDD">
                                        <div class="w-1/3 div_nombreBD">
                                            <label for="bd_nombre[]" class="block font-medium text-sm text-gray-700">Nombre
                                                BBDD</label>
                                            <input type="text" name="bd_nombre[]" value="" >
                                            @error('bd_nombre[]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/3">
                                            <label for="host[]" class="block font-medium text-sm text-gray-700">Host</label>
                                            <input type="text" name="host[]" value="">
                                            @error('host[]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/3">
                                            <label for="bd_password[]"
                                                class="block font-medium text-sm text-gray-700">Password</label>
                                            <input type="text" name="bd_password[]" value="">
                                            @error('bd_password[]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                @endif
                            </div>
                            <hr>


                            {{-- Emails Coorporativos --}}
                            <div class="div_mail mb-4">
                                <h3 class="flex justify-center mt-3 mb-3 font-bold text-2xl">Email Corporativo</h3>
                                @if ($proyecto->emails==null)
                                <h1>if</h1>
                                <div class="flex justify-between  contenedor_mail">
                                    <div class="w-1/3 div_email">
                                        <label for="email[]"
                                            class="block font-medium text-sm text-gray-700">Email</label>
                                        <input type="text" name="email[]" >
                                        @error('email[]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/3">
                                        <label for="password[]"
                                            class="block font-medium text-sm text-gray-700">Password</label>
                                        <input type="text" name="password[]" >
                                        @error('password[]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/3">
                                        <label for="ruta_accesso[]" class="block font-medium text-sm text-gray-700">Ruta
                                            Accesso</label>
                                        <input type="text" name="ruta_accesso[]" >
                                        @error('ruta_accesso[]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                    @else
                                    <h1>else</h1>
                                    @foreach ($proyecto->emails as $key=>$email)
                                    <div class="flex justify-between  contenedor_mail">
                                        <div class="w-1/3 div_email">
                                            <label for="email[{{$key}}]"
                                                class="block font-medium text-sm text-gray-700">Email</label>
                                            <input type="text" name="email[{{$key}}]" value="{{$email->email}}">
                                            @error('email[{{$key}}]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/3">
                                            <label for="password[{{$key}}]"
                                                class="block font-medium text-sm text-gray-700">Password</label>
                                            <input type="text" name="password[{{$key}}]" value="{{$email->password}}">
                                            @error('password[{{$key}}]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/3">
                                            <label for="ruta_accesso[{{$key}}]" class="block font-medium text-sm text-gray-700">Ruta
                                                Accesso</label>
                                            <input type="text" name="ruta_accesso[{{$key}}]" value="{{$email->ruta_accesso}}">
                                            @error('ruta_accesso[{{$key}}]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                            <hr>


                            {{-- Accesso --}}
                            <div class="div_accesso mb-4">
                                <h3 class="flex justify-center mt-3 mb-3 font-bold text-2xl">Accesso</h3>
                                <div class="flex justify-between  contenedor_accesso">
                                    <div class="w-1/3 div_email">
                                        <label for="dominio_accesso[]"
                                            class="block font-medium text-sm text-gray-700">Dominio</label>
                                        <input type="text" name="dominio_accesso[]" id="dominio_accesso[]">
                                        @error('dominio_accesso[]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/3">
                                        <label for="usuario_accesso[]"
                                            class="block font-medium text-sm text-gray-700">Usuario</label>
                                        <input type="text" name="usuario_accesso[]" id="usuario_accesso[]">
                                        @error('usuario_accesso[]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/3">
                                        <label for="password_accesso[]"
                                            class="block font-medium text-sm text-gray-700">Password</label>
                                        <input type="text" name="password_accesso[]" id="password_accesso[]">
                                        @error('password_accesso[]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>



                            <div class="mx-auto mt-3 mb-3">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="otros_datos">
                                    Otros Datos
                                 </label>
                                 <textarea name="otros_datos" id="otros_datos" cols="102" rows="10" scroll>

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
