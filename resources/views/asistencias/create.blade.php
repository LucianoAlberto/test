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
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2" id="contenedorPrincipal">
                
                <form method="post" action="{{ route('asistencias.store', $empleado) }}" enctype="multipart/form-data" class="flex justify-center">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md w-1/2">
                        <h3 class="text-center font-bold uppercase w-full py-4 bg-gray-300">Subir datos asistencia</h3> 
                        <div class="px-4 py-5 bg-white sm:p-6 w-full">
                            <div class="contenedorNominas justify-between mb-4 w-full">
                                <div class="flex mb-8 w-full">
                                    <div class="w-1/3 divFechaInicioNomina mr-2">
                                        <label for="fecha_inicio" class="block font-medium text-sm text-gray-700">Fecha inicio</label>
                                        <input type="date" name="fecha_inicio" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("fecha_inicio", '') }}" />
                                        @error("fecha_inicio")
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/3 divFechaFinNomina ml-2">
                                        <label for="fecha_fin" class="block font-medium text-sm text-gray-700">Fecha fin</label>
                                        <input type="date" name="fecha_fin" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("fecha_fin", '') }}" />
                                        @error("fecha_fin")
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="w-full divFechaInicioNomina mb-8">
                                    <label for="archivo" class="block font-medium text-sm text-gray-700">Archivo</label>
                                    <input type="file" name="archivo" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old("archivo", '') }}" required />
                                    @error("archivo")
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="flex items-center justify-end px-4 py-3  text-right sm:px-6">
                                    <button class="inline-flex items-center hover:scale-125 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                        Subir datos
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
