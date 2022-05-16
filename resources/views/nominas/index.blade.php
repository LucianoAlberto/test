<x-app-layout>
    <!--Menu superior-->
    <x-slot name="header">
        <div class="flex justify-between ">
            <h2 class="text-xl text-gray-800 leading-tight font-bold">
                <a class="text-red-500 uppercase underline" href="{{ route('empleados.show', $empleado) }}">
                    {{ $empleado->nombre }} {{ $empleado->apellidos }}</a>
            </h2>

            <div class="flex justify-end ">
                <div class="block  mx-2">
                    <a href=""
                        class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Contratos</a>
                </div>

                <div class="block  mx-2">
                    <a href=""
                        class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Proyectos</a>
                </div>
            </div>
        </div>
    </x-slot>
    <!---Fin menu superior-->

{{-- Formulario para un nueva factura --}}
<div class="w-1/3 mt-5 m-auto" id='nueva_nomina'  hidden>
    <div class="flex justify-center relative ">
        <h3 class="text-center font-bold uppercase w-full py-5 bg-gray-300">Nueva Nomina</h3>
        <x-boton2 tipo="div" class=" absolute right-0 bg-red-600 hover:bg-red-700 w-6 h-6 "
            onclick="cerrarNomina();">
            <x-slot name="boton">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-x">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </x-slot>
        </x-boton2>
    </div>

    <form class="bg-white shadow-md rounded px-8 pt-2 pb-2 mb-2"
        action="{{route('nominas.store',$empleado->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="empleado_id" value="">
        <div class="divPagos mt-8 mb-8">
           
            <div class="contenedorNominas justify-between mb-4">
                <div class="flex mb-4">
                    <div class="w-1/3 divFechaInicioNomina mr-2">
                        <label for="fecha_inicio" class="block font-medium text-sm text-gray-700">Fecha inicio *</label>
                        <input type="date" name="fecha_inicio" class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old("fecha_inicio", '') }}" required/>
                        @error("fecha_inicio")
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-1/3 divFechaFinNomina mx-2 ">
                        <label for="fecha_fin" class="block font-medium text-sm text-gray-700">Fecha fin *</label>
                        <input type="date" name="fecha_fin" class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old("fecha_fin", '') }}" required/>
                        @error("fecha_fin")
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-1/3 divFechaPagoNomina mx-2">
                        <label for="fecha_pago" class="block font-medium text-sm text-gray-700">Fecha de pago *</label>
                        <input type="date" name="fecha_pago" class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old("fecha_pago", '') }}" required />
                        @error('fecha_pago')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-1/2 divHorasNomina mr-2" >
                        <label for="horas_alta_ss]" class="block font-medium text-sm text-gray-700">Horas SS *</label>
                        <input type="text" name="horas_alta_ss" class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old("horas_alta_ss", '') }}"  required/>
                        @error('horas_alta_ss')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex">
                 
                    <div class="w-1/3 divImporteTotalNomina mx-2">
                        <label for="importe_total" class="block font-medium text-sm text-gray-700">Importe nómina *</label>
                        <input type="text" name="importe_total" class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old("importe_total", '') }}"  required/>
                        @error('importe_total')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-1/3 divImportePagadoNomina ml-2">
                        <label for="importe_pagado" class="block font-medium text-sm text-gray-700">Importe pagado *</label>
                        <input type="text" name="importe_pagado" class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old("importe_pagado", '') }}" required />
                        @error('importe_pagado')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="w-1/3 divImportePagadoNomina ml-2">
                        <label for="pago_extra" class="block font-medium text-sm text-gray-700">Pago Extra</label>
                        <input type="text" name="pago_extra" class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old("pago_extra", '') }}" />
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



     {{--Mostramos las nóminas existentes--}}
    <div class="pt-4 pb-4 flex mx-auto ">
        <div class="mx-auto sm:px-6 lg:px-8">
                <div id="contenedor">
                    <div class="mx-auto pb-10 sm:px-6 lg:px-8 ">
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200 w-full ">

                                            <div >
                                                <label class=" justify-center font-bold uppercase w-full py-5 bg-gray-300 flex items-center ">
                                                    Nominas
                                                    <x-boton2 tipo="div"
                                                        class="ml-2 bg-green-800 hover:bg-green-700 w-10 h-10 fill-none "
                                                        onclick="crearNomina()">
                                                        <x-slot name="boton">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg>
                                                        </x-slot>
                                                    </x-boton2>
                                                </label>
                                            </div><hr><hr>
                                            <thead>                                          
                                            <tr >
                                                <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    ID
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Fecha Inicio
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Fecha Fin
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Horas/SS
                                                </th>

                                                <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Importe total
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Importe pagado
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Pago Extra
                                                </th>
                                                @role($rolConPoderes)
                                                <th scope="col" width="200" class="px-6 py-3 bg-gray-50">
                                                    Opciones
                                                </th>
                                                @endrole
                                            </tr>
                                            </thead>

                                            <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($empleado->nominas as $nomina)
                                                <tr class="hover:bg-green-200 cursor-pointer" onclick="detalles('{{ route('nominas.show', ['empleado' => $empleado->id, 'nomina' => $nomina->id]) }}', event)">                                              
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                        {{ $nomina->id }}
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                        {{ $nomina->fecha_inicio }}
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                        {{ $nomina->fecha_fin }}
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                        {{ $nomina->horas_alta_ss }}
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                        {{ $nomina->importe_total }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                        {{ $nomina->importe_pagado }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                        {{ $nomina->pago_extra }}
                                                    </td>
                                                    @role($rolConPoderes)
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex items-start">
                                                        <x-boton2 tipo="link" class="bg-yellow-400 hover:bg-yellow-600 mr-4 w-14 h-14" direccion="{{ route('nominas.edit', ['empleado' => $empleado->id, 'nomina' => $nomina->id]) }}">
                                                            <x-slot name="boton">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                                            </x-slot>
                                                        </x-boton2>

                                                        <form id="{{ $nomina->id }}" class="nomina inline-block" action="{{ route('nominas.destroy', ['empleado' => $empleado->id, 'nomina' => $nomina->id]) }}" method="POST" onclick="deleteConfirm('{{ $nomina->id }}', event)">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                            <x-boton2 tipo="input" nombre="Borrar" class="bg-red-600 hover:bg-red-700 w-14">
                                                                <x-slot name="boton" class="w-full">
                                                                    <svg class="p-2.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                    </svg>
                                                                </x-slot>
                                                            </x-boton2>
                                                        </form>
                                                    </td>
                                                    @endrole
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                        {{-- {{ $clientes->links()}} --}}
                                    </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </div>
 {{-- aviso usando la variable de session --}}
 @if (session('creado') == 'si')
 <script>
     Swal.fire({
         position: 'center',
         icon: 'success',
         title: 'Nomina creada con exito',
         showConfirmButton: false,
         timer: 1500
     })
 </script>
@elseif (session('eliminado') == 'si')
 <script>
     Swal.fire({
         position: 'center',
         icon: 'success',
         title: 'Nomina Eliminada',
         showConfirmButton: false,
         timer: 1500
     })
 </script>
@elseif (session('editado') == 'si')
 <script>
     Swal.fire({
         position: 'center',
         icon: 'success',
         title: 'Datos guardados',
         showConfirmButton: false,
         timer: 1500
     })
 </script>
@elseif (session('conceptoCreado') == 'si')
 <script>
     Swal.fire({
         position: 'center',
         icon: 'success',
         title: 'Nuevo concepto creado',
         showConfirmButton: false,
         timer: 1500
     })
 </script>
@elseif (session('conceptoEliminado') == 'si')
 <script>
     Swal.fire({
         position: 'center',
         icon: 'success',
         title: 'Concepto eliminado',
         showConfirmButton: false,
         timer: 1500
     })
 </script>
@endif
{{-- fin avisos sessiones --}}

    </div>
</x-app-layout>

