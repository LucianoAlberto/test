<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nueva Falta : <a class="text-red-500 uppercase underline"
                href="{{ route('empleados.show', $empleado) }}"> {{ $empleado->nombre }} {{ $empleado->apellidos }}</a>
        </h2>
    </x-slot>


    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2" id="contenedorPrincipal">
                <form method="post" action="{{ route('faltas.store', $empleado) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="contenedorNominas justify-between mb-4">
                                <div class="">
                                    <div class="w-1/4 divFechaInicioNomina mb-4">
                                        <label for="fecha_falta" class="block font-medium text-sm text-gray-700">Fecha de la falta</label>
                                        <input type="date" name="fecha_falta" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("fecha_falta", '') }}" />
                                        @error("fecha_falta")
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-full divFechaFinNomina mb-4">
                                        <label for="justificacion" class="block font-medium text-sm text-gray-700">Justificación</label>
                                        <textarea type="text" name="justificacion" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                            {{ old("justificacion", '') }}
                                        </textarea>
                                        @error("justificacion")
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-full divFechaPagoNomina mb-4">
                                        <label for="notas" class="block font-medium text-sm text-gray-700">Notas</label>
                                        <textarea type="text" name="notas" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                            {{ old("notas", '') }}
                                        </textarea>
                                        @error('notas')
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
