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
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="flex justify-between mb-4">
                                <div class="w-1/4">
                                    <label for="nombre" class="block font-medium text-sm text-gray-700">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('nombre', $empleado->nombre) }}" />
                                    @error('nombre')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-1/3">
                                    <label for="apellidos" class="block font-medium text-sm text-gray-700">Apellidos</label>
                                    <input type="text" name="apellidos" id="apellidos" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('apellidos', $empleado->apellidos) }}" />
                                    @error('apellidos')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-1/4">
                                    <label for="dni" class="block font-medium text-sm text-gray-700">DNI</label>
                                    <input type="text" name="dni" id="dni" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('dni', $empleado->apellidos) }}" />
                                    @error('dni')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex justify-between mb-4">
                                <div class="w-3/6 mr-2">
                                    <label for="numero_ss" class="block font-medium text-sm text-gray-700">Número de la Seguridad Social</label>
                                    <input type="text" name="numero_ss" id="numero_ss" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('numero_ss', $empleado->numero_ss) }}" />
                                    @error('numero_ss')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-3/6 ml-2">
                                    <label for="fecha_comienzo" class="block font-medium text-sm text-gray-700">Fecha comienzo</label>
                                    <input type="date" name="fecha_comienzo" id="fecha_comienzo" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('fecha_comienzo', $empleado->fecha_comienzo) }}" />
                                    @error('fecha_comienzo')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-3/6 ml-2">
                                    <label for="fecha_fin" class="block font-medium text-sm text-gray-700">Fecha fin</label>
                                    <input type="date" name="fecha_fin" id="fecha_fin" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('fecha_fin', $empleado->fecha_fin) }}" />
                                    @error('fecha_fin')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="contrato" class="block font-medium text-sm text-gray-700">Adjuntar contrato</label>
                                <input type="file" name="contrato" id="contrato" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old("contrato", $empleado->contrato) }}" />
                                @error('contrato')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="doc_confidencialidad" class="block font-medium text-sm text-gray-700">Adjuntar documento de confidencialidad</label>
                                <input type="file" name="doc_confidencialidad" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old("doc_confidencialidad", $empleado->doc_confidencialidad) }}" />
                                @error('doc_confidencialidad')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="doc_normas" class="block font-medium text-sm text-gray-700">Adjuntar documento de normas</label>
                                <input type="file" name="doc_normas" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old("doc_normas", $empleado->doc_normas) }}" />
                                @error('doc_normas')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="doc_prevencion_riesgos" class="block font-medium text-sm text-gray-700">Adjuntar documento de Prevención de Riesgos Laborales</label>
                                <input type="file" name="doc_prevencion_riesgos" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old("doc_prevencion_riesgos", $empleado->doc_prevencion_riesgos) }}" />
                                @error('doc_prevencion_riesgos')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="doc_reglamento_interno" class="block font-medium text-sm text-gray-700">Adjuntar documento de Reglamento Interno</label>
                                <input type="file" name="doc_reglamento_interno" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old("doc_reglamento_interno", $empleado->doc_reglamento_interno) }}" />
                                @error('doc_reglamento_interno')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
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
