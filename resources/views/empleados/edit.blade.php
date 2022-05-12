<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar empleado
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('empleados.update', $empleado->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                                            value="{{ old('nombre', $empleado->nombre) }}" />
                                            @error('nombre')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/2 ml-2">
                                            <label for="apellidos" class="block font-medium text-sm text-gray-700">Apellidos</label>
                                            <input type="text" name="apellidos" id="apellidos" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('apellidos', $empleado->apellidos) }}"  />
                                            @error('apellidos')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex justify-between mb-4">
                                        <div class="w-1/2 mr-2">
                                            <label for="dni" class="block font-medium text-sm text-gray-700">DNI</label>
                                            <input type="text" name="dni" id="dni" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old('dni', $empleado->dni) }}" />
                                            @error('dni')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/2 ml-2">
                                            <label for="numero_ss" class="block font-medium text-sm text-gray-700">Número de la Seguridad Social</label>
                                            <input type="text" name="numero_ss" id="numero_ss" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old('numero_ss', $empleado->numero_ss) }}"  />
                                            @error('numero_ss')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex justify-between mb-4">
                                        <div class="w-1/2 mr-2">
                                            <label for="fecha_comienzo" class="block font-medium text-sm text-gray-700">Fecha comienzo</label>
                                            <input type="date" name="fecha_comienzo" id="fecha_comienzo" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old('fecha_comienzo', $empleado->fecha_comienzo) }}"  />
                                            @error('fecha_comienzo')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/2 ml-2">
                                            <label for="fecha_fin" class="block font-medium text-sm text-gray-700">Fecha fin</label>
                                            <input type="date" name="fecha_fin" id="fecha_fin" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old('fecha_fin', $empleado->fecha_fin) }}"  />
                                            @error('fecha_fin')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="font-medium text-sm text-gray-700 mb-8">
                                        <fieldset>
                                            <legend class="mb-4">Ámbitos de trabajo:</legend>
                                            @foreach ($ambitos as $ambito )
                                                <label for='ambito[{{$ambito->id}}]'>{{ $ambito->nombre }}</label>
                                                <input type="checkbox" name='ambito[{{$ambito->id}}]' {{in_array($ambito->id, $empleado->ambitos->pluck('id')->toArray())?'checked':''}} class="ml-2 mr-4">
                                            @endforeach
                                        </fieldset>
                                    </div>

                                    <hr>

                                    <div class="flex justify-between mt-8 mb-8">
                                        <div class="">
                                            <label for="practicas" class="block font-medium text-sm text-gray-700">Prácticas</label>
                                            <input type="checkbox" name="practicas" id="practicas" class="form-input rounded-md shadow-sm mt-1 block w-full h-10"
                                                value="{{ old('practicas', '') }}" onChange="mostrarPracticas(event)"
                                                {{isset($empleado->practica)?'checked':''}}/>
                                            @error('practicas')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div id="divPracticas" class="{{!isset($empleado->practica)?'hidden':''}}">
                                    <div class="flex mb-4">
                                        <div class="w-1/2 mr-2">
                                            <label for="instituto" class="block font-medium text-sm text-gray-700">Instituto</label>
                                            <input type="text" name="instituto" id="instituto" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('instituto', isset($empleado->practica->instituto) ? $empleado->practica->instituto:'') }}" />
                                            @error('instituto')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/2 mx-2">
                                            <label for="localidad" class="block font-medium text-sm text-gray-700">Localidad</label>
                                            <input type="text" name="localidad" id="localidad" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old('localidad', isset($empleado->practica->localidad) ? $empleado->practica->localidad:'') }}"  />
                                            @error('localidad')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/2 ml-2">
                                            <label for="provincia" class="block font-medium text-sm text-gray-700">Provincia</label>
                                            <input type="text" name="provincia" id="provincia" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old('provincia', isset($empleado->practica->provincia) ? $empleado->practica->provincia:'') }}"  />
                                            @error('provincia')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex mb-8">
                                        <div class="w-1/2 mr-2">
                                            <label for="tutor_practicas" class="block font-medium text-sm text-gray-700">Tutor de prácticas</label>
                                            <input type="text" name="tutor_practicas" id="tutor_practicas" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old('tutor_practicas', isset($empleado->practica->tutor_practicas) ? $empleado->practica->tutor_practicas:'') }}"  />
                                            @error('tutor_practicas')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/2 mx-2">
                                            <label for="fecha_inicio_practicas" class="block font-medium text-sm text-gray-700">Fecha inicio</label>
                                            <input type="date" name="fecha_inicio_practicas" id="fecha_inicio_practicas" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old('fecha_inicio_practicas', isset($empleado->practica->fecha_inicio_practicas) ? $empleado->practica->fecha_inicio_practicas:'') }}"  />
                                            @error('fecha_inicio_practicas')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/2 ml-2">
                                            <label for="fecha_fin_practicas" class="block font-medium text-sm text-gray-700">Fecha fin</label>
                                            <input type="date" name="fecha_fin_practicas" id="fecha_fin_practicas" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old('fecha_fin_practicas', isset($empleado->practica->fecha_fin_practicas) ? $empleado->practica->fecha_fin_practicas:'') }}"  />
                                            @error('fecha_fin_practicas')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex mb-8">
                                        <div class="w-3/6 mr-2">
                                            <div class="flex">
                                                <x-boton2 tipo="linkConAsset" class="bg-blue-500 hover:bg-blue-700 mr-4 w-16" direccion="{{$empleado->practica->convenio}}">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                    </x-slot>
                                                </x-boton2>

                                                <x-boton2 tipo="descargaConAsset" class="bg-green-500 hover:bg-green-700 mr-4 w-16" direccion="{{$empleado->practica->convenio}}">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                                    </x-slot>
                                                </x-boton2>
                                            </div>
                                            <label for="convenio_practicas" class="block font-medium text-sm text-gray-700">Adjuntar convenio</label>
                                            <input type="file" name="convenio_practicas" id="convenio_practicas" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old('convenio_practicas', isset($empleado->practica->convenio_practicas) ? $empleado->practica->convenio_practicas:'') }}"  />
                                            @error('convenio_practicas')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-3/6 mr-2">
                                            <div class="flex">
                                                <x-boton2 tipo="linkConAsset" class="bg-blue-500 hover:bg-blue-700 mr-4 w-16" direccion="{{$empleado->practica->doc_confidencialidad}}">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                    </x-slot>
                                                </x-boton2>

                                                <x-boton2 tipo="descargaConAsset" class="bg-green-500 hover:bg-green-700 mr-4 w-16" direccion="{{$empleado->practica->doc_confidencialidad}}">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                                    </x-slot>
                                                </x-boton2>
                                            </div>
                                            <label for="doc_confidencialidad_practicas" class="block font-medium text-sm text-gray-700">Adjuntar documento de confidencialidad</label>
                                            <input type="file" name="doc_confidencialidad_practicas" id="doc_confidencialidad_practicas" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old('doc_confidencialidad_practicas', isset($empleado->practica->doc_confidencialidad_practicas) ? $empleado->practica->doc_confidencialidad_practicas:'') }}"  />
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

                                        @foreach ($empleado->faltas as $key => $falta)
                                            <div class="contenedorFaltas">
                                                <div class="divFechaFaltaPracticas w-1/3 mb-4">
                                                    <label for="faltas_practicas[{{ $key }}][fecha_falta]" class="block font-medium text-sm text-gray-700">Fecha</label>
                                                    <input type="date" name="faltas_practicas[{{ $key }}][fecha_falta]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                        value="{{ old("faltas_practicas[$key][fecha_falta]", $falta->fecha_falta) }}" />
                                                    @error('faltas_practicas[0][fecha_falta]')
                                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="divJustificacionFaltaPracticas mb-4">
                                                    <label for="faltas_practicas[{{$key}}][justificacion]" class="block font-medium text-sm text-gray-700">Justificacion</label>
                                                    <textarea type="text" name="faltas_practicas[{{$key}}][justificacion]" class="form-input rounded-md shadow-sm mt-1 block w-full">{{ $falta->justificacion }}</textarea>
                                                    @error('faltas_practicas[{{$key}}][justificacion]')
                                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="divNotaFaltaPracticas mb-4">
                                                    <label for="faltas_practicas[{{$key}}][notas]" class="block font-medium text-sm text-gray-700">Notas</label>
                                                    <textarea type="text" name="faltas_practicas[{{$key}}][notas]" class="form-input rounded-md shadow-sm mt-1 block w-full">{{ $falta->notas }}</textarea>
                                                    @error('faltas_practicas[{{$key}}][notas]')
                                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <hr>
                                    <div class="flex mt-8 mb-4">
                                        <div class="w-1/2 mr-2">
                                            <div class="flex">
                                                <x-boton2 tipo="linkConAsset" class="bg-blue-500 hover:bg-blue-700 mr-4 w-16" direccion="{{$empleado->contrato}}">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                    </x-slot>
                                                </x-boton2>

                                                <x-boton2 tipo="descargaConAsset" class="bg-green-500 hover:bg-green-700 mr-4 w-16" direccion="{{$empleado->contrato}}">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                                    </x-slot>
                                                </x-boton2>
                                            </div>
                                            <label for="contrato" class="block font-medium text-sm text-gray-700">Adjuntar contrato</label>
                                            <input type="file" name="contrato" id="contrato" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old('contrato', $empleado->contrato) }}" />
                                            @error('contrato')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/2 ml-2">
                                            <div class="flex">
                                                <x-boton2 tipo="linkConAsset" class="bg-blue-500 hover:bg-blue-700 mr-4 w-16" direccion="{{$empleado->doc_confidencialidad}}">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                    </x-slot>
                                                </x-boton2>

                                                <x-boton2 tipo="descargaConAsset" class="bg-green-500 hover:bg-green-700 mr-4 w-16" direccion="{{$empleado->doc_confidencialidad}}">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                                    </x-slot>
                                                </x-boton2>
                                            </div>
                                            <label for="doc_confidencialidad" class="block font-medium text-sm text-gray-700">Adjuntar documento de confidencialidad</label>
                                            <input type="file" name="doc_confidencialidad" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old('doc_confidencialidad', $empleado->doc_confidencialidad) }}" />
                                            @error('doc_confidencialidad')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="flex mb-4">
                                        <div class="w-1/2 mr-2">
                                            <div class="flex">
                                                <x-boton2 tipo="linkConAsset" class="bg-blue-500 hover:bg-blue-700 mr-4 w-16" direccion="{{$empleado->doc_normas}}">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                    </x-slot>
                                                </x-boton2>

                                                <x-boton2 tipo="descargaConAsset" class="bg-green-500 hover:bg-green-700 mr-4 w-16" direccion="{{$empleado->doc_normas}}">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                                    </x-slot>
                                                </x-boton2>
                                            </div>
                                            <label for="doc_normas" class="block font-medium text-sm text-gray-700">Adjuntar documento de normas</label>
                                            <input type="file" name="doc_normas" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old('doc_normas', $empleado->doc_normas) }}" />
                                            @error('doc_normas')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/2 ml-2">
                                            <div class="flex">
                                                <x-boton2 tipo="linkConAsset" class="bg-blue-500 hover:bg-blue-700 mr-4 w-16" direccion="{{$empleado->doc_prevencion_riesgos}}">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                    </x-slot>
                                                </x-boton2>

                                                <x-boton2 tipo="descargaConAsset" class="bg-green-500 hover:bg-green-700 mr-4 w-16" direccion="{{$empleado->doc_prevencion_riesgos}}">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                                    </x-slot>
                                                </x-boton2>
                                            </div>
                                            <label for="doc_prevencion_riesgos" class="block font-medium text-sm text-gray-700">Adjuntar documento de Prevención de Riesgos Laborales</label>
                                            <input type="file" name="doc_prevencion_riesgos" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old('doc_prevencion_riesgos', $empleado->doc_prevencion_riesgos) }}" />
                                            @error('doc_prevencion_riesgos')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="w-1/2 mb-8">
                                        <div class="flex">
                                            <x-boton2 tipo="linkConAsset" class="bg-blue-500 hover:bg-blue-700 mr-4 w-16" direccion="{{$empleado->doc_reglamento_interno}}">
                                                <x-slot name="boton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                </x-slot>
                                            </x-boton2>

                                            <x-boton2 tipo="descargaConAsset" class="bg-green-500 hover:bg-green-700 mr-4 w-16" direccion="{{$empleado->doc_reglamento_interno}}">
                                                <x-slot name="boton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                                </x-slot>
                                            </x-boton2>
                                        </div>
                                        <label for="doc_reglamento_interno" class="block font-medium text-sm text-gray-700">Adjuntar documento de Reglamento Interno</label>
                                        <input type="file" name="doc_reglamento_interno" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('doc_reglamento_interno', $empleado->doc_reglamento_interno) }}" />
                                        @error('doc_reglamento_interno')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <hr>
                                        <div class="divPagos mt-8 mb-8">
                                            <div class="flex justify-center items-center relative contenedorTituloBotones mb-8">
                                                <h3 class="font-semibold text-xl text-gray-800 leading-tight m2-6 mb-2">
                                                    Pagos
                                                </h3>

                                                <div class="flex justify-between absolute right-0">
                                                    <x-boton2 tipo="div" nombre="mas" class="bg-green-600 hover:bg-green-700 w-12 h-12 mr-6" onclick="masPago(event)">
                                                        <x-slot name="boton">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                        </x-slot>
                                                    </x-boton2>

                                                    <x-boton2 tipo="div" nombre="menos" class="bg-red-600 hover:bg-red-700 w-12 h-12" onclick="menosPago(event)">
                                                        <x-slot name="boton">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                        </x-slot>
                                                    </x-boton2>
                                                </div>
                                            </div>

                                            @foreach ($empleado->nominas as $key => $nomina)
                                            <div class="contenedorNominas justify-between mb-4">
                                                <div class="flex mb-4">
                                                    <div class="w-1/3 divFechaInicioNomina mr-2">
                                                        <label for="nominas[{{$key}}][fecha_inicio]" class="block font-medium text-sm text-gray-700">Fecha inicio</label>
                                                        <input type="date" name="nominas[{{$key}}][fecha_inicio]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                            value="{{ old("nominas[$key][fecha_inicio]", $nomina->fecha_inicio) }}" />
                                                        @error("nominas[{{$key}}][fecha_inicio]")
                                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <div class="w-1/3 divFechaFinNomina mx-2">
                                                        <label for="nominas[{{$key}}][fecha_fin]" class="block font-medium text-sm text-gray-700">Fecha fin</label>
                                                        <input type="date" name="nominas[{{$key}}][fecha_fin]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                            value="{{ old("nominas[$key][fecha_inicio]", $nomina->fecha_inicio) }}" />
                                                        @error("nominas[{{$key}}][fecha_fin]")
                                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="w-1/3 divFechaPagoNomina ml-2">
                                                        <label for="nominas[{{$key}}][fecha_pago]" class="block font-medium text-sm text-gray-700">Fecha de pago</label>
                                                        <input type="date" name="nominas[{{$key}}][fecha_pago]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                            value="{{ old("nominas[$key][fecha_pago]", $nomina->fecha_pago) }}" />
                                                        @error('nominas[{{$key}}][fecha_pago]')
                                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <div class="w-1/3 divHorasNomina mr-2">
                                                        <label for="nominas[{{$key}}][horas_alta_ss]" class="block font-medium text-sm text-gray-700">Horas de alta en la SS</label>
                                                        <input type="text" name="nominas[{{$key}}][horas_alta_ss]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                            value="{{ old("nominas[$key][horas_alta_ss]", $nomina->horas_alta_ss) }}" />
                                                        @error('nominas[{{$key}}][horas_alta_ss]')
                                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <div class="w-1/3 divImporteTotalNomina mx-2">
                                                        <label for="nominas[{{$key}}][importe_total]" class="block font-medium text-sm text-gray-700">Importe nómina</label>
                                                        <input type="text" name="nominas[{{$key}}][importe_total]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                            value="{{ old("nominas[$key][importe_total]", $nomina->importe_total) }}" />
                                                        @error('nominas[{{$key}}][importe_total]')
                                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <div class="w-1/3 divImportePagadoNomina ml-2">
                                                        <label for="nominas[{{$key}}][importe_pagado]" class="block font-medium text-sm text-gray-700">Importe pagado</label>
                                                        <input type="text" name="nominas[{{$key}}][importe_pagado]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                            value="{{ old("nominas[$key][importe_pagado]", $nomina->importe_pagado) }}" />
                                                        @error('nominas[{{$key}}][importe_pagado]')
                                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

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

                                            @foreach ($empleado->faltas as $key => $falta)
                                            <div class="contenedorFaltas">
                                                <div class="divFechaFalta w-1/3 mb-4">
                                                    <label for="faltas[{{$key}}][fecha_falta]" class="block font-medium text-sm text-gray-700">Fecha</label>
                                                    <input type="date" name="faltas[$key][fecha_falta]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                        value="{{ old("faltas[$key][fecha_falta]", $falta->fecha_falta) }}" />
                                                    @error('faltas[{{$key}}][fecha_falta]')
                                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="divJustificacionFalta mb-4">
                                                    <label for="faltas[{{$key}}][justificacion]" class="block font-medium text-sm text-gray-700">Justificacion</label>
                                                    <textarea type="text" name="faltas[{{$key}}][justificacion]" class="form-input rounded-md shadow-sm mt-1 block w-full">{{$falta->justificacion}}</textarea>
                                                    @error('faltas[{{$key}}][justificacion]')
                                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="divNotaFalta mb-4">
                                                    <label for="faltas[{{$key}}][notas]" class="block font-medium text-sm text-gray-700">Notas</label>
                                                    <textarea type="text" name="faltas[{{$key}}][notas]" class="form-input rounded-md shadow-sm mt-1 block w-full">{{$falta->notas}}</textarea>
                                                    @error('faltas[{{$key}}][notas]')
                                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            @endforeach

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
                                                    value="{{ old("vacaciones_total", $empleado->vacaciones_total) }}" />
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

                                            @foreach ($empleado->vacaciones as $key => $vacacion)
                                                <div class="contenedorVacaciones flex mb-4">
                                                    <div class="divInicioVacaciones w-1/3">
                                                        <label for="vacaciones_disfrutadas[{{ $key }}][fecha_inicio]" class="block font-medium text-sm text-gray-700">Fecha inicio vacaciones</label>
                                                        <input type="date" name="vacaciones_disfrutadas[{{ $key }}][fecha_inicio]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                            value="{{ old("vacaciones_disfrutadas[$key][fecha_inicio]", $vacacion->fecha_inicio) }}" />
                                                        @error('vacaciones_disfrutadas[{{ $key }}][fecha_inicio]')
                                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <div class="divFinVacaciones w-1/3 ml-4">
                                                        <label for="vacaciones_disfrutadas[{{ $key }}][fecha_fin]" class="block font-medium text-sm text-gray-700">Fecha fin vacaciones</label>
                                                        <input type="date" name="vacaciones_disfrutadas[{{ $key }}][fecha_fin]" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                            value="{{ old("vacaciones_disfrutadas[$key][fecha_fin]", $vacacion->fecha_inicio) }}" />
                                                        @error('vacaciones_disfrutadas[{{ $key }}][fecha_fin]')
                                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
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
