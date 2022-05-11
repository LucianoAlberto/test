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

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <h3 class="text-center font-bold uppercase w-full py-5 bg-gray-300">Editando cliente . . . </h3>
                <form method="post" action="{{ route('clientes.update', $cliente) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="mb-4">                             
                                <div class="flex justify-between mb-8">
                                    <div class="w-2/5 mr-2">
                                        <label for="nombre" class="block font-medium text-sm text-gray-700">Nombre</label>
                                        <input type="text" name="nombre" id="nombre" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('nombre', $cliente->nombre) }}" />
                                        @error('nombre')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-2/5 ml-2 mr-2">
                                        <label for="apellidos" class="block font-medium text-sm text-gray-700">Apellidos</label>
                                        <input type="text" name="apellidos" id="apellidos" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('apellidos', $cliente->apellidos) }}" />
                                        @error('apellidos')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/5 ml-2">
                                        <label for="dni" class="block font-medium text-sm text-gray-700">DNI</label>
                                        <input type="text" name="dni" id="dni" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('dni', $cliente->apellidos) }}" />
                                        @error('dni')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-between mb-8">
                                <div class="w-3/6 mr-2">
                                    <label for="direccion_fiscal" class="block font-medium text-sm text-gray-700">Dirección fiscal</label>
                                    <input type="text" name="direccion_fiscal" id="direccion_fiscal" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('direccion_fiscal', $cliente->direccion_fiscal) }}" />
                                    @error('direccion_fiscal')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-3/6 ml-2">
                                    <label for="domicilio" class="block font-medium text-sm text-gray-700">Domicilio</label>
                                    <input type="text" name="domicilio" id="domicilio" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('domicilio', $cliente->domicilio) }}" />
                                    @error('domicilio')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex justify-between mb-8">
                                <div class="w-2/5 mr-2">
                                    <label for="nombre_comercial" class="block font-medium text-sm text-gray-700">Nombre comercial</label>
                                    <input type="text" name="nombre_comercial" id="nombre_comercial" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('nombre_comercial', $cliente->nombre_comercial) }}" />
                                    @error('nombre_comercial')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-2/5 mr-2 ml-2">
                                    <label for="nombre_sociedad" class="block font-medium text-sm text-gray-700">Nombre sociedad</label>
                                    <input type="text" name="nombre_sociedad" id="nombre_sociedad" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('nombre_sociedad', $cliente->nombre_sociedad) }}" />
                                    @error('nombre_sociedad')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-1/5 ml-2">
                                    <label for="cif" class="block font-medium text-sm text-gray-700">CIF</label>
                                    <input type="text" name="cif" id="cif" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('cif', $cliente->cif) }}" />
                                    @error('cif')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex justify-between mb-8">
                                <div class="w-3/6 mr-2">
                                    <label for="cuenta_bancaria" class="block font-medium text-sm text-gray-700">Cuenta bancaria</label>
                                    <input type="text" name="cuenta_bancaria" id="cuenta_bancaria" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('cuenta_bancaria', $cliente->cuenta_bancaria) }}" onkeyup="mascaraIban()" maxlength="29"/>
                                    @error('cuenta_bancaria')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-3/6 ml-2">
                                    <label for="n_tarjeta" class="block font-medium text-sm text-gray-700">Número de tarjeta</label>
                                    <input type="text" name="n_tarjeta" id="n_tarjeta" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('n_tarjeta', $cliente->n_tarjeta) }}"  onkeyup="numero_tarjeta()" maxlength="19"/>
                                    @error('n_tarjeta')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex justify-between mb-8">
                                <div class="w-3/6 mr-2">
                                    <label for="email" class="block font-medium text-sm text-gray-700">E-mail</label>
                                    <input type="text" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('email', $cliente->email) }}" />
                                    @error('email')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-2/6 ml-2 mr-2">
                                    <label for="telefono" class="block font-medium text-sm text-gray-700">Teléfono</label>
                                    <input type="text" name="telefono" id="telefono" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('telefono',$cliente->telefono) }}" placeholder="(+34|0034) xxxxxxxxx" />
                                    @error('telefono')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-1/6 ml-2">
                                    <label for="anho_contable" class="block font-medium text-sm text-gray-700">Año</label>
                                    <input type="text" name="anho_contable" id="anho_contable" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('anho_contable',$cliente->anho_contable) }}" />
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
                                        <input type="checkbox" name='ambito[{{$ambito->id}}]' {{in_array($ambito->id, $cliente->ambitos->pluck('id')->toArray())?'checked':''}} class="ml-2 mr-4">
                                    @endforeach
                                </fieldset>
                            </div>
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Editar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
