<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Añadir cliente
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form id="formulario" method="post" action="{{ route('clientes.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="shadow overflow-hidden sm:rounded-md ">
                        <div class="px-4 py-5 bg-white sm:p-6 divide-y-4">
                            <div class="divDatosPersonales mb-16">
                                <h3 class="flex justify-center font-semibold text-xl text-gray-800 leading-tight mb-2">
                                    Datos personales
                                </h3>
                                <div class="flex justify-between mb-4">
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

                                <div class="flex justify-between mb-4">
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

                                <div class="flex justify-between mb-4">
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

                                <div class="flex justify-between mb-4">
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

                                <div class="flex justify-between mb-4">
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
                                            value="{{ old('telefono', '') }}" placeholder="(+34|0034) xxxxxxxxx" />
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

                                <div class="mb-3">
                                    <fieldset>
                                        <legend>Ámbitos de trabajo:</legend>
                                        @foreach ($ambitos as $ambito )
                                            <label for='ambito[{{$ambito->id}}]'>{{ $ambito->nombre }}</label>
                                            <input type="checkbox" name='ambito[{{$ambito->id}}]'>
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
