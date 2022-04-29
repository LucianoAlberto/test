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
                                            value="{{ old('dni', '') }}" />
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
                                            value="{{ old('cuenta_bancaria', '') }}" />
                                        @error('cuenta_bancaria')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-3/6 ml-2">
                                        <label for="n_tarjeta" class="block font-medium text-sm text-gray-700">Número de tarjeta</label>
                                        <input type="text" name="n_tarjeta" id="n_tarjeta" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('n_tarjeta', '') }}" />
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
                                        <input type="number" name="telefono" id="telefono" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('telefono', '') }}" />
                                        @error('telefono')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/6 ml-2">
                                        <label for="anho_contable" class="block font-medium text-sm text-gray-700">Año contable</label>
                                        <input type="number" name="anho_contable" id="anho_contable" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('anho_contable', '') }}" />
                                        @error('anho_contable')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="referencia_contrato">Ámbito de trabajo</label>
                                    <select class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="referencia" name="referencia_contrato" required>
                                        <option value="">Seleciona un ámbito</option>
                                        <option value="0">Sin ámbito</option>
                                    @foreach ($ambitos as $ambito )
                                        <option value={{$ambito->nombre}}>{{$ambito->nombre}}</option>
                                    @endforeach
                                    </select>
                                    @error('referencia_contrato')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                            <div class="divContratos justify-between mb-16">
                                <div class="flex justify-center relative mt-8">
                                    <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-6 mb-2">
                                        Contratos
                                    </h2>

                                    <div class="flex absolute right-0 bottom-0">
                                        <x-boton2 tipo="div" nombre="Borrar" class="bg-green-600 hover:bg-green-700 w-16 mr-6" onclick="masContrato(event)">
                                            <x-slot name="boton">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                            </x-slot>
                                        </x-boton2>

                                        <x-boton2 tipo="div" nombre="Borrar" class="bg-red-600 hover:bg-red-700 w-16" onclick="menosContrato(event)">
                                            <x-slot name="boton">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                            </x-slot>
                                        </x-boton2>
                                    </div>
                                </div>



                                <div class="contenedorContratos">
                                    <h3 class="font-semibold text-xl text-gray-800 leading-tight mt-6 mb-2">
                                        Contrato 1
                                    </h3>

                                    <div class="flex justify-between mb-4">
                                        <div class="w-3/6 mr-2">
                                            <label for="contratos[0][concepto]" class="block font-medium text-sm text-gray-700">Concepto</label>
                                            <input type="text" name="contratos[0][concepto]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old("contratos[][concepto]", '') }}" />
                                            @error("contratos[concepto]")
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-3/6 ml-2">
                                            <label for="contratos[0][referencia]" class="block font-medium text-sm text-gray-700">Referencia</label>
                                            <input type="text" name="contratos[0][referencia]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old("contratos[][referencia]", '') }}" />
                                            @error('contratos[referencia]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex justify-between mb-4">
                                        <div class="w-1/4 mr-2">
                                            <label for="contratos[0][base_imponible]" class="block font-medium text-sm text-gray-700">Base imponible</label>
                                            <input type="number" name="contratos[0][base_imponible]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old("contratos[][base_imponible]", '') }}" />
                                            @error('contratos[base_imponible]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/4 ml-2 mr-2">
                                            <label for="contratos[0][iva]" class="block font-medium text-sm text-gray-700">IVA</label>
                                            <input type="number" name="contratos[0][iva]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old("contratos[][iva]", '') }}" />
                                            @error('contratos[iva]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/4 ml-2 mr-2">
                                            <label for="contratos[0][irpf]" class="block font-medium text-sm text-gray-700">IRPF</label>
                                            <input type="number" name="contratos[0][irpf]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old("contratos[][irpf]", '') }}" />
                                            @error('contratos[irpf]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/4 ml-2">
                                            <label for="contratos[0][total]" class="block font-medium text-sm text-gray-700">Total</label>
                                            <input type="number" name="contratos[0][total]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old("contratos[][total]", '') }}" />
                                            @error('contratos[total]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <label for="contratos[0][fecha]" class="block font-medium text-sm text-gray-700">Fecha firma</label>
                                        <input type="date" name="contratos[0][fecha]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("contratos[][fecha]", '') }}" />
                                        @error('contratos[fecha]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="contratos[0][archivo]" class="block font-medium text-sm text-gray-700">Adjuntar contrato</label>
                                        <input type="file" name="contratos[0][archivo]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("contratos[][archivo]", '') }}" />
                                        @error('contratos[archivo]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="contratos[0][presupuesto]" class="block font-medium text-sm text-gray-700">Adjuntar presupuesto</label>
                                        <input type="file" name="contratos[0][presupuesto]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("contratos[][presupuesto]", '') }}" />
                                        @error('contratos[presupuesto]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="divFacturas">
                                        <div class="flex justify-between contenedorTituloBotones">
                                            <h3 class="font-semibold text-xl text-gray-800 leading-tight mt-6 mb-2">
                                                Facturas del contrato 1
                                            </h3>

                                            <div class="flex justify-between">
                                                <x-boton2 tipo="div" nombre="mas" class="bg-green-600 hover:bg-green-700 w-16 mr-6" onclick="masFactura(event)">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                    </x-slot>
                                                </x-boton2>

                                                <x-boton2 tipo="div" nombre="menos" class="bg-red-600 hover:bg-red-700 w-16" onclick="menosFactura(event)">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                    </x-slot>
                                                </x-boton2>
                                            </div>
                                        </div>

                                        <div class="flex contenedorFacturas justify-between mb-4">
                                            <div class="w-5/12 divFechaFactura">
                                                <label for="contratos[0][facturas][fechas][0]" class="block font-medium text-sm text-gray-700">Fecha cargo recurrente</label>
                                                <input type="date" name="contratos[0][facturas][fechas][0]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                    value="{{ old("contratos[0][facturas][fechas][]", '') }}" />
                                                @error("contratos[0][facturas][fechas]")
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="w-5/12 divArchivoFactura">
                                                <label for="contratos[0][facturas][archivos][0]" class="block font-medium text-sm text-gray-700">Adjuntar facturas</label>
                                                <input type="file" name="contratos[0][facturas][archivos][0]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                    value="{{ old("contratos[0][facturas][archivos][]", '') }}" />
                                                @error('contratos[0][facturas][archivos]')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="divFacturasIndependientes" class="justify-between mb-16">
                                <div class="flex justify-center relative mt-8">
                                    <h3 class="font-semibold text-xl text-gray-800 leading-tight mt-6 mb-2">
                                        Facturas independientes
                                    </h3>

                                    <div class="flex absolute right-0 bottom-0">
                                        <x-boton2 tipo="div" nombre="mas" class="bg-green-600 hover:bg-green-700 w-16 mr-6" onclick="masFacturaIndependiente(event)">
                                            <x-slot name="boton">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                            </x-slot>
                                        </x-boton2>

                                        <x-boton2 tipo="div" nombre="menos" class="bg-red-600 hover:bg-red-700 w-16" onclick="menosFacturaIndependiente(event)">
                                            <x-slot name="boton">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                            </x-slot>
                                        </x-boton2>
                                    </div>
                                </div>

                                <div class="contenedorFacturasIndependientes flex justify-between mb-4">
                                    <div class="w-5/12">
                                        <label for="facturas[0][fecha]" class="block font-medium text-sm text-gray-700">Fecha cargo recurrente</label>
                                        <input type="date" name="facturas[0][fecha]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("facturas[][fecha]", '') }}" />
                                        @error("facturas[fecha]")
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-5/12">
                                        <label for="facturas[0][archivo]" class="block font-medium text-sm text-gray-700">Adjuntar facturas</label>
                                        <input type="file" name="facturas[0][archivo]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("facturas[][archivo]", '') }}" />
                                        @error('facturas[archivo]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div id="divPagosIndependientes" class="justify-between mb-16">
                                <div class="flex justify-center relative mt-8">
                                    <h3 class="font-semibold text-xl text-gray-800 leading-tight mt-6 mb-2">
                                        Pagos independientes
                                    </h3>

                                    <div class="flex absolute right-0 bottom-0">
                                        <x-boton2 tipo="div" nombre="mas" class="bg-green-600 hover:bg-green-700 w-16 mr-6" onclick="masPagoIndependiente(event)">
                                            <x-slot name="boton">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                            </x-slot>
                                        </x-boton2>

                                        <x-boton2 tipo="div" nombre="menos" class="bg-red-600 hover:bg-red-700 w-16" onclick="menosPagoIndependiente(event)">
                                            <x-slot name="boton">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                            </x-slot>
                                        </x-boton2>
                                    </div>
                                </div>

                                <div class="contenedorPagosIndependientes flex justify-between mb-4">
                                    <div class="w-5/12">
                                        <label for="pagos[0][abonado]" class="block font-medium text-sm text-gray-700">Abonado</label>
                                        <input type="text" name="pagos[0][abonado]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("pagos[][abonado]", '') }}" />
                                        @error("pagos[abonado]")
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-5/12">
                                        <label for="pagos[0][pendiente]" class="block font-medium text-sm text-gray-700">Pendiente</label>
                                        <input type="text" name="pagos[0][pendiente]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("pagos[][pendiente]", '') }}" />
                                        @error("pagos[pendiente]")
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-5/12">
                                        <label for="pagos[0][fecha]" class="block font-medium text-sm text-gray-700">Fecha</label>
                                        <input type="date" name="pagos[0][fecha]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("pagos[][fecha]", '') }}" />
                                        @error("pagos[fecha]")
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-5/12">
                                        <label for="pagos[0][referencia]" class="block font-medium text-sm text-gray-700">Referencia</label>
                                        <input type="text" name="pagos[0][referencia]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("pagos[][referencia]", '') }}" />
                                        @error('pagos[referencia]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div id="divProyectos" class="mt-8">
                                <div class="flex justify-center relative mt-8">
                                    <h3 class="font-semibold text-xl text-gray-800 leading-tight mt-6 mb-2">
                                        Proyectos
                                    </h3>

                                    <div class="flex absolute right-0 bottom-0">
                                        <x-boton2 tipo="div" nombre="mas" class="bg-green-600 hover:bg-green-700 w-16 mr-6" onclick="masProyecto(event)">
                                            <x-slot name="boton">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                            </x-slot>
                                        </x-boton2>

                                        <x-boton2 tipo="div" nombre="menos" class="bg-red-600 hover:bg-red-700 w-16" onclick="menosProyecto(event)">
                                            <x-slot name="boton">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                            </x-slot>
                                        </x-boton2>
                                    </div>
                                </div>

                                <div class="contenedorProyectos">
                                    <h3 class="font-semibold text-xl text-gray-800 leading-tight mt-6 mb-2">
                                        Proyecto 1
                                    </h3>
                                    <div class="flex">
                                        <div class="w-1/4 mr-2">
                                            <label for="proyectos[0][referencia]" class="block font-medium text-sm text-gray-700">Referencia</label>
                                            <input type="number" name="proyectos[0][referencia]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old("proyectos[][referencia]", '') }}" />
                                            @error('proyectos[referencia]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-3/4 ml-2">
                                            <label for="proyectos[0][concepto]" class="block font-medium text-sm text-gray-700">Concepto</label>
                                            <input type="text" name="proyectos[0][concepto]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old("proyectos[][concepto]", '') }}" />
                                            @error('proyectos[concepto]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex">
                                        <div class="w-1/4 mr-2">
                                            <label for="proyectos[0][usuario_dominio]" class="block font-medium text-sm text-gray-700">Usuario dominio</label>
                                            <input type="text" name="proyectos[0][usuario_dominio]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old("proyectos[][usuario_dominio]", '') }}" />
                                            @error('proyectos[usuario_dominio]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/4 mx-2">
                                            <label for="proyectos[0][dominio][contrasenha][]" class="block font-medium text-sm text-gray-700">Contraseña dominio</label>
                                            <input type="text" name="proyectos[dominio][contrasenha][]" id="proyectos[dominio][contrasenha][]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old("proyectos[dominio][contrasenha][]", '') }}" />
                                            @error('proyectos[dominio][contrasenha][]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/4 mx-2">
                                            <label for="proyectos[hosting][usuario][]" class="block font-medium text-sm text-gray-700">Usuario hosting</label>
                                            <input type="text" name="proyectos[hosting][usuario][]" id="proyectos[hosting][usuario][]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old("proyectos[hosting][usuario][]", '') }}" />
                                            @error('proyectos[hosting][usuario][]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                        </div>

                                        <div class="w-1/4 ml-2">
                                            <label for="proyectos[hosting][contrasenha][]" class="block font-medium text-sm text-gray-700">Contraseña hosting</label>
                                            <input type="text" name="proyectos[hosting][contrasenha][]" id="proyectos[hosting][contrasenha][]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old("proyectos[hosting][contrasenha][]", '') }}" />
                                            @error('proyectos[hosting][contrasenha][]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="w-1/4">
                                        <label for="proyectos[datos][]" class="block font-medium text-sm text-gray-700">Otros datos de interés</label>
                                        <input type="text" name="proyectos[datos][]" id="proyectos[datos][]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("proyectos[datos][]", '') }}" />
                                        @error('proyectos[datos][]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                    </div>

                                    <div>
                                        <label for="proyectos[sepa][]" class="block font-medium text-sm text-gray-700">Adjuntar SEPA</label>
                                        <input type="file" name="proyectos[sepa][]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("proyectos[sepa][]", '') }}" />
                                        @error('proyectos[sepa][]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="proyectos[preferencias][]" class="block font-medium text-sm text-gray-700">Adjuntar hoja de preferencias</label>
                                        <input type="file" name="proyectos[preferencias][]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("proyectos[preferencias][]", '') }}" />
                                        @error('proyectos[preferencias][]')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="divNombresDominio justify-between mb-4">
                                        <div class="flex justify-center relative">
                                            <h3 class="font-semibold text-xl text-gray-800 leading-tight mt-6 mb-2">
                                                Nombres de dominio
                                            </h3>

                                            <div class="flex absolute right-0 bottom-0">
                                                <x-boton2 tipo="div" nombre="mas" class="bg-green-600 hover:bg-green-700 w-16 mr-6" onclick="masNombreDominio(event)">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                    </x-slot>
                                                </x-boton2>

                                                <x-boton2 tipo="div" nombre="menos" class="bg-red-600 hover:bg-red-700 w-16" onclick="menosNombreDominio(event)">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                    </x-slot>
                                                </x-boton2>
                                            </div>
                                        </div>

                                        <div class="w-1/2 contenedorNombreDominio">
                                            <label for="proyectos[0][dominio][nombre][]" class="block font-medium text-sm text-gray-700">Nombre</label>
                                            <input type="text" name="proyectos[0][dominio][nombre][]" id="proyectos[0][dominio][nombre][]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old("proyectos[0][dominio][nombre][]", '') }}" />
                                            @error('proyectos[0][dominio][nombre][]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="divBasesDatos" class="justify-between mb-4">
                                        <div class="flex justify-center relative">
                                            <h3 class="font-semibold text-xl text-gray-800 leading-tight mt-6 mb-2">
                                                BBDD
                                            </h3>

                                            <div class="flex absolute right-0 bottom-0">
                                                <x-boton2 tipo="div" nombre="mas" class="bg-green-600 hover:bg-green-700 w-16 mr-6" onclick="masBasesDatos(event)">
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
                                        </div>

                                        <div class="contenedorBasesDatos flex">
                                            <div class="w-1/3 mr-2 divNombreBD">
                                                <label for="proyectos[0][bd][nombre][]" class="block font-medium text-sm text-gray-700">Nombre BD</label>
                                                <input type="text" name="proyectos[0][bd][nombre][]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                    value="{{ old("proyectos[0][bd][nombre][]", '') }}" />
                                                @error("proyectos[0][bd][nombre][]")
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="w-1/3 mx-2 divHostBD">
                                                <label for="proyectos[0][bd][host][]" class="block font-medium text-sm text-gray-700">HOST</label>
                                                <input type="text" name="proyectos[0][bd][host][]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                    value="{{ old("proyectos[0][bd][host][]", '') }}" />
                                                @error('proyectos[0][bd][host][]')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="w-1/3 ml-2 divContrasenhaBD">
                                                <label for="proyectos[0][bd][contrasenha][]" class="block font-medium text-sm text-gray-700">Contraseña</label>
                                                <input type="text" name="proyectos[0][bd][contrasenha][]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                    value="{{ old("proyectos[0][bd][contrasenha][]", '') }}" />
                                                @error('proyectos[0][bd][contrasenha][]')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="divEmails justify-between mb-4">
                                        <div class="flex justify-center relative">
                                            <h3 class="font-semibold text-xl text-gray-800 leading-tight mt-6 mb-2">
                                                Email corporativo
                                            </h3>

                                            <div class="flex absolute right-0 bottom-0">
                                                <x-boton2 tipo="div" nombre="mas" class="bg-green-600 hover:bg-green-700 w-16 mr-6" onclick="masEmail(event)">
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

                                        <div class="contenedorEmails flex">
                                            <div class="w-1/3 mr-2 divEmailEmail">
                                                <label for="proyectos[0][email][email][]" class="block font-medium text-sm text-gray-700">Email</label>
                                                <input type="email" name="proyectos[0][email][email][]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                    value="{{ old("proyectos[0][email][email][]", '') }}" />
                                                @error("proyectos[0][email][email][]")
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="w-1/3 mx-2 divContrasenhaEmail">
                                                <label for="proyectos[0][email][contrasenha][]" class="block font-medium text-sm text-gray-700">Contraseña</label>
                                                <input type="text" name="proyectos[0][email][contrasenha][]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                    value="{{ old("proyectos[0][email][contrasenha][]", '') }}" />
                                                @error('proyectos[0][email][contrasenha][]')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="w-1/3 ml-2 divRutaEmail">
                                                <label for="proyectos[0][email][ruta][]" class="block font-medium text-sm text-gray-700">Ruta acceso</label>
                                                <input type="text" name="proyectos[0][email][ruta][]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                    value="{{ old("proyectos[0][email][ruta][]", '') }}" />
                                                @error('proyectos[0][email][ruta][]')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="divAccesos justify-between mb-4">
                                        <div class="flex justify-center relative">
                                            <h3 class="font-semibold text-xl text-gray-800 leading-tight mt-6 mb-2">
                                                Accesos
                                            </h3>

                                            <div class="flex absolute right-0 bottom-0">
                                                <x-boton2 tipo="div" nombre="mas" class="bg-green-600 hover:bg-green-700 w-16 mr-6" onclick="masAcceso(event)">
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

                                        <div class="contenedorAccesos flex">
                                            <div class="w-1/3 mr-2 divDominioAcceso">
                                                <label for="proyectos[0][acceso][dominio][]" class="block font-medium text-sm text-gray-700">Dominio</label>
                                                <input type="text" name="proyectos[0][acceso][dominio][]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                    value="{{ old("proyectos[0][acceso][dominio][]", '') }}" />
                                                @error("proyectos[0][acceso][dominio][]")
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="w-1/3 mx-2 divUsuarioAcceso">
                                                <label for="proyectos[0][acceso][usuario][]" class="block font-medium text-sm text-gray-700">Usuario</label>
                                                <input type="text" name="proyectos[0][acceso][usuario][]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                    value="{{ old("proyectos[0][acceso][usuario][]", '') }}" />
                                                @error('proyectos[0][acceso][usuario][]')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="w-1/3 ml-2 divContrasenhaAcceso">
                                                <label for="proyectos[0][acceso][contrasenha][]" class="block font-medium text-sm text-gray-700">Contraseña</label>
                                                <input type="text" name="proyectos[0][acceso][contrasenha][]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                    value="{{ old("proyectos[0][acceso][contrasenha][]", '') }}" />
                                                @error('proyectos[0][acceso][contrasenha][]')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
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
