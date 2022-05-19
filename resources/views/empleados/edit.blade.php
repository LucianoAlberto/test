<x-app-layout>
  <!--Menu superior-->
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      <a class="text-red-500 uppercase underline" href="{{route('empleados.show', $empleado)}}"> {{$empleado->nombre}} {{$empleado->apellidos}}</a>
    </h2>

    <div class="flex justify-end ">

        <div class="block  mx-2">
            <a href="{{route('nominas.index', $empleado)}}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Nóminas</a>
        </div>

        <div class="block  mx-2">
            <a href="{{route('asistencias.index', $empleado)}}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Asistencias</a>
        </div>

        <div class="block  mx-2">
            <a href="{{route('faltas.index', $empleado)}}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Faltas</a>
        </div>
        
        <div class="block  mx-2">
            <a href="{{route('vacaciones.index', $empleado)}}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Vacaciones</a>
        </div>
    </div>
</x-slot>
<!---Fin menu superior-->

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8" focus>
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
                            <option value="">Seleciona ambito</option>
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
                <form method="post" action="{{ route('empleados.update', $empleado->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md ">
                        <h3 class="text-center font-bold uppercase w-full py-4 bg-gray-300">Editando Empleado . . . </h3>
                        <div class="px-4 py-5 bg-white sm:p-6 divide-y-4">
                            <div class="divDatosPersonales mb-8">                               
                                <div class="flex justify-between mb-4">
                                    <div class="w-1/2 mr-2">
                                        <label for="nombre"
                                            class="block font-medium text-sm text-gray-700">Nombre *</label>
                                        <input type="text" name="nombre" id="nombre"
                                            class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('nombre', $empleado->nombre) }}" />
                                        @error('nombre')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/2 ml-2">
                                        <label for="apellidos"
                                            class="block font-medium text-sm text-gray-700">Apellidos *</label>
                                        <input type="text" name="apellidos" id="apellidos"
                                            class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('apellidos', $empleado->apellidos) }}" />
                                        @error('apellidos')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex justify-between mb-4">
                                    <div class="w-1/2 mr-2">
                                        <label for="dni" class="block font-medium text-sm text-gray-700">DNI *</label>
                                        <input type="text" name="dni" id="dni"
                                            class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('dni', $empleado->dni) }}"  maxlength="9"/>
                                        @error('dni')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/2 ml-2">
                                        <label for="numero_ss" class="block font-medium text-sm text-gray-700">Número de
                                            la Seguridad Social *</label>
                                        <input type="text" name="numero_ss" id="numero_ss"
                                            class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('numero_ss', $empleado->numero_ss) }}"  maxlength="12"/>
                                        @error('numero_ss')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex justify-between mb-4">
                                    <div class="w-1/2 mr-2">
                                        <label for="fecha_comienzo"
                                            class="block font-medium text-sm text-gray-700">Fecha comienzo *</label>
                                        <input type="date" name="fecha_comienzo" id="fecha_comienzo"
                                            class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('fecha_comienzo', $empleado->fecha_comienzo) }}" />
                                        @error('fecha_comienzo')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/2 ml-2">
                                        <label for="fecha_fin" class="block font-medium text-sm text-gray-700">Fecha
                                            fin</label>
                                        <input type="date" name="fecha_fin" id="fecha_fin"
                                            class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('fecha_fin', $empleado->fecha_fin) }}" />
                                        @error('fecha_fin')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="font-medium text-sm text-gray-700 mb-8">
                                    <fieldset>
                                        <legend class="mb-4 flex">Ámbitos de trabajo
                                            <x-boton2 tipo="div"
                                            class="ml-1 bg-gray-800 hover:bg-gray-700 hover:scale-125  w-6 h-6 fill-none "
                                            onclick="nuevoAmbito()">
                                            <x-slot name="boton">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-plus-slash-minus"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="m1.854 14.854 13-13a.5.5 0 0 0-.708-.708l-13 13a.5.5 0 0 0 .708.708ZM4 1a.5.5 0 0 1 .5.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2A.5.5 0 0 1 4 1Zm5 11a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5A.5.5 0 0 1 9 12Z" />
                                                </svg>
                                            </x-slot>
                                        </x-boton2>

                                        </legend>

                                        @foreach ($ambitos as $ambito)
                                            <label for='ambito[{{ $ambito->id }}]'>{{ $ambito->nombre }}</label>
                                            <input type="checkbox" name='ambito[{{ $ambito->id }}]'
                                                {{ in_array($ambito->id, $empleado->ambitos->pluck('id')->toArray()) ? 'checked' : '' }}
                                                class="ml-2 mr-4">
                                        @endforeach
                                    </fieldset>
                                </div>

                                <hr>

                                <div class="flex justify-between mt-8 mb-8">
                                    <div class="">
                                        <label for="practicas"
                                            class="block font-medium text-sm text-gray-700">Prácticas</label>
                                        <input type="checkbox" name="practicas" id="practicas"
                                            class="form-input rounded-md shadow-sm mt-1 block w-full h-10"
                                            value="{{ old('practicas', '') }}" onChange="mostrarPracticas(event)"
                                            {{ isset($empleado->practica) ? 'checked' : '' }} />
                                        @error('practicas')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div id="divPracticas" class="{{ !isset($empleado->practica) ? 'hidden' : '' }}">
                                    <div class="flex mb-4">
                                        <div class="w-1/2 mr-2">
                                            <label for="instituto"
                                                class="block font-medium text-sm text-gray-700">Instituto</label>
                                            <input type="text" name="instituto" id="instituto"
                                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old('instituto', isset($empleado->practica->instituto) ? $empleado->practica->instituto : '') }}" />
                                            @error('instituto')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/2 mx-2">
                                            <label for="localidad"
                                                class="block font-medium text-sm text-gray-700">Localidad</label>
                                            <input type="text" name="localidad" id="localidad"
                                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old('localidad', isset($empleado->practica->localidad) ? $empleado->practica->localidad : '') }}" />
                                            @error('localidad')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/2 ml-2">
                                            <label for="provincia"
                                                class="block font-medium text-sm text-gray-700">Provincia</label>
                                            <input type="text" name="provincia" id="provincia"
                                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old('provincia', isset($empleado->practica->provincia) ? $empleado->practica->provincia : '') }}" />
                                            @error('provincia')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex mb-8">
                                        <div class="w-1/2 mr-2">
                                            <label for="tutor_practicas"
                                                class="block font-medium text-sm text-gray-700">Tutor de
                                                prácticas</label>
                                            <input type="text" name="tutor_practicas" id="tutor_practicas"
                                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old('tutor_practicas', isset($empleado->practica->tutor_practicas) ? $empleado->practica->tutor_practicas : '') }}" />
                                            @error('tutor_practicas')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/2 mx-2">
                                            <label for="fecha_inicio_practicas"
                                                class="block font-medium text-sm text-gray-700">Fecha inicio</label>
                                            <input type="date" name="fecha_inicio_practicas" id="fecha_inicio_practicas"
                                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old('fecha_inicio_practicas', isset($empleado->practica->fecha_inicio) ? $empleado->practica->fecha_inicio : '') }}" />
                                            @error('fecha_inicio_practicas')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-1/2 ml-2">
                                            <label for="fecha_fin_practicas"
                                                class="block font-medium text-sm text-gray-700">Fecha fin</label>
                                            <input type="date" name="fecha_fin_practicas" id="fecha_fin_practicas"
                                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ old('fecha_fin_practicas', isset($empleado->practica->fecha_fin) ? $empleado->practica->fecha_fin : '') }}" />
                                            @error('fecha_fin_practicas')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex mb-8">
                                        <div class="w-3/6 mr-2">
                                            <div class="flex">
                                                @if (isset($empleado->practica->convenio))
                                                    <x-boton2 tipo="linkConAsset"
                                                        class="bg-blue-500 hover:bg-blue-700 mr-4 w-16"
                                                        direccion="{{ $empleado->practica->convenio }}">
                                                        <x-slot name="boton">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-eye">
                                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                </path>
                                                                <circle cx="12" cy="12" r="3"></circle>
                                                            </svg>
                                                        </x-slot>
                                                    </x-boton2>

                                                    <x-boton2 tipo="descargaConAsset"
                                                        class="bg-green-500 hover:bg-green-700 mr-4 w-16"
                                                        direccion="{{ $empleado->practica->convenio }}">
                                                        <x-slot name="boton">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-download">
                                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4">
                                                                </path>
                                                                <polyline points="7 10 12 15 17 10"></polyline>
                                                                <line x1="12" y1="15" x2="12" y2="3"></line>
                                                            </svg>
                                                        </x-slot>
                                                    </x-boton2>
                                                @else
                                                    <div class="flex mb-2">
                                                        <x-boton2 tipo="div"
                                                            class="bg-slate-300 mr-4 w-16 cursor-not-allowed">
                                                            <x-slot name="boton">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-eye">
                                                                    <path
                                                                        d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                    </path>
                                                                    <circle cx="12" cy="12" r="3"></circle>
                                                                </svg>
                                                            </x-slot>
                                                        </x-boton2>

                                                        <x-boton2 tipo="div"
                                                            class="bg-slate-300 mr-4 w-16 cursor-not-allowed">
                                                            <x-slot name="boton">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-download">
                                                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4">
                                                                    </path>
                                                                    <polyline points="7 10 12 15 17 10"></polyline>
                                                                    <line x1="12" y1="15" x2="12" y2="3"></line>
                                                                </svg>
                                                            </x-slot>
                                                        </x-boton2>
                                                    </div>
                                                @endif
                                            </div>
                                            <label for="convenio_practicas"
                                                class="block font-medium text-sm text-gray-700">Adjuntar
                                                convenio</label>
                                            <input type="file" name="convenio_practicas" id="convenio_practicas"
                                                class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                            @error('convenio_practicas')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-3/6 mr-2">
                                            <div class="flex">
                                                @if (isset($empleado->practica->doc_confidencialidad))
                                                    <x-boton2 tipo="linkConAsset"
                                                        class="bg-blue-500 hover:bg-blue-700 mr-4 w-16"
                                                        direccion="{{ $empleado->practica->doc_confidencialidad }}">
                                                        <x-slot name="boton">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-eye">
                                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                </path>
                                                                <circle cx="12" cy="12" r="3"></circle>
                                                            </svg>
                                                        </x-slot>
                                                    </x-boton2>

                                                    <x-boton2 tipo="descargaConAsset"
                                                        class="bg-green-500 hover:bg-green-700 mr-4 w-16"
                                                        direccion="{{ $empleado->practica->doc_confidencialidad }}">
                                                        <x-slot name="boton">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-download">
                                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4">
                                                                </path>
                                                                <polyline points="7 10 12 15 17 10"></polyline>
                                                                <line x1="12" y1="15" x2="12" y2="3"></line>
                                                            </svg>
                                                        </x-slot>
                                                    </x-boton2>
                                                @else
                                                    <div class="flex mb-2">
                                                        <x-boton2 tipo="div"
                                                            class="bg-slate-300 mr-4 w-16 cursor-not-allowed">
                                                            <x-slot name="boton">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-eye">
                                                                    <path
                                                                        d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                    </path>
                                                                    <circle cx="12" cy="12" r="3"></circle>
                                                                </svg>
                                                            </x-slot>
                                                        </x-boton2>

                                                        <x-boton2 tipo="div"
                                                            class="bg-slate-300 mr-4 w-16 cursor-not-allowed">
                                                            <x-slot name="boton">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-download">
                                                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4">
                                                                    </path>
                                                                    <polyline points="7 10 12 15 17 10"></polyline>
                                                                    <line x1="12" y1="15" x2="12" y2="3"></line>
                                                                </svg>
                                                            </x-slot>
                                                        </x-boton2>
                                                    </div>
                                                @endif
                                            </div>
                                            <label for="doc_confidencialidad_practicas"
                                                class="block font-medium text-sm text-gray-700">Adjuntar documento de
                                                confidencialidad</label>
                                            <input type="file" name="doc_confidencialidad_practicas"
                                                id="doc_confidencialidad_practicas"
                                                class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                            @error('doc_confidencialidad_practicas')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{--empleaodo--}}
                                <div id="divEmpleado" {{ $empleado->practica ? 'hidden': ''}}>
                                <div class="flex mt-8 mb-4">
                                    <div class="w-1/2 mr-6 mb-10">
                                        <label for="contrato" class="block font-medium text-sm text-gray-700">Adjuntar
                                            contrato</label>
                                        @if ($empleado->contrato != null)
                                            <div class="flex mb-2">
                                                <x-boton2 tipo="linkConAsset"
                                                    class="bg-blue-500 hover:bg-blue-700 mr-4 w-16"
                                                    direccion="{{ $empleado->contrato }}">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-eye">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                    </x-slot>
                                                </x-boton2>

                                                <x-boton2 tipo="descargaConAsset"
                                                    class="bg-green-500 hover:bg-green-700 mr-4 w-16"
                                                    direccion="{{ $empleado->contrato }}">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-download">
                                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                            <polyline points="7 10 12 15 17 10"></polyline>
                                                            <line x1="12" y1="15" x2="12" y2="3"></line>
                                                        </svg>
                                                    </x-slot>
                                                </x-boton2>
                                            </div>
                                        @else
                                            <div class="flex mb-2">
                                                <x-boton2 tipo="div" class="bg-slate-300 mr-4 w-16 cursor-not-allowed">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-eye">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                    </x-slot>
                                                </x-boton2>

                                                <x-boton2 tipo="div" class="bg-slate-300 mr-4 w-16 cursor-not-allowed">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-download">
                                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                            <polyline points="7 10 12 15 17 10"></polyline>
                                                            <line x1="12" y1="15" x2="12" y2="3"></line>
                                                        </svg>
                                                    </x-slot>
                                                </x-boton2>
                                            </div>
                                        @endif
                                        <input type="file" name="contrato" id="contrato"
                                            class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                        @error('contrato')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/2 ml-2">
                                        <label for="doc_confidencialidad"
                                            class="block font-medium text-sm text-gray-700">Adjuntar documento de
                                            confidencialidad</label>
                                        @if ($empleado->doc_confidencialidad != null)
                                            <div class="flex mb-2">
                                                <x-boton2 tipo="linkConAsset"
                                                    class="bg-blue-500 hover:bg-blue-700 mr-4 w-16"
                                                    direccion="{{ $empleado->doc_confidencialidad }}">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-eye">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                    </x-slot>
                                                </x-boton2>

                                                <x-boton2 tipo="descargaConAsset"
                                                    class="bg-green-500 hover:bg-green-700 mr-4 w-16"
                                                    direccion="{{ $empleado->doc_confidencialidad }}">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-download">
                                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                            <polyline points="7 10 12 15 17 10"></polyline>
                                                            <line x1="12" y1="15" x2="12" y2="3"></line>
                                                        </svg>
                                                    </x-slot>
                                                </x-boton2>
                                            </div>
                                        @else
                                            <div class="flex mb-2">
                                                <x-boton2 tipo="div" class="bg-slate-300 mr-4 w-16 cursor-not-allowed">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-eye">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                    </x-slot>
                                                </x-boton2>

                                                <x-boton2 tipo="div" class="bg-slate-300 mr-4 w-16 cursor-not-allowed">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-download">
                                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                            <polyline points="7 10 12 15 17 10"></polyline>
                                                            <line x1="12" y1="15" x2="12" y2="3"></line>
                                                        </svg>
                                                    </x-slot>
                                                </x-boton2>
                                            </div>
                                        @endif
                                        <input type="file" name="doc_confidencialidad"
                                            class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                        @error('doc_confidencialidad')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex mb-4">
                                    <div class="w-1/2 mr-6 mb-10">
                                        <label for="doc_normas"
                                            class="block font-medium text-sm text-gray-700">Adjuntar documento de   normas</label>
                                        @if ($empleado->doc_normas != null)
                                            <div class="flex mb-2">
                                                <x-boton2 tipo="linkConAsset"
                                                    class="bg-blue-500 hover:bg-blue-700 mr-4 w-16"
                                                    direccion="{{ $empleado->doc_normas }}">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-eye">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                    </x-slot>
                                                </x-boton2>

                                                <x-boton2 tipo="descargaConAsset"
                                                    class="bg-green-500 hover:bg-green-700 mr-4 w-16"
                                                    direccion="{{ $empleado->doc_normas }}">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-download">
                                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                            <polyline points="7 10 12 15 17 10"></polyline>
                                                            <line x1="12" y1="15" x2="12" y2="3"></line>
                                                        </svg>
                                                    </x-slot>
                                                </x-boton2>
                                            </div>
                                        @else
                                            <div class="flex mb-2">
                                                <x-boton2 tipo="div" class="bg-slate-300 mr-4 w-16 cursor-not-allowed">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-eye">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                    </x-slot>
                                                </x-boton2>

                                                <x-boton2 tipo="div" class="bg-slate-300 mr-4 w-16 cursor-not-allowed">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-download">
                                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                            <polyline points="7 10 12 15 17 10"></polyline>
                                                            <line x1="12" y1="15" x2="12" y2="3"></line>
                                                        </svg>
                                                    </x-slot>
                                                </x-boton2>
                                            </div>
                                        @endif
                                        <input type="file" name="doc_normas"
                                            class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                        @error('doc_normas')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/2 ml-2">

                                        <label for="doc_prevencion_riesgos"
                                            class="block font-medium text-sm text-gray-700">Adjuntar documento de
                                            Prevención de Riesgos Laborales</label>
                                        @if ($empleado->doc_prevencion_riesgos != null)
                                            <div class="flex mb-2">
                                                <x-boton2 tipo="linkConAsset"
                                                    class="bg-blue-500 hover:bg-blue-700 mr-4 w-16"
                                                    direccion="{{ $empleado->doc_prevencion_riesgos }}">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-eye">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                    </x-slot>
                                                </x-boton2>

                                                <x-boton2 tipo="descargaConAsset"
                                                    class="bg-green-500 hover:bg-green-700 mr-4 w-16"
                                                    direccion="{{ $empleado->doc_prevencion_riesgos }}">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-download">
                                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                            <polyline points="7 10 12 15 17 10"></polyline>
                                                            <line x1="12" y1="15" x2="12" y2="3"></line>
                                                        </svg>
                                                    </x-slot>
                                                </x-boton2>
                                            </div>
                                        @else
                                            <div class="flex mb-2">
                                                <x-boton2 tipo="div" class="bg-slate-300 mr-4 w-16 cursor-not-allowed">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-eye">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                    </x-slot>
                                                </x-boton2>

                                                <x-boton2 tipo="div" class="bg-slate-300 mr-4 w-16 cursor-not-allowed">
                                                    <x-slot name="boton">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-download">
                                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                            <polyline points="7 10 12 15 17 10"></polyline>
                                                            <line x1="12" y1="15" x2="12" y2="3"></line>
                                                        </svg>
                                                    </x-slot>
                                                </x-boton2>
                                            </div>
                                        @endif
                                        <input type="file" name="doc_prevencion_riesgos"
                                            class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                        @error('doc_prevencion_riesgos')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="w-1/2 mb-8">

                                    <label for="doc_reglamento_interno"
                                        class="block font-medium text-sm text-gray-700">Adjuntar documento de
                                        Reglamento Interno</label>
                                    @if ($empleado->doc_reglamento_interno != null)
                                        <div class="flex mb-2">
                                            <x-boton2 tipo="linkConAsset"
                                                class="bg-blue-500 hover:bg-blue-700 mr-4 w-16"
                                                direccion="{{ $empleado->doc_reglamento_interno }}">
                                                <x-slot name="boton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-eye">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </x-slot>
                                            </x-boton2>

                                            <x-boton2 tipo="descargaConAsset"
                                                class="bg-green-500 hover:bg-green-700 mr-4 w-16"
                                                direccion="{{ $empleado->doc_reglamento_interno }}">
                                                <x-slot name="boton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-download">
                                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                        <polyline points="7 10 12 15 17 10"></polyline>
                                                        <line x1="12" y1="15" x2="12" y2="3"></line>
                                                    </svg>
                                                </x-slot>
                                            </x-boton2>
                                        </div>
                                    @else
                                        <div class="flex mb-2">
                                            <x-boton2 tipo="div" class="bg-slate-300 mr-4 w-16 cursor-not-allowed">
                                                <x-slot name="boton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-eye">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </x-slot>
                                            </x-boton2>

                                            <x-boton2 tipo="div" class="bg-slate-300 mr-4 w-16 cursor-not-allowed">
                                                <x-slot name="boton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-download">
                                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                        <polyline points="7 10 12 15 17 10"></polyline>
                                                        <line x1="12" y1="15" x2="12" y2="3"></line>
                                                    </svg>
                                                </x-slot>
                                            </x-boton2>
                                        </div>
                                    @endif
                                    <input type="file" name="doc_reglamento_interno"
                                        class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                    @error('doc_reglamento_interno')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                </div>

                            </div>
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button
                                class="inline-flex items-center px-4 py-2 hover:scale-125  bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Guardar cambios
                            </button>
                        </div>
                    </div>


            </div>
            <small class="text-red-500 px-2">Los campos marcados con * son OBLIGATORIOS</small>

            </form>
        </div>
    </div>
    </div>
</x-app-layout>
