<x-app-layout>
    <!--Menu superior-->
    <x-slot name="header">
        <div class="flex justify-between ">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              <a class="text-red-500 uppercase underline" href="{{route('clientes.show', $cliente)}}"> {{$cliente->nombre}} {{$cliente->apellidos}}</a>
            </h2>

            <div class="flex justify-end "> 
                <div class="block  mx-2">
                    <a href="{{ route('contratos.index', $cliente) }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Contratos</a>
                </div>
    
                <div class="block  mx-2">
                    <a href="{{ route('facturas.index',$cliente) }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Facturas</a>
                </div>
    
                <div class="block  mx-2">
                    <a href="{{route('proyectos.index',$cliente)}}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Proyectos</a>
                </div>
            </div>
        </div>
        </x-slot>

        <!---Fin menu superior-->
    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">

    {{--Formulario para un Nuevo concepto--}}
    <div class="w-1/2 max-w-xs  m-auto mt-5 mb-5 bg-gray-300 border-2" id='nuevoConcepto' hidden >

        <div class="flex justify-end mb-5">
            <x-boton2 tipo="div" class="bg-red-600 hover:bg-red-700 w-6 h-6 " onclick="closeNuevoConcepto()">
                <x-slot name="boton">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </x-slot>
            </x-boton2>
        </div>

        <form class="bg-gray-300  rounded mb-4" action="{{ route('conceptos.store') }}"
            method="POST" enctype="multipart/form-data">            
            @csrf
            <div class="flex justify-between mx-5 place-content-center py-2">
                <input
                    class="shadow appearance-none border border-black rounded py-2 mx-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-3/4"
                    type="text" name="nuevoConcepto" placeholder="Crear nuevo concepto" required>

                    <x-boton2 tipo="input" nombre="Borrar" class="bg-green-600 hover:bg-green-700 w-12">
                        <x-slot name="boton">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                              </svg>
                        </x-slot>
                    </x-boton2>
                @error('nuevoConcepto')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>           
        </form>

        {{--Eliminar concepto--}}

        <form class="bg-gray-300  rounded  mb-4" action="{{ route('conceptos.eliminar') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class=" flex justify-between mx-5 place-content-center py-2">
            
                <select name="eliminarConcepto" id="eliminarConcepto"  class="form-input rounded-md shadow-sm mt-1 block w-3/4 mx-auto">
                    <option value="">Seleciona concepto</option>
                    @foreach ($conceptos as $concepto)
                        <option value="{{ $concepto->nombre }}"
                            {{ old('concepto') == $concepto->id ? 'selected' : '' }}>
                                {{$concepto->nombre}}
                        </option>
                    @endforeach
                </select>

                <x-boton2 tipo="input" nombre="Borrar" class="bg-red-600 hover:bg-red-700 w-12 ">
                    <x-slot name="boton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                    </x-slot>
                </x-boton2>
                
                @error('eliminaConcepto')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </form><hr>
    </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('contratos.store', $cliente) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <h3 class="text-center font-bold uppercase w-full py-5 bg-gray-300">Nuevo Contrato</h3>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="flex justify-between mb-4">
                                <div class="w-1/3">
                                    <label for="concepto" class="flex font-medium text-sm text-gray-700">Concepto

                                        <x-boton2 tipo="div" class="ml-1 bg-gray-400 hover:bg-gray-300 w-6 h-6 fill-none " onclick="nuevoConcepto()">
                                            <x-slot name="boton">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-slash-minus" viewBox="0 0 16 16">
                                                    <path d="m1.854 14.854 13-13a.5.5 0 0 0-.708-.708l-13 13a.5.5 0 0 0 .708.708ZM4 1a.5.5 0 0 1 .5.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2A.5.5 0 0 1 4 1Zm5 11a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5A.5.5 0 0 1 9 12Z"/>
                                                  </svg>
                                            </x-slot>
                                        </x-boton2>
                                    </label>

                                    <select type="text" name="concepto" id="concepto" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('concepto', '') }}" >
                                        <option value="">---  Selecionar Concepto  ---</option>
                                       {{--recuperamos todos los conceptos de la BD para poder selecionar alguno--}}
                                        @foreach ($conceptos as $concepto)
                                       <option value="{{$concepto->id}}" {{old('concepto')==$concepto->id ? 'selected':''}}>{{$concepto->nombre}}</option>
                                    @endforeach
                                    </select>
                                    @error('concepto')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div class="w-1/20 mr-5 mt-1">
                                    <label for="referencia" class="block font-medium text-sm text-gray-700">Referencia</label>
                                    <input type="text" name="referencia" id="referencia" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('referencia', '') }}" >

                                    @error('referencia')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-1/4 mr-5 mt-1">
                                    <label for="fecha_firma" class="block font-medium text-sm text-gray-700">Fecha</label>
                                    <input type="date" name="fecha_firma" id="fecha_firma" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('fecha_firma', '') }}" >

                                    @error('fecha_firma')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div><hr>

                            {{--Formmulario para crear nuevo contrato--}}
                            <div class="flex justify-between mb-4  mt-4">
                                <div class="w-1/1 mr-5">
                                    <label for="base_imponible" class="block font-medium text-sm text-gray-700">Base Imponible</label>
                                    <input type="text" name="base_imponible" id="base_imponible" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('base_imponible', '') }}" >

                                    @error('base_imponible')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-1/20 mr-5">
                                    <label for="iva" class="block font-medium text-sm text-gray-700">IVA</label>
                                    <input type="text" name="iva" id="iva" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('iva', '') }}" >

                                    @error('iva')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-1/10 mr-5">
                                    <label for="irpf" class="block font-medium text-sm text-gray-700">IRPF</label>
                                    <input type="text" name="irpf" id="irpf" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('irpf', '') }}" >

                                    @error('irpf')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-1/2 mr-5">
                                    <label for="total" class="block font-medium text-sm text-gray-700">TOTAL</label>
                                    <input type="text" name="total" id="total" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('total', '') }}" >

                                    @error('total')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="flex">
                                <div>
                                    <label for="archivo" class="block font-medium text-sm text-gray-700">Adjuntar contrato</label>
                                    <input type="file" name="archivo" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old("archivo", '') }}" />
                                    @error('archivo')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="presupuesto" class="block font-medium text-sm text-gray-700">Adjuntar presupuesto</label>
                                    <input type="file" name="presupuesto" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old("presupuesto", '') }}" />
                                    @error('presupuesto')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-500 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Crear
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        @if(session('eliminado')=='si')
                <script>alert('Concepto Eliminado con Exito');</script>
            @endif

            @if(session('creado')=='si')
                <script>alert('Concepto Creado con Exito');</script>
            @endif
    </div>
</x-app-layout>
