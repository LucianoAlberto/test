<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar contrato
        </h2>

        <label>Crear Nuevo concepto
            <x-mi_boton></x-mi_boton>
         </label>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">

            {{--Formulario para un Nuevo concepto--}}
    <div class="w-full max-w-xs  m-auto mt-5 mb-5 bg-gray-200"  id='nuevoConcepto' hidden >
        <div class="flex justify-end ">
             <x-ocultar_Div></x-ocultar_Div>
        </div>
        <form class="bg-gray-300 shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{route('conceptos.store', $cliente)}}"  method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="nuevoConcepto">
             Nombre Concepto
            </label>
            <input class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" name="nuevoConcepto" required>
            @error('nuevoConcepto')
                 <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <div class="flex items-center justify-center">
            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
              Crear Concepto
            </button>
          </div>

        </form>
    </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('contratos.update', ['cliente' => $cliente, 'contrato' => $contrato]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="flex justify-between mb-8">
                                <div class="w-2/5 mr-2">
                                    <label for="concepto" class="block font-medium text-sm text-gray-700">Concepto</label>
                                    <select type="text" name="concepto" id="concepto" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                        <option value="">---  Seleccionar Concepto  ---</option>
                                       {{--recuperamos todos los conceptos de la BD para poder selecionar alguno--}}

                                        @foreach ($conceptos as $concepto)

                                            <option value="{{$concepto->id}}" {{$contrato->concepto == $concepto->id ? 'selected':''}}>{{$concepto->nombre}}</option>
                                        @endforeach
                                    </select>
                                    @error('concepto')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div class="w-2/5 mx-2">
                                    <label for="referencia" class="block font-medium text-sm text-gray-700">Referencia</label>
                                    <input type="text" name="referencia" id="referencia" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('referencia', $contrato->referencia) }}" >

                                    @error('referencia')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-1/5 ml-2">
                                    <label for="fecha_firma" class="block font-medium text-sm text-gray-700">Fecha</label>
                                    <input type="date" name="fecha_firma" id="fecha_firma" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('fecha_firma', $contrato->fecha_firma) }}" >

                                    @error('fecha_firma')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                            {{--Formmulario para crear nuevo contrato--}}
                            <div class="flex justify-between mb-8">
                                <div class="w-1/5 mr-2">
                                    <label for="base_imponible" class="block font-medium text-sm text-gray-700">Base Imponible</label>
                                    <input type="text" name="base_imponible" id="base_imponible" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('base_imponible', $contrato->base_imponible) }}" >

                                    @error('base_imponible')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-1/5 mx-2">
                                    <label for="iva" class="block font-medium text-sm text-gray-700">IVA</label>
                                    <input type="text" name="iva" id="iva" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('iva', $contrato->iva) }}" >

                                    @error('iva')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-1/5 mx-2">
                                    <label for="irpf" class="block font-medium text-sm text-gray-700">IRPF</label>
                                    <input type="text" name="irpf" id="irpf" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('irpf', $contrato->irpf) }}" >

                                    @error('irpf')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-2/5 ml-2">
                                    <label for="total" class="block font-medium text-sm text-gray-700">TOTAL</label>
                                    <input type="text" name="total" id="total" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('total', $contrato->total) }}" >

                                    @error('total')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex mb-8 justify-between">
                                <div>
                                    <label for="archivo" class="block font-medium text-sm text-gray-700">Adjuntar contrato</label>
                                    @if($contrato->archivo != null)
                                        <div class="flex">
                                            <x-boton2 tipo="linkConAsset" class="bg-blue-500 hover:bg-blue-700 mr-4 w-16" direccion="{{$contrato->archivo}}">
                                                <x-slot name="boton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                </x-slot>
                                            </x-boton2>

                                            <x-boton2 tipo="descargaConAsset" class="bg-green-500 hover:bg-green-700 mr-4 w-16" direccion="{{$contrato->archivo}}">
                                                <x-slot name="boton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                                </x-slot>
                                            </x-boton2>
                                        </div>
                                    @else
                                        <div class="flex">
                                            <x-boton2 tipo="div" class="bg-slate-300 mr-4 w-16 cursor-not-allowed">
                                                <x-slot name="boton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                </x-slot>
                                            </x-boton2>

                                            <x-boton2 tipo="div" class="bg-slate-300 mr-4 w-16 cursor-not-allowed">
                                                <x-slot name="boton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                                </x-slot>
                                            </x-boton2>
                                        </div>
                                    @endif
                                    <input type="file" name="archivo" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old("archivo", "") }}" />
                                    @error('archivo')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="presupuesto" class="block font-medium text-sm text-gray-700">Adjuntar presupuesto</label>
                                    @if($contrato->archivo != null)
                                        <div class="flex">
                                            <x-boton2 tipo="linkConAsset" class="bg-blue-500 hover:bg-blue-700 mr-4 w-16" direccion="{{$contrato->presupuesto}}">
                                                <x-slot name="boton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                </x-slot>
                                            </x-boton2>

                                            <x-boton2 tipo="descargaConAsset" class="bg-green-500 hover:bg-green-700 mr-4 w-16" direccion="{{$contrato->presupuesto}}">
                                                <x-slot name="boton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                                </x-slot>
                                            </x-boton2>
                                        </div>
                                    @else
                                        <div class="flex">
                                            <x-boton2 tipo="div" class="bg-slate-300 mr-4 w-16 cursor-not-allowed">
                                                <x-slot name="boton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                </x-slot>
                                            </x-boton2>

                                            <x-boton2 tipo="div" class="bg-slate-300 mr-4 w-16 cursor-not-allowed">
                                                <x-slot name="boton">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                                </x-slot>
                                            </x-boton2>
                                        </div>
                                    @endif
                                    <input type="file" name="presupuesto" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old("presupuesto", "") }}" />
                                    @error('presupuesto')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
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
