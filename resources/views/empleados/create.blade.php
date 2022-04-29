<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Añadir empleado
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form id="formulario" method="post" action="{{ route('empleados.store') }}" enctype="multipart/form-data">
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

                                    <div class="w-2/5 mr-2">
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
                                        <label for="numero_ss" class="block font-medium text-sm text-gray-700">Número de la Seguridad Social</label>
                                        <input type="text" name="numero_ss" id="numero_ss" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('numero_ss', '') }}" />
                                        @error('numero_ss')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-3/6 ml-2">
                                        <label for="fecha_comienzo" class="block font-medium text-sm text-gray-700">Fecha comienzo</label>
                                        <input type="date" name="fecha_comienzo" id="fecha_comienzo" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('fecha_comienzo', '') }}" />
                                        @error('fecha_comienzo')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex justify-between mb-4">
                                    <div class="w-2/5 mr-2">
                                        <label for="fecha_fin" class="block font-medium text-sm text-gray-700">Fecha fin</label>
                                        <input type="date" name="fecha_fin" id="fecha_fin" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('fecha_fin', '') }}" />
                                        @error('fecha_fin')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="ambito">Ámbito de trabajo</label>
                                    <select class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="ambito" required>
                                        <option value="">Seleciona un ámbito</option>
                                        <option value="0">Sin ámbito</option>
                                    @foreach ($ambitos as $ambito )
                                        <option value={{$ambito->nombre}}>{{$ambito->nombre}}</option>
                                    @endforeach
                                    </select>
                                    @error('ambito')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="flex justify-between mb-4">
                                    <div class="">
                                        <label for="practicas" class="block font-medium text-sm text-gray-700">Prácticas</label>
                                        <input type="checkbox" name="practicas" id="practicas" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('practicas', '') }}" />
                                        @error('practicas')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="w-3/6 mr-2">
                                    <label for="instituto" class="block font-medium text-sm text-gray-700">Instituto</label>
                                    <input type="text" name="instituto" id="instituto" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('instituto', '') }}" />
                                    @error('instituto')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-3/6 mr-2">
                                    <label for="localidad" class="block font-medium text-sm text-gray-700">Localidad</label>
                                    <input type="text" name="localidad" id="localidad" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('localidad', '') }}" />
                                    @error('localidad')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-3/6 mr-2">
                                    <label for="provincia" class="block font-medium text-sm text-gray-700">Provincia</label>
                                    <input type="text" name="provincia" id="provincia" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('provincia', '') }}" />
                                    @error('provincia')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-3/6 mr-2">
                                    <label for="tutor_practicas" class="block font-medium text-sm text-gray-700">Tutor de prácticas</label>
                                    <input type="text" name="tutor_practicas" id="tutor_practicas" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('tutor_practicas', '') }}" />
                                    @error('tutor_practicas')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-3/6 mr-2">
                                    <label for="fecha_inicio_practicas" class="block font-medium text-sm text-gray-700">Fecha inicio</label>
                                    <input type="date" name="fecha_inicio_practicas" id="fecha_inicio_practicas" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('fecha_inicio_practicas', '') }}" />
                                    @error('fecha_inicio_practicas')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-3/6 mr-2">
                                    <label for="fecha_fin_practicas" class="block font-medium text-sm text-gray-700">Fecha fin</label>
                                    <input type="date" name="fecha_fin_practicas" id="fecha_fin_practicas" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('fecha_fin_practicas', '') }}" />
                                    @error('fecha_fin_practicas')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-3/6 mr-2">
                                    <label for="convenio_practicas" class="block font-medium text-sm text-gray-700">Adjuntar convenio</label>
                                    <input type="file" name="convenio_practicas" id="convenio_practicas" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('convenio_practicas', '') }}" />
                                    @error('convenio_practicas')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-3/6 mr-2">
                                    <label for="doc_confidencialidad_practicas" class="block font-medium text-sm text-gray-700">Adjuntar documento de confidencialidad</label>
                                    <input type="file" name="doc_confidencialidad_practicas" id="doc_confidencialidad_practicas" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('doc_confidencialidad_practicas', '') }}" />
                                    @error('doc_confidencialidad_practicas')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="divFaltasPracticas">
                                    <div class="flex justify-between contenedorTituloBotones">
                                        <h3 class="font-semibold text-xl text-gray-800 leading-tight mt-6 mb-2">
                                            Faltas de asistencia
                                        </h3>
                                        <div class="flex justify-between">
                                            <x-boton2 tipo="div" nombre="mas" class="bg-green-600 hover:bg-green-700 w-16 mr-6" onclick="masFaltasPracticas(event)">
                                                <x-slot name="boton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                </x-slot>
                                            </x-boton2>

                                            <x-boton2 tipo="div" nombre="menos" class="bg-red-600 hover:bg-red-700 w-16" onclick="menosFaltasPracticas(event)">
                                                <x-slot name="boton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                </x-slot>
                                            </x-boton2>
                                        </div>
                                    </div>

                                    <div class="contenedorFaltasPracticas">
                                        <div class="divFechaFaltaPracticas">
                                            <label for="faltas_practicas[0][fecha_falta]" class="block font-medium text-sm text-gray-700">Fecha</label>
                                            <input type="date" name="faltas_practicas[0][fecha_falta]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old("faltas_practicas[0][fecha_falta]", '') }}" />
                                            @error('faltas_practicas[0][fecha_falta]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="divJustificacionFaltaPracticas">
                                            <label for="faltas_practicas[0][justificacion]" class="block font-medium text-sm text-gray-700">Justificacion</label>
                                            <input type="text" name="faltas_practicas[0][justificacion]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old("faltas_practicas[0][justificacion]", '') }}" />
                                            @error('faltas_practicas[0][justificacion]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="divNotaFaltaPracticas">
                                            <label for="faltas_practicas[0][notas]" class="block font-medium text-sm text-gray-700">Notas</label>
                                            <input type="text" name="faltas_practicas[0][notas]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old("faltas_practicas[0][notas]", '') }}" />
                                            @error('faltas_practicas[0][notas]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                    <div>
                                        <label for="contrato" class="block font-medium text-sm text-gray-700">Adjuntar contrato</label>
                                        <input type="file" name="contrato" id="contrato" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("contrato", '') }}" />
                                        @error('contrato')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="doc_confidencialidad" class="block font-medium text-sm text-gray-700">Adjuntar documento de confidencialidad</label>
                                        <input type="file" name="doc_confidencialidad" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("doc_confidencialidad", '') }}" />
                                        @error('doc_confidencialidad')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="doc_normas" class="block font-medium text-sm text-gray-700">Adjuntar documento de normas</label>
                                        <input type="file" name="doc_normas" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("doc_normas", '') }}" />
                                        @error('doc_normas')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="doc_prevencion_riesgos" class="block font-medium text-sm text-gray-700">Adjuntar documento de Prevención de Riesgos Laborales</label>
                                        <input type="file" name="doc_prevencion_riesgos" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("doc_prevencion_riesgos", '') }}" />
                                        @error('doc_prevencion_riesgos')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="doc_reglamento_interno" class="block font-medium text-sm text-gray-700">Adjuntar documento de Reglamento Interno</label>
                                        <input type="file" name="doc_reglamento_interno" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("doc_reglamento_interno", '') }}" />
                                        @error('doc_reglamento_interno')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="divPagos">
                                        <div class="flex justify-between contenedorTituloBotones">
                                            <h3 class="font-semibold text-xl text-gray-800 leading-tight mt-6 mb-2">
                                                Pagos
                                            </h3>

                                            <div class="flex justify-between">
                                                <x-boton2 tipo="div" nombre="mas" class="bg-green-600 hover:bg-green-700 w-16 mr-6" onclick="masPago(event)">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                    </x-slot>
                                                </x-boton2>

                                                <x-boton2 tipo="div" nombre="menos" class="bg-red-600 hover:bg-red-700 w-16" onclick="menosPago(event)">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                    </x-slot>
                                                </x-boton2>
                                            </div>
                                        </div>


                                        <div class="contenedorNominas justify-between mb-4">
                                            <div class="flex">
                                                <div class="w-4/12 divFechaInicioNomina">
                                                    <label for="nominas[0][fecha_inicio]" class="block font-medium text-sm text-gray-700">Fecha inicio</label>
                                                    <input type="date" name="nominas[0][fecha_inicio]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                        value="{{ old("nominas[0][fecha_inicio]", '') }}" />
                                                    @error("nominas[0][fecha_inicio]")
                                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="w-4/12 divFechaFinNomina">
                                                    <label for="nominas[0][fecha_fin]" class="block font-medium text-sm text-gray-700">Fecha fin</label>
                                                    <input type="date" name="nominas[0][fecha_fin]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                        value="{{ old("nominas[0][fecha_fin]", '') }}" />
                                                    @error("nominas[0][fecha_fin]")
                                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="w-4/12 divFechaPagoNomina">
                                                    <label for="nominas[0][fecha_pago]" class="block font-medium text-sm text-gray-700">Fecha de pago</label>
                                                    <input type="date" name="nominas[0][fecha_pago]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                        value="{{ old("nominas[0][fecha_pago]", '') }}" />
                                                    @error('nominas[0][fecha_pago]')
                                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="flex">
                                                <div class="w-4/12 divHorasNomina">
                                                    <label for="nominas[0][horas_alta_ss]" class="block font-medium text-sm text-gray-700">Horas de alta en la SS</label>
                                                    <input type="text" name="nominas[0][horas_alta_ss]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                        value="{{ old("nominas[0][horas_alta_ss]", '') }}" />
                                                    @error('nominas[0][horas_alta_ss]')
                                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="w-4/12 divImporteTotalNomina">
                                                    <label for="nominas[0][importe_total]" class="block font-medium text-sm text-gray-700">Importe nómina</label>
                                                    <input type="text" name="nominas[0][importe_total]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                        value="{{ old("nominas[0][importe_total]", '') }}" />
                                                    @error('nominas[0][importe_total]')
                                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="w-4/12 divImportePagadoNomina">
                                                    <label for="nominas[0][importe_pagado]" class="block font-medium text-sm text-gray-700">Importe pagado</label>
                                                    <input type="text" name="nominas[0][importe_pagado]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                        value="{{ old("nominas[0][importe_pagado]", '') }}" />
                                                    @error('nominas[0][importe_pagado]')
                                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="divFaltas">
                                        <div class="flex justify-between contenedorTituloBotones">
                                            <h3 class="font-semibold text-xl text-gray-800 leading-tight mt-6 mb-2">
                                                Faltas de asistencia
                                            </h3>
                                            <div class="flex justify-between">
                                                <x-boton2 tipo="div" nombre="mas" class="bg-green-600 hover:bg-green-700 w-16 mr-6" onclick="masFalta(event)">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                    </x-slot>
                                                </x-boton2>

                                                <x-boton2 tipo="div" nombre="menos" class="bg-red-600 hover:bg-red-700 w-16" onclick="menosFalta(event)">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                    </x-slot>
                                                </x-boton2>
                                            </div>
                                        </div>

                                        <div class="contenedorFaltas">
                                            <div class="divFechaFalta">
                                                <label for="faltas[0][fecha_falta]" class="block font-medium text-sm text-gray-700">Fecha</label>
                                                <input type="date" name="faltas[0][fecha_falta]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                    value="{{ old("faltas[0][fecha_falta]", '') }}" />
                                                @error('faltas[0][fecha_falta]')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="divJustificacionFalta">
                                                <label for="faltas[0][justificacion]" class="block font-medium text-sm text-gray-700">Justificacion</label>
                                                <input type="text" name="faltas[0][justificacion]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                    value="{{ old("faltas[0][justificacion]", '') }}" />
                                                @error('faltas[0][justificacion]')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="divNotaFalta">
                                                <label for="faltas[0][notas]" class="block font-medium text-sm text-gray-700">Notas</label>
                                                <input type="text" name="faltas[0][notas]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                    value="{{ old("faltas[0][notas]", '') }}" />
                                                @error('faltas[0][notas]')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="divVacaciones">
                                        <div class="flex justify-between contenedorTituloBotones">
                                            <h3 class="font-semibold text-xl text-gray-800 leading-tight mt-6 mb-2">
                                                Vacaciones
                                            </h3>

                                        </div>
                                        <div>
                                            <label for="vacaciones_total" class="block font-medium text-sm text-gray-700">Total días de vacaciones acumuladas</label>
                                            <input type="text" name="vacaciones_total" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old("vacaciones_total", '') }}" />
                                            @error('vacaciones_total')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <h3 class="font-semibold text-xl text-gray-800 leading-tight mt-6 mb-2">
                                            Vacaciones disfrutadas
                                        </h3>
                                        <div class="flex justify-between">
                                            <x-boton2 tipo="div" nombre="mas" class="bg-green-600 hover:bg-green-700 w-16 mr-6" onclick="masVacacion(event)">
                                                <x-slot name="boton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                </x-slot>
                                            </x-boton2>

                                            <x-boton2 tipo="div" nombre="menos" class="bg-red-600 hover:bg-red-700 w-16" onclick="menosVacacion(event)">
                                                <x-slot name="boton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                </x-slot>
                                            </x-boton2>
                                        </div>

                                        <div class="contenedorVacaciones">
                                            <div class="divInicioVacaciones">
                                                <label for="vacaciones_disfrutadas[0][fecha_inicio]" class="block font-medium text-sm text-gray-700">Fecha inicio vacaciones</label>
                                                <input type="date" name="vacaciones_disfrutadas[0][fecha_inicio]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                    value="{{ old("vacaciones_disfrutadas[0][fecha_inicio]", '') }}" />
                                                @error('vacaciones_disfrutadas[0][fecha_inicio]')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="divFinVacaciones">
                                                <label for="vacaciones_disfrutadas[0][fecha_fin]" class="block font-medium text-sm text-gray-700">Fecha fin vacaciones</label>
                                                <input type="date" name="vacaciones_disfrutadas[0][fecha_fin]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                    value="{{ old("vacaciones_disfrutadas[0][fecha_fin]", '') }}" />
                                                @error('vacaciones_disfrutadas[0][fecha_fin]')
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
