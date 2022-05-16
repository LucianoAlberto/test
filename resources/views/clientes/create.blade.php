<x-app-layout>
    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">

 {{--Formulario para un Nuevo ambito--}}
 <div class="w-1/2 max-w-xs  m-auto mt-5 mb-5 bg-gray-300 border-2" id='nuevoAmbito'  >

    <div class="flex justify-end mb-5">
        <x-boton2 tipo="div" class="bg-red-600 hover:bg-red-700 w-6 h-6 " onclick="closenuevoAmbito()">
            <x-slot name="boton">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </x-slot>
        </x-boton2>
    </div>

    <form class="bg-gray-300  rounded mb-4" action="{{ route('ambitos.store') }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex justify-between mx-5 place-content-center py-2">
            <input
                class="shadow appearance-none border border-black rounded py-2 mx-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-3/4"
                type="text" name="nuevoAmbito" placeholder="Crear nuevo concepto" required>

                <x-boton2 tipo="input" nombre="Borrar" class="bg-green-600 hover:bg-green-700 w-12">
                    <x-slot name="boton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                          </svg>
                    </x-slot>
                </x-boton2>
            @error('nuevoAmbito')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </form>

    {{--Eliminar ambito--}}

    <form class="bg-gray-300  rounded  mb-4" action="{{ route('ambitos.destroy') }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        <div class=" flex justify-between mx-5 place-content-center py-2">

            <select name="eliminarAmbito" id="eliminarAmbito"  class="form-input rounded-md shadow-sm mt-1 block w-3/4 mx-auto">
                <option value="">Seleciona concepto</option>
                @foreach ($ambitos as $ambito)
                    <option value="{{ $ambito->nombre }}"
                        {{ old('ambito') == $ambito->id ? 'selected' : '' }}>
                            {{$ambito->nombre}}
                    </option>
                @endforeach
            </select>

            <x-boton2 tipo="input" nombre="Borrar" class="bg-red-600 hover:bg-red-700 w-12 ">
                <x-slot name="boton">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                </x-slot>
            </x-boton2>

            @error('eliminarAmbito')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </form><hr>
</div>


            <div class="mt-5 md:mt-0 md:col-span-2">
                <form id="formulario" method="post" action="{{ route('clientes.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md ">
                        <h3 class="text-center font-bold uppercase w-full py-5 bg-gray-300">Nuevo Cliente</h3>
                        <div class="px-4 py-5 bg-white sm:p-6 divide-y-4">
                            <div class="divDatosPersonales mb-4">
                                <div class="flex justify-between mb-8">
                                    <div class="w-2/5 mr-2">
                                        <label for="nombre" class="block font-medium text-sm text-gray-700">Nombre</label>
                                        <input type="text" name="nombre" id="nombre" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('nombre', '') }}" />
                                        @error('nombre')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-2/5 ml-2 mr-2">
                                        <label for="apellidos" class="block font-medium text-sm text-gray-700">Apellidos</label>
                                        <input type="text" name="apellidos" id="apellidos" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('apellidos', '') }}" />
                                        @error('apellidos')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/5 ml-2">
                                        <label for="dni" class="block font-medium text-sm text-gray-700">DNI</label>
                                        <input type="text" name="dni" id="dni" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('dni', '') }}" placeholder="DNI or NIE"/>
                                        @error('dni')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex justify-between mb-8">
                                    <div class="w-3/6 mr-2">
                                        <label for="direccion_fiscal" class="block font-medium text-sm text-gray-700">Dirección fiscal</label>
                                        <input type="text" name="direccion_fiscal" id="direccion_fiscal" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('direccion_fiscal', '') }}" />
                                        @error('direccion_fiscal')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-3/6 ml-2">
                                        <label for="domicilio" class="block font-medium text-sm text-gray-700">Domicilio</label>
                                        <input type="text" name="domicilio" id="domicilio" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('domicilio', '') }}" />
                                        @error('domicilio')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex justify-between mb-8">
                                    <div class="w-2/5 mr-2">
                                        <label for="nombre_comercial" class="block font-medium text-sm text-gray-700">Nombre comercial</label>
                                        <input type="text" name="nombre_comercial" id="nombre_comercial" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('nombre_comercial', '') }}" />
                                        @error('nombre_comercial')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-2/5 mr-2 ml-2">
                                        <label for="nombre_sociedad" class="block font-medium text-sm text-gray-700">Nombre sociedad</label>
                                        <input type="text" name="nombre_sociedad" id="nombre_sociedad" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('nombre_sociedad', '') }}" />
                                        @error('nombre_sociedad')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/5 ml-2">
                                        <label for="cif" class="block font-medium text-sm text-gray-700">CIF</label>
                                        <input type="text" name="cif" id="cif" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('cif', '') }}" />
                                        @error('cif')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex justify-between mb-8">
                                    <div class="w-3/6 mr-2">
                                        <label for="cuenta_bancaria" class="block font-medium text-sm text-gray-700">Cuenta bancaria</label>
                                        <input type="text" name="cuenta_bancaria" id="cuenta_bancaria" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('cuenta_bancaria', '') }}" placeholder="ES-XX-XXXX-XXXX-XX-XXXXXXXXXX" maxlength="29"
                                            onkeyup="mascaraIban()"/>
                                        @error('cuenta_bancaria')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-3/6 ml-2">
                                        <label for="n_tarjeta" class="block font-medium text-sm text-gray-700">Número de tarjeta</label>
                                        <input type="text" name="n_tarjeta" id="n_tarjeta" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('n_tarjeta', '') }}" onkeyup="numero_tarjeta()" maxlength="19" placeholder="XXXX-XXXX-XXXX-XXXX" />
                                        @error('n_tarjeta')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex justify-between mb-8">
                                    <div class="w-3/6 mr-2">
                                        <label for="email" class="block font-medium text-sm text-gray-700">E-mail</label>
                                        <input type="text" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('email', '') }}" />
                                        @error('email')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-2/6 ml-2 mr-2">
                                        <label for="telefono" class="block font-medium text-sm text-gray-700">Teléfono</label>
                                        <input type="text" name="telefono" id="telefono" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('telefono', '') }}" placeholder="(+34/0034) XXXXXXXXX" />
                                        @error('telefono')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/6 ml-2">
                                        <label for="anho_contable" class="block font-medium text-sm text-gray-700">Año contable</label>
                                        <input type="text" name="anho_contable" id="anho_contable" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('anho_contable', '') }}" />
                                        @error('anho_contable')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="font-medium text-sm text-gray-700">
                                    <fieldset>
                                        <legend class="mb-4">Ámbitos de trabajo:</legend>
                                        @foreach ($ambitos as $ambito )
                                            <label for='ambito[{{$ambito->id}}]'>{{ $ambito->nombre }}</label>
                                            <input type="checkbox" name='ambito[{{$ambito->id}}]' class="ml-2 mr-4">
                                        @endforeach
                                    </fieldset>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Añadir
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
