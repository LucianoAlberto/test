<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nueva Nómina : <a class="text-red-500 uppercase underline"
                href="{{ route('empleados.show', $empleado) }}"> {{ $empleado->nombre }} {{ $empleado->apellidos }}</a>
        </h2>
    </x-slot>


    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2" id="contenedorPrincipal">
                <form method="post" action="{{ route('nominas.store', $empleado) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="contenedorNominas justify-between mb-4">
                                <div class="flex">
                                    <div class="w-1/4 divFechaInicioNomina">
                                        <label for="fecha_inicio" class="block font-medium text-sm text-gray-700">Fecha inicio</label>
                                        <input type="date" name="fecha_inicio" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("fecha_inicio", '') }}" />
                                        @error("fecha_inicio")
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/4 divFechaFinNomina">
                                        <label for="fecha_fin" class="block font-medium text-sm text-gray-700">Fecha fin</label>
                                        <input type="date" name="fecha_fin" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("fecha_fin", '') }}" />
                                        @error("fecha_fin")
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/4 divFechaPagoNomina">
                                        <label for="fecha_pago" class="block font-medium text-sm text-gray-700">Fecha de pago</label>
                                        <input type="date" name="fecha_pago" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("fecha_pago", '') }}" />
                                        @error('fecha_pago')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="w-4/12 divHorasNomina">
                                        <label for="horas_alta_ss" class="block font-medium text-sm text-gray-700">Horas de alta en la SS</label>
                                        <input type="text" name="horas_alta_ss" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("horas_alta_ss", '') }}" />
                                        @error('horas_alta_ss')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-4/12 divImporteTotalNomina">
                                        <label for="importe_total" class="block font-medium text-sm text-gray-700">Importe nómina</label>
                                        <input type="text" name="importe_total" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("importe_total", '') }}" />
                                        @error('importe_total')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-4/12 divImportePagadoNomina">
                                        <label for="importe_pagado" class="block font-medium text-sm text-gray-700">Importe pagado</label>
                                        <input type="text" name="importe_pagado" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("importe_pagado", '') }}" />
                                        @error('importe_pagado')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                        Añadir
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
