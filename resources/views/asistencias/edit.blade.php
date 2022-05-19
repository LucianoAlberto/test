<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Asistencia
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('asistencias.update', ['empleado' => $empleado, 'asistencia' => $asistencia]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="justify-between mb-4">
                                <div class="flex">
                                    <div class="w-4/12 divFechaInicioNomina">
                                        <label for="archivo" class="block font-medium text-sm text-gray-700">Archivo</label>
                                        @if ($asistencia->archivo != null)
                                        <div class="flex mb-2">
                                            <x-boton2 tipo="linkConAsset" class="bg-blue-500 hover:bg-blue-700 mr-4 w-16" direccion="{{ $asistencia->archivo }}">
                                                <x-slot name="boton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </x-slot>
                                            </x-boton2>

                                            <x-boton2 tipo="descargaConAsset" class="bg-green-500 hover:bg-green-700 mr-4 w-16" direccion="{{ $asistencia->archivo }}">
                                                <x-slot name="boton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download">
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </x-slot>
                                            </x-boton2>

                                            <x-boton2 tipo="div" class="bg-slate-300 mr-4 w-16 cursor-not-allowed">
                                                <x-slot name="boton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download">
                                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                        <polyline points="7 10 12 15 17 10"></polyline>
                                                        <line x1="12" y1="15" x2="12" y2="3"></line>
                                                    </svg>
                                                </x-slot>
                                            </x-boton2>
                                        </div>
                                    @endif
                                        <input type="file" name="archivo" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("archivo", $asistencia->archivo) }}" />
                                        @error("archivo")
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-4/12 divFechaInicioNomina">
                                        <label for="fecha_inicio" class="block font-medium text-sm text-gray-700">Fecha inicio</label>
                                        <input type="date" name="fecha_inicio" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("fecha_inicio", $asistencia->fecha_inicio) }}" />
                                        @error("fecha_inicio")
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-4/12">
                                        <label for="fecha_fin" class="block font-medium text-sm text-gray-700">Fecha fin</label>
                                        <input type="date" name="fecha_fin" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("fecha_fin", $asistencia->fecha_fin) }}" />
                                        @error("fecha_fin")
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
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
