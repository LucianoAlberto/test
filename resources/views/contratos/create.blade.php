<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nuevo Contrato : <a class="text-red-500 uppercase underline" href="{{route('clientes.show',$cliente)}} {{$cliente->apellidos}}"> {{$cliente->nombre}} {{$cliente->apellidos}}</a>
        </h2>
           <label>Crear Nuevo concepto
              <x-mi_boton></x-mi_boton>
           </label>
    </x-slot>


    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">

        {{--Formulario para un Nuevo concepto--}}
    {{-- Formulario para un Nuevo concepto --}}
    <div class="w-full max-w-xs  m-auto mt-5 mb-5" id='nuevoConcepto' hidden>

        <form class="bg-gray-300 shadow-md rounded mb-4" action="{{ route('conceptos.store') }}"
            method="POST" enctype="multipart/form-data">
            <div class="flex justify-end">
                <x-boton2 tipo="div" class="bg-red-600 hover:bg-red-700 w-8 h-8" onclick="closeNuevoConcepto()">
                    <x-slot name="boton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </x-slot>
                </x-boton2>
            </div>
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2 px-8" for="nuevoConcepto">
                    Nombre Concepto
                </label>
                <input
                    class="shadow appearance-none border border-black rounded py-2 mx-8 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="nuevoConcepto" required>
                @error('nuevoConcepto')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-center mb-4">
                <button
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Crear Concepto
                </button>
            </div>
        </form>

        {{--Eliminar concepto--}}

        <form class="bg-gray-300 shadow-md rounded pt-6 mb-4" action="{{ route('conceptos.eliminar') }}"
            method="POST" enctype="multipart/form-data">
            <div class="flex justify-end">
                <x-boton2 tipo="div" class="bg-red-600 hover:bg-red-700 w-8 h-8" onclick="closeNuevoConcepto()">
                    <x-slot name="boton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </x-slot>
                </x-boton2>
            </div>
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nuevoConcepto">
                    Eliminar Concepto
                </label>
                <select name="eliminarConcepto" id="eliminarConcepto">
                    @foreach ($conceptos as $concepto)
                        <option value="{{ $concepto->nombre }}"
                            {{ old('concepto') == $concepto->id ? 'selected' : '' }}>
                                {{$concepto->nombre}}
                        </option>
                    @endforeach
                </select>

                </select>
                @error('eliminaConcepto')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-center">
                <button
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Eliminar Concepto
                </button>
            </div>
        </form><hr>
    </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('contratos.store', $cliente) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="flex justify-between mb-8">
                                <div class="w-2/5 mr-2">
                                    <label for="concepto" class="block font-medium text-sm text-gray-700">Concepto</label>

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


                                <div class="w-2/5 mx-2">
                                    <label for="referencia" class="block font-medium text-sm text-gray-700">Referencia</label>
                                    <input type="text" name="referencia" id="referencia" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('referencia', '') }}" >

                                    @error('referencia')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-1/5 ml-2">
                                    <label for="fecha_firma" class="block font-medium text-sm text-gray-700">Fecha</label>
                                    <input type="date" name="fecha_firma" id="fecha_firma" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('fecha_firma', '') }}" >

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
                                        value="{{ old('base_imponible', '') }}" >

                                    @error('base_imponible')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-1/5 mx-2">
                                    <label for="iva" class="block font-medium text-sm text-gray-700">IVA</label>
                                    <input type="text" name="iva" id="iva" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('iva', '') }}" >

                                    @error('iva')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-1/5 mx-2">
                                    <label for="irpf" class="block font-medium text-sm text-gray-700">IRPF</label>
                                    <input type="text" name="irpf" id="irpf" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('irpf', '') }}" >

                                    @error('irpf')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-2/5 ml-2">
                                    <label for="total" class="block font-medium text-sm text-gray-700">TOTAL</label>
                                    <input type="text" name="total" id="total" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('total', '') }}" >

                                    @error('total')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="flex justify-between mb-8">
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
    </div>
</x-app-layout>
