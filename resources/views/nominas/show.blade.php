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
        <div class="w-1/3 mx-auto py-10 sm:px-6 lg:px-8"> 
            <div class="flex items-center relative">
              <h3 class="text-center font-bold uppercase w-full py-4 bg-gray-300">Detalles Nomina  </h3>   
              @role('$rolConPoderes')    
              <x-boton2 tipo="link" class="bg-yellow-400 hover:bg-yellow-600  w-14 h-14 absolute right-0 top-0" direccion="{{ route('nominas.edit', ['empleado' => $empleado->id, 'nomina' => $nomina->id]) }}">
                <x-slot name="boton">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                </x-slot>
            </x-boton2>
            @endrole
        
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $nomina->id }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Fecha inicio
                                    </th>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $nomina->fecha_inicio }}
                                    </td>

                                </tr>

                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Fecha fin
                                    </th>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $nomina->fecha_fin }}
                                    </td>
                                </tr>

                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Fecha de pago
                                    </th>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $nomina->fecha_pago }}
                                    </td>
                                </tr>

                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Horas de alta en la Seguridad Social
                                    </th>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $nomina->horas_alta_ss }}
                                    </td>
                                </tr>

                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Importe total
                                    </th>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $nomina->importe_total }} €
                                    </td>
                                </tr>

                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Pago extra
                                    </th>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $nomina->pago_extra }} €
                                    </td>
                                </tr>

                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider font-bold">
                                        Importe pagado
                                    </th>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200 font-bold">
                                        {{ $nomina->importe_pagado }} €
                                    </td>
                                </tr>
                               
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
