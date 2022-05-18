<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Añadir empleado
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            {{-- Formulario para un Nuevo ambito --}}
            <div class="w-1/2 max-w-xs  m-auto mt-5 mb-5 bg-gray-300 border-2" id='nuevoAmbito' hidden>

                <div class="flex justify-end mb-5">
                    <x-boton2 tipo="div" class="bg-red-600 hover:bg-red-700 w-6 h-6 " onclick="closenuevoAmbito()">
                        <x-slot name="boton">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </x-slot>
                    </x-boton2>
                </div>

                <form class="bg-gray-300  rounded mb-4" action="{{ route('ambitos.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="flex justify-between mx-5 place-content-center py-2">
                        <input
                            class="shadow appearance-none border border-black rounded py-2 mx-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-3/4"
                            type="text" name="nuevoAmbito" placeholder="Crear nuevo ambito" required>

                        <x-boton2 tipo="input" nombre="Borrar" class="bg-green-600 hover:bg-green-700 w-12">
                            <x-slot name="boton">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </x-slot>
                        </x-boton2>
                        @error('nuevoAmbito')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </form>

                {{-- Eliminar ambito --}}
                <form class="bg-gray-300  rounded  mb-4" action="{{ route('ambitos.destroy') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <div class=" flex justify-between mx-5 place-content-center py-2">

                        <select name="eliminarAmbito" id="eliminarAmbito"
                            class="form-input rounded-md shadow-sm mt-1 block w-3/4 mx-auto">
                            <option value="">Selecciona ámbito</option>
                            @foreach ($ambitos as $ambito)
                                <option value="{{ $ambito->id }}"
                                    {{ old('ambito') == $ambito->id ? 'selected' : '' }}>
                                    {{ $ambito->nombre }}
                                </option>
                            @endforeach
                        </select>
                        <x-boton2 tipo="input" nombre="Borrar" class="bg-red-600 hover:bg-red-700 w-12 ">
                            <x-slot name="boton">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-trash-2">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path
                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                    </path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                            </x-slot>
                        </x-boton2>

                        @error('eliminarAmbito')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </form>
                <hr>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">

                <form id="formulario" method="post" action="{{ route('empleados.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md ">
                        <div class="px-4 py-5 bg-white sm:p-6 divide-y-4">
                            <div class="divDatosPersonales mb-8">
                                <h3 class="flex justify-center font-semibold text-xl text-gray-800 leading-tight mb-2">
                                    Datos personales
                                </h3>
                                <div class="flex justify-between mb-4">
                                    <div class="w-1/2 mr-2">
                                        <label for="nombre" class="block font-medium text-sm text-gray-700">Nombre</label>
                                        <input type="text" name="nombre" id="nombre" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('nombre', '') }}" />
                                        @error('nombre')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/2 ml-2">
                                        <label for="apellidos" class="block font-medium text-sm text-gray-700">Apellidos</label>
                                        <input type="text" name="apellidos" id="apellidos" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('apellidos', '') }}" />
                                        @error('apellidos')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex justify-between mb-4">
                                    <div class="w-1/2 mr-2">
                                        <label for="dni" class="block font-medium text-sm text-gray-700">DNI</label>
                                        <input type="text" name="dni" class="form-input rounded-md shadow-sm mt-1 block w-full" maxlength="9"
                                            value="{{ old('dni', '') }}" />
                                        @error('dni')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/2 ml-2">
                                        <label for="numero_ss" class="block font-medium text-sm text-gray-700">Número de la Seguridad Social</label>
                                        <input type="text" name="numero_ss" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('numero_ss', '') }}" />
                                        @error('numero_ss')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex justify-between mb-4">
                                    <div class="w-1/2 mr-2">
                                        <label for="fecha_comienzo" class="block font-medium text-sm text-gray-700">Fecha comienzo</label>
                                        <input type="date" name="fecha_comienzo" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('fecha_comienzo', '') }}" />
                                        @error('fecha_comienzo')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/2 ml-2">
                                        <label for="fecha_fin" class="block font-medium text-sm text-gray-700">Fecha fin</label>
                                        <input type="date" name="fecha_fin" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('fecha_fin', '') }}" />
                                        @error('fecha_fin')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-8">
                                    <fieldset>
                                        <legend>Ámbitos de trabajo:</legend>
                                        <x-boton2 tipo="div" class="ml-1 bg-gray-800 hover:bg-gray-700 hover:scale-125  w-6 h-6 fill-none " onclick="nuevoAmbito()">
                                            <x-slot name="boton">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-slash-minus" viewBox="0 0 16 16">
                                                    <path d="m1.854 14.854 13-13a.5.5 0 0 0-.708-.708l-13 13a.5.5 0 0 0 .708.708ZM4 1a.5.5 0 0 1 .5.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2A.5.5 0 0 1 4 1Zm5 11a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5A.5.5 0 0 1 9 12Z"/>
                                                  </svg>
                                            </x-slot>
                                        </x-boton2>
                                        @foreach ($ambitos as $ambito )
                                            <label for='ambito[{{$ambito->id}}]'>{{ $ambito->nombre }}</label>
                                            <input type="checkbox" name='ambito[{{$ambito->id}}]' class="mr-4">
                                        @endforeach
                                    </fieldset>
                                </div>
                                <hr>
                                <div class="flex justify-between mt-8 mb-8">
                                    <div class="">
                                        <label for="practicas" class="block font-medium text-sm text-gray-700">Prácticas</label>
                                        <input type="checkbox" name="practicas" class="form-input rounded-md shadow-sm mt-1 block w-full h-10"
                                            value="{{ old('practicas', '') }}" onChange="mostrarPracticas(event)" />
                                        @error('practicas')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div id="divPracticas" class="hidden">
                                <div class="flex mb-4">
                                    <div class="w-1/2 mr-2">
                                        <label for="instituto" class="block font-medium text-sm text-gray-700">Instituto</label>
                                        <input type="text" name="instituto" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('instituto', '') }}" />
                                        @error('instituto')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/2 mx-2">
                                        <label for="localidad" class="block font-medium text-sm text-gray-700">Localidad</label>
                                        <input type="text" name="localidad" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('localidad', '') }}" />
                                        @error('localidad')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/2 ml-2">
                                        <label for="provincia" class="block font-medium text-sm text-gray-700">Provincia</label>
                                        <input type="text" name="provincia" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('provincia', '') }}" />
                                        @error('provincia')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex mb-8">
                                    <div class="w-1/2 mr-2">
                                        <label for="tutor_practicas" class="block font-medium text-sm text-gray-700">Tutor de prácticas</label>
                                        <input type="text" name="tutor_practicas" id="tutor_practicas" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('tutor_practicas', '') }}" />
                                        @error('tutor_practicas')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/2 mx-2">
                                        <label for="fecha_inicio_practicas" class="block font-medium text-sm text-gray-700">Fecha inicio</label>
                                        <input type="date" name="fecha_inicio_practicas" id="fecha_inicio_practicas" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('fecha_inicio_practicas', '') }}" />
                                        @error('fecha_inicio_practicas')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/2 ml-2">
                                        <label for="fecha_fin_practicas" class="block font-medium text-sm text-gray-700">Fecha fin</label>
                                        <input type="date" name="fecha_fin_practicas" id="fecha_fin_practicas" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('fecha_fin_practicas', '') }}" />
                                        @error('fecha_fin_practicas')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex mb-8">
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
                                </div>

                                <div class="divFaltasPracticas mt-8 mb-8">
                                    <div class="flex justify-center relative contenedorTituloBotones">
                                        <h3 class="font-semibold text-xl text-gray-800 leading-tight mt-6 mb-2">
                                            Faltas de asistencia
                                        </h3>
                                        <div class="flex justify-between absolute right-0">
                                            <x-boton2 tipo="div" nombre="mas" class="bg-green-600 hover:bg-green-700 w-12 h-12 mr-6" onclick="masFaltasPracticas(event)">
                                                <x-slot name="boton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                </x-slot>
                                            </x-boton2>

                                            <x-boton2 tipo="div" nombre="menos" class="bg-red-600 hover:bg-red-700 w-12 -h-12" onclick="menosFaltasPracticas(event)">
                                                <x-slot name="boton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                </x-slot>
                                            </x-boton2>
                                        </div>
                                    </div>

                                    <div class="contenedorFaltas">
                                        <div class="divFechaFaltaPracticas w-1/3 mb-4">
                                            <label for="faltas_practicas[0][fecha_falta]" class="block font-medium text-sm text-gray-700">Fecha</label>
                                            <input type="date" name="faltas_practicas[0][fecha_falta]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old("faltas_practicas[0][fecha_falta]", '') }}" />
                                            @error('faltas_practicas[0][fecha_falta]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="divJustificacionFaltaPracticas mb-4">
                                            <label for="faltas_practicas[0][justificacion]" class="block font-medium text-sm text-gray-700">Justificacion</label>
                                            <textarea type="text" name="faltas_practicas[0][justificacion]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old("faltas_practicas[0][justificacion]", '') }}" ></textarea>
                                            @error('faltas_practicas[0][justificacion]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="divNotaFaltaPracticas mb-4">
                                            <label for="faltas_practicas[0][notas]" class="block font-medium text-sm text-gray-700">Notas</label>
                                            <textarea type="text" name="faltas_practicas[0][notas]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old("faltas_practicas[0][notas]", '') }}" ></textarea>
                                            @error('faltas_practicas[0][notas]')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                                <div class="flex mt-8 mb-4">
                                    <div class="w-1/2 mr-2">
                                        <label for="contrato" class="block font-medium text-sm text-gray-700">Adjuntar contrato</label>
                                        <input type="file" name="contrato" id="contrato" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("contrato", '') }}" />
                                        @error('contrato')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/2 ml-2">
                                        <label for="doc_confidencialidad" class="block font-medium text-sm text-gray-700">Adjuntar documento de confidencialidad</label>
                                        <input type="file" name="doc_confidencialidad" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("doc_confidencialidad", '') }}" />
                                        @error('doc_confidencialidad')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex mb-4">
                                    <div class="w-1/2 mr-2">
                                        <label for="doc_normas" class="block font-medium text-sm text-gray-700">Adjuntar documento de normas</label>
                                        <input type="file" name="doc_normas" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("doc_normas", '') }}" />
                                        @error('doc_normas')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/2 ml-2">
                                        <label for="doc_prevencion_riesgos" class="block font-medium text-sm text-gray-700">Adjuntar documento de Prevención de Riesgos Laborales</label>
                                        <input type="file" name="doc_prevencion_riesgos" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("doc_prevencion_riesgos", '') }}" />
                                        @error('doc_prevencion_riesgos')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="w-1/2 mb-8">
                                    <label for="doc_reglamento_interno" class="block font-medium text-sm text-gray-700">Adjuntar documento de Reglamento Interno</label>
                                    <input type="file" name="doc_reglamento_interno" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old("doc_reglamento_interno", '') }}" />
                                    @error('doc_reglamento_interno')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <hr>

                                    <div class="divFaltas mt-8 mb-8">
                                        <div class="flex justify-center contenedorTituloBotones relative">
                                            <h3 class="font-semibold text-xl text-gray-800 leading-tight mt-2 mb-2">
                                                Faltas de asistencia
                                            </h3>
                                            <div class="flex justify-between absolute right-0">
                                                <x-boton2 tipo="div" nombre="mas" class="bg-green-600 hover:bg-green-700 w-12 h-12 mr-6" onclick="masFalta(event)">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                    </x-slot>
                                                </x-boton2>

                                                <x-boton2 tipo="div" nombre="menos" class="bg-red-600 hover:bg-red-700 w-12 h-12" onclick="menosFalta(event)">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                    </x-slot>
                                                </x-boton2>
                                            </div>
                                        </div>

                                        <div class="contenedorFaltas">
                                            <div class="divFechaFalta w-1/3 mb-4">
                                                <label for="faltas[0][fecha_falta]" class="block font-medium text-sm text-gray-700">Fecha</label>
                                                <input type="date" name="faltas[0][fecha_falta]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                    value="{{ old("faltas[0][fecha_falta]", '') }}" />
                                                @error('faltas[0][fecha_falta]')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="divJustificacionFalta mb-4">
                                                <label for="faltas[0][justificacion]" class="block font-medium text-sm text-gray-700">Justificacion</label>
                                                <textarea type="text" name="faltas[0][justificacion]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                    value="{{ old("faltas[0][justificacion]", '') }}" ></textarea>
                                                @error('faltas[0][justificacion]')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="divNotaFalta mb-4">
                                                <label for="faltas[0][notas]" class="block font-medium text-sm text-gray-700">Notas</label>
                                                <textarea type="text" name="faltas[0][notas]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                    value="{{ old("faltas[0][notas]", '') }}" ></textarea>
                                                @error('faltas[0][notas]')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="divVacaciones">
                                        <div class="flex justify-center">
                                            <h3 class="font-semibold text-xl text-gray-800 leading-tight mt-6 mb-4">
                                                Vacaciones
                                            </h3>
                                        </div>
                                        <div class="mb-4 w-1/3">
                                            <label for="vacaciones_total" class="block font-medium text-sm text-gray-700">Total días de vacaciones acumuladas</label>
                                            <input type="text" name="vacaciones_total" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old("vacaciones_total", '') }}" />
                                            @error('vacaciones_total')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="flex relative justify-center items-center">
                                            <h3 class="font-semibold text-xl text-gray-800 leading-tight mt-2 mb-8">
                                                Vacaciones disfrutadas
                                            </h3>
                                            <div class="flex justify-between absolute right-0">
                                                <x-boton2 tipo="div" nombre="mas" class="bg-green-600 hover:bg-green-700 w-12 h-12 mr-6" onclick="masVacacion(event)">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                    </x-slot>
                                                </x-boton2>

                                                <x-boton2 tipo="div" nombre="menos" class="bg-red-600 hover:bg-red-700 w-12 h-12" onclick="menosVacacion(event)">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                    </x-slot>
                                                </x-boton2>
                                            </div>
                                        </div>

                                        <div class="contenedorVacaciones flex mb-4">
                                            <div class="divInicioVacaciones w-1/3">
                                                <label for="vacaciones_disfrutadas[0][fecha_inicio]" class="block font-medium text-sm text-gray-700">Fecha inicio vacaciones</label>
                                                <input type="date" name="vacaciones_disfrutadas[0][fecha_inicio]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                    value="{{ old("vacaciones_disfrutadas[0][fecha_inicio]", '') }}" />
                                                @error('vacaciones_disfrutadas[0][fecha_inicio]')
                                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="divFinVacaciones w-1/3 ml-4">
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
