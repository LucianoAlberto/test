<x-app-layout>
 <!--Menu superior-->
 <x-slot name="header">
    <div class="flex justify-between ">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          <a class="text-red-500 uppercase underline" href="{{route('empleados.show', $empleado)}}"> {{$empleado->nombre}} {{$empleado->apellidos}}</a>
        </h2>

        <div class="flex justify-end ">
            <div class="block  mx-2">
                <a href="{{route('vacaciones.index', $empleado)}}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Vacaciones</a>
            </div>

            <div class="block  mx-2">
                <a href="{{route('faltas.index', $empleado)}}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Faltas</a>
            </div>

            <div class="block  mx-2">
                <a href="{{route('nominas.index', $empleado)}}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Nóminas</a>
            </div>

        </div>
    </x-slot>
<!---Fin menu superior-->

<div class="w-1/3 mt-5 m-auto" id='nueva_nomina'>
    <div class="flex justify-center relative ">
        <h3 class="text-center font-bold uppercase w-full py-5 bg-gray-300">Editando Nomina . . . </h3>
        
    </div>

    <form class="bg-white shadow-md rounded px-8 pt-2 pb-2 mb-2"
        action="{{route('nominas.update',['empleado'=>$empleado,'nomina'=>$nomina])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="empleado_id" value="">
        <div class="divPagos mt-8 mb-8">

            <div class="contenedorNominas justify-between mb-4">
                <div class="flex mb-4">
                    <div class="w-1/3 divFechaInicioNomina mr-2">
                        <label for="fecha_inicio" class="block font-medium text-sm text-gray-700">Fecha inicio *</label>
                        <input type="date" name="fecha_inicio" class="form-input rounded-md shadow-sm mt-1 block w-full"
                        value="{{ old("fecha_inicio", $nomina->fecha_inicio) }}" />
                    @error("fecha_inicio")
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    </div>

                    <div class="w-1/3 divFechaFinNomina mx-2 ">
                        <label for="fecha_fin" class="block font-medium text-sm text-gray-700">Fecha fin *</label>
                        <input type="date" name="fecha_fin" class="form-input rounded-md shadow-sm mt-1 block w-full"
                        value="{{ old("fecha_fin", $nomina->fecha_fin) }}" />
                    @error("fecha_fin")
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    </div>

                    <div class="w-1/3 divFechaPagoNomina mx-2">
                        <label for="fecha_pago" class="block font-medium text-sm text-gray-700">Fecha de pago *</label>
                        <input type="date" name="fecha_pago" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("fecha_pago", $nomina->fecha_pago) }}" />
                                        @error('fecha_pago')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                         @enderror
                    </div>
                    <div class="w-1/2 divHorasNomina mr-2" >
                        <label for="horas_alta_ss" class="block font-medium text-sm text-gray-700">Horas SS *</label>
                        <input type="text" name="horas_alta_ss" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("horas_alta_ss", $nomina->horas_alta_ss) }}"  required/>
                                        @error('horas_alta_ss')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex">

                    <div class="w-1/3 divImporteTotalNomina mx-2">
                        <label for="importe_total" class="block font-medium text-sm text-gray-700">Importe nómina *</label>
                        <input type="text" name="importe_total" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("importe_total", $nomina->importe_total) }}" />
                                        @error('importe_total')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                    </div>

                    <div class="w-1/3 divImportePagadoNomina ml-2">
                        <label for="importe_pagado" class="block font-medium text-sm text-gray-700">Importe pagado *</label>
                        <input type="text" name="importe_pagado" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("importe_pagado", $nomina->importe_pagado) }}" />
                                        @error('importe_pagado')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                    </div>


                    <div class="w-1/3 divImportePagadoNomina ml-2">
                        <label for="pago_extra" class="block font-medium text-sm text-gray-700">Pago Extra</label>
                        <input type="text" name="pago_extra" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old("pago_extra", $nomina->pago_extra) }}" />
                                        @error('pago_extra')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                    </div>

                </div>

            </div>
        </div>
        <div class="flex items-center justify-end ">
            <button
                class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mb-5">
                Crear
            </button>
        </div>
        <small class="text-red-500">Los campos marcados con * son OBLIGATORIOS</small>
    </form>

</div>
</x-app-layout>
