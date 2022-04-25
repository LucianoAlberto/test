<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nuevo Proyecto : <a class="text-red-500 uppercase underline"
                href="{{ route('clientes.show', $cliente) }} {{ $cliente->apellidos }}"> {{ $cliente->nombre }}
                {{ $cliente->apellidos }}</a>
        </h2>

        <label class="mr-5">Añadir Concepto
            <x-boton2 tipo="div" nombre="Añadir" class="bg-green-600 hover:bg-green-700 w-16 mr-6" onclick="nuevoConcepto(event)">
                <x-slot name="boton">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                </x-slot>
            </x-boton2>
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
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="nuevoConcepto">
                            Nombre Concepto
                        </label>
                        <input
                            class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text" name="nuevoConcepto" required>
                        @error('nuevoConcepto')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-center">
                        <button
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Crear Concepto
                        </button>
                    </div>
                </form><hr>

                {{--Eliminar concepto--}}

                <form class="bg-gray-300 shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('conceptos.eliminar') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="nuevoConcepto">
                            Eliminar Concepto
                        </label>
                        <select name="eliminaConcepto" id="">

                        </select>
                        @error('eliminaConcepto')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-center">
                        <button
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Eliminar Concepto
                        </button>
                    </div>
                </form><hr>
            </div>






            <div class="mt-5 md:mt-0 md:col-span-2" id="contenedorPrincipal">
                <form method="post" action="{{ route('proyectos.store',$cliente) }}" enctype="multipart/form-data">
                    @csrf
                    <input type="number" name="cliente_id" id="cliente_id" value="{{ $cliente->id }}" hidden>
                    <div class="shadow overflow-hidden sm:rounded-md">

                        <div class="px-4 py-5 bg-white sm:p-6">

                            <div >
                                <div class="flex justify-between mb-4">
                                    <div class="w-1/3">
                                        <label for="concepto"
                                            class="block font-medium text-sm text-gray-700">Concepto</label>

                                        <select name="concepto" id="concepto"
                                            class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('concepto', '') }}">
                                            <option value="">--- Selecionar Concepto ---</option>
                                            {{-- recuperamos todos los conceptos de la BD para poder selecionar alguno --}}
                                            @foreach ($conceptos as $concepto)
                                                <option value="{{ $concepto->nombre }}"
                                                    {{ old('concepto') == $concepto->id ? 'selected' : '' }}>
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
                                            value="{{ old('referencia', '') }}">
                                            <option value="">--- Selecionar Referencia ---</option>
                                            <option value="0">Sin Contrato</option>
                                            {{-- recuperamos todos los conceptos de la BD para poder selecionar alguno --}}
                                            @foreach ($contratos as $contrato)
                                                <option value="{{ $contrato->referencia }}"
                                                    {{ old('referencia') == $contrato->id ? 'selected' : '' }}>
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
                                            class="block font-medium text-sm text-gray-700">Provedor Dominio Usuario</label>
                                        <input type="text" name="proveedor_dominio_usuario" id="proveedor_dominio_usuario">
                                        @error('proveedor_dominio_usuario')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/8">
                                        <label for="proveedor_dominio_password"
                                            class="block font-medium text-sm text-gray-700">Provedor Dominio Password</label>
                                        <input type="text" name="proveedor_dominio_password" id="proveedor_dominio_password">
                                        @error('proveedor_dominio_password')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/8">
                                        <label for="proveedor_hosting_usuario"
                                            class="block font-medium text-sm text-gray-700">Provedor Hosting Usuario</label>
                                        <input type="text" name="proveedor_hosting_usuario" id="proveedor_hosting_usuario">
                                        @error('proveedor_hosting_usuario')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/8">
                                        <label for="proveedor_hosting_password"
                                            class="block font-medium text-sm text-gray-700">Provedor Hosting Password</label>
                                        <input type="text" name="proveedor_hosting_password" id="proveedor_hosting_password">
                                        @error('proveedor_hosting_password')
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
                            <div class="div_contenedorDominios mb-4">
                                <div class="flex">
                                    <h3 class="flex justify-center mt-3 font-bold mb-3 text-2xl">Dominios</h3>
                                    <x-boton2 tipo="div" nombre="Añadir" class="bg-green-600 hover:bg-green-700 w-16 mr-6" onclick="nuevoDominio(event)">
                                        <x-slot name="boton">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                        </x-slot>
                                    </x-boton2>
                                </div>

                                <div class="contenedor_dominio flex justify-between">
                                    <div class="w-1/3 div_nombreDominio">
                                        <label for="dominio_nombre[]"
                                            class="block font-medium text-sm text-gray-700">Nombre Dominio</label>
                                        <input type="text" name="dominio_nombre[]" id="dominio_nombre[]">
                                        @error('dominio_nombre[]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/3">
                                        <label for="dominio_usuario"
                                            class="block font-medium text-sm text-gray-700">Dominio Usuario</label>
                                        <input type="text" name="dominio_usuario" id="dominio_usuario">
                                        @error('dominio_usuario[]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/3">
                                        <label for="dominio_password"
                                            class="block font-medium text-sm text-gray-700">Dominio Password</label>
                                        <input type="text" name="dominio_password" id="dominio_password">
                                        @error('dominio_password[]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>

                            {{-- Base de datos --}}
                            <div class="div_BBDD mb-4">
                                <div>
                                    <h3 class="flex justify-center mt-3 mb-3 font-bold text-2xl">Base De Datos</h3>
                                    <x-boton2 tipo="div" nombre="Añadir" class="bg-green-600 hover:bg-green-700 w-16 mr-6" onclick="nuevaBD(event)">
                                        <x-slot name="boton">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                        </x-slot>
                                    </x-boton2>
                                </div>

                                <div class="flex justify-between  contenedor_BBDD">
                                    <div class="w-1/3 div_nombreBD">
                                        <label for="bd_nombre[]" class="block font-medium text-sm text-gray-700">Nombre
                                            BBDD</label>
                                        <input type="text" name="bd_nombre[]" id="bd_nombre[]">
                                        @error('bd_password[]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/3">
                                        <label for="host[]" class="block font-medium text-sm text-gray-700">Host</label>
                                        <input type="text" name="host[]" id="host[]">
                                        @error('host[]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/3">
                                        <label for="bd_password[]"
                                            class="block font-medium text-sm text-gray-700">Password</label>
                                        <input type="text" name="bd_password[]" id="bd_password[]">
                                        @error('bd_password[]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>


                            {{-- Emails Coorporativos --}}
                            <div class="div_mail mb-4">
                                <div>
                                    <h3 class="flex justify-center mt-3 mb-3 font-bold text-2xl">Email Corporativo</h3>
                                    <x-boton2 tipo="div" nombre="Añadir" class="bg-green-600 hover:bg-green-700 w-16 mr-6" onclick="nuevoEmail(event)">
                                        <x-slot name="boton">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                        </x-slot>
                                    </x-boton2>
                                </div>

                                <div class="flex justify-between  contenedor_mail">
                                    <div class="w-1/3 div_email">
                                        <label for="email[]"
                                            class="block font-medium text-sm text-gray-700">Email</label>
                                        <input type="text" name="email[]" id="email[]">
                                        @error('email[]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/3">
                                        <label for="password[]"
                                            class="block font-medium text-sm text-gray-700">Password</label>
                                        <input type="text" name="password[]" id="password[]">
                                        @error('password[]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/3">
                                        <label for="ruta_accesso[]" class="block font-medium text-sm text-gray-700">Ruta
                                            Accesso</label>
                                        <input type="text" name="ruta_accesso[]" id="ruta_accesso[]">
                                        @error('ruta_accesso[]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>


                            {{-- Accesso --}}
                            <div class="div_accesso mb-4">
                                <div>
                                    <h3 class="flex justify-center mt-3 mb-3 font-bold text-2xl">Accesso</h3>
                                    <x-boton2 tipo="div" nombre="Añadir" class="bg-green-600 hover:bg-green-700 w-16 mr-6" onclick="nuevoAccesso(event)">
                                        <x-slot name="boton">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                        </x-slot>
                                    </x-boton2>
                                </div>

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
                                    Crear
                                </button>
                            </div>
                        </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
