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
               <div class="mt-5 md:mt-0 md:col-span-2" id="contenedorPrincipal">
                   <form method="post" action="{{ route('faltas.update',[$empleado,$falta]) }}" enctype="multipart/form-data">
                       @csrf
                       @method('PUT')
                       <div class="shadow overflow-hidden sm:rounded-md">
                           <h3 class="text-center font-bold uppercase w-full py-4 bg-gray-300">Editando falta {!!      $falta->id !!} </h3>
                           <div class="px-4 py-5 bg-white sm:p-6">
                               <div class=" justify-between mb-1">
                                   <div class="">
   
                                       <div class="flex ">
                                           <div class="w-1/3  mb-4 mr-5">
                                               <label for="fecha_falta" class="block font-medium text-sm text-gray-700">Fecha de la falta</label>
                                               <input type="date" name="fecha_falta" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                   value="{{ old("fecha_falta",$falta->fecha_falta) }}" />
                                               @error("fecha_falta")
                                                   <p class="text-sm text-red-600">{{ $message }}</p>
                                               @enderror
                                           </div>
       
                                           <div class="w-2/16  mb-4 ">
                                               <label for="justificacion" class="block font-medium text-sm text-gray-700 ">Justificada</label>
                                               <input type="checkbox" name="justificacion" class="form-input rounded-md shadow-sm mt-1 block w-full h-10"  
                                               {{$falta->justificacion=='on' ? 'checked':''}}
                                               />
                                               @error("justificacion")
                                                   <p class="text-sm text-red-600">{{ $message }}</p>
                                               @enderror
                                           </div>
                                       </div>
   
                                       <div class="w-full  mb-4">
                                           <label for="notas" class="block font-medium text-sm text-gray-700">Notas</label>
                                           <textarea type="text" name="notas" class="form-input rounded-md shadow-sm mt-1 block w-full " 
                                           rows="10" placeholder="Introduzca los motivos de su falta">{{ old("notas",$falta->notas) }}</textarea>
                                           @error('notas')
                                               <p class="text-sm text-red-600">{{ $message }}</p>
                                           @enderror
                                       </div>  
                                       
                                       <div class="flex  justify-end  sm:px-6">
                                        <button class="inline-flex items-center px-4 py-2 bg-gray-800 hover:scale-125 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                            Guardar Cambios
                                        </button>
                                    </div>
                                   </div>                               
                               </div>
                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </x-app-layout>
   