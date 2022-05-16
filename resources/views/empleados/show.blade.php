<x-app-layout>
   <!--Menu superior-->
   <x-slot name="header">
    <div class="flex justify-between ">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          <a class="text-red-500 uppercase underline" href="{{route('empleados.show', $empleado)}}"> {{$empleado->nombre}} {{$empleado->apellidos}}</a>
        </h2>

        <div class="flex justify-end "> 
            <div class="block  mx-2">
                <a href="" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Contratos</a>
            </div>

            <div class="block  mx-2">
                <a href="" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Facturas</a>
            </div>

            <div class="block  mx-2">
                <a href="" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Proyectos</a>
            </div>

            <div class="block  mx-2">
                <a href="{{route('nominas.index',$empleado)}}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Nominas</a>
            </div>
        </div>
    </div>
    </x-slot>
    <!---Fin menu superior-->
    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
    
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <h3 class="text-center font-bold uppercase w-full py-5 bg-gray-300">Datos personales</h3>
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $empleado->id }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nombre
                                    </th>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $empleado->nombre }} {{ $empleado->apellidos }}
                                    </td>

                                </tr>

                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        DNI
                                    </th>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $empleado->dni }}
                                    </td>

                                </tr>

                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Número de la Seguridad Social
                                    </th>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $empleado->numero_ss }}
                                    </td>

                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Fecha comienzo
                                    </th>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $empleado->fecha_comienzo }}
                                    </td>

                                </tr>

                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Fecha fin
                                    </th>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $empleado->fecha_fin }}
                                    </td>
                                </tr>

                                @if($empleado->practica)
                                    <tr class="border-b">
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Instituto
                                        </th>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                            {{ $empleado->practica->instituto }}
                                        </td>
                                    </tr>

                                    <tr class="border-b">
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Localidad
                                        </th>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                            {{ $empleado->practica->localidad }}
                                        </td>
                                    </tr>

                                    <tr class="border-b">
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Provincia
                                        </th>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                            {{ $empleado->practica->provincia }}
                                        </td>
                                    </tr>

                                    <tr class="border-b">
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tutor de prácticas
                                        </th>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                            {{ $empleado->practica->tutor_practicas }}
                                        </td>
                                    </tr>

                                    <tr class="border-b">
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Fecha de inicio de las prácticas
                                        </th>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                            {{ $empleado->practica->fecha_inicio }}
                                        </td>
                                    </tr>

                                    <tr class="border-b">
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Fecha de finalización de las prácticas
                                        </th>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                            {{ $empleado->practica->fecha_fin }}
                                        </td>
                                    </tr>

                                    <tr class="border-b">
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Convenio
                                        </th>

                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                            <div>
                                                <a href="{{ asset("/storage/{$empleado->practica->convenio}") }}" target="_blank" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 border border-green-700 rounded ">Ver</a>

                                                <a href="{{ asset("/storage/{$empleado->practica->convenio}") }}" download class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded px-5"> Descargar</a>
                                          </div>
                                        </td>
                                    </tr>

                                @endif

                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Contrato
                                    </th>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        <div>
                                            <a href="{{ asset("/storage/{$empleado->contrato}") }}" target="_blank" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 border border-green-700 rounded ">Ver</a>

                                            <a href="{{ asset("/storage/{$empleado->contrato}") }}" download class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded px-5"> Descargar</a>
                                      </div>
                                    </td>
                                </tr>

                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Documento de confidencialidad
                                    </th>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        <div>
                                            <a href="{{ asset("/storage/{$empleado->doc_confidencialidad}") }}" target="_blank" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 border border-green-700 rounded ">Ver</a>

                                            <a href="{{ asset("/storage/{$empleado->doc_confidencialidad}") }}" download class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded px-5"> Descargar</a>
                                      </div>
                                    </td>
                                </tr>

                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Documento de normas
                                    </th>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        <div>
                                            <a href="{{ asset("/storage/{$empleado->doc_normas}") }}" target="_blank" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 border border-green-700 rounded ">Ver</a>

                                            <a href="{{ asset("/storage/{$empleado->doc_normas}") }}" download class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded px-5"> Descargar</a>
                                      </div>
                                    </td>
                                </tr>

                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Documento de prevención de riesgos
                                    </th>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        <div>
                                            <a href="{{ asset("/storage/{$empleado->doc_prevencion_riesgos}") }}" target="_blank" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 border border-green-700 rounded ">Ver</a>

                                            <a href="{{ asset("/storage/{$empleado->doc_prevencion_riesgos}") }}" download class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded px-5"> Descargar</a>
                                      </div>
                                    </td>
                                </tr>

                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Documento de reglamento interno
                                    </th>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        <div>
                                            <a href="{{ asset("/storage/{$empleado->doc_reglamento_interno}") }}" target="_blank" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 border border-green-700 rounded ">Ver</a>

                                            <a href="{{ asset("/storage/{$empleado->doc_reglamento_interno}") }}" download class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded px-5"> Descargar</a>
                                      </div>
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
