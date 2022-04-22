<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar contrato
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('contratos.update', ['cliente' => $cliente, 'contrato' => $contrato]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="flex justify-between mb-4">
                                <div class="w-1/4">
                                    <label for="concepto" class="block font-medium text-sm text-gray-700">Concepto</label>
                                    <input type="text" name="concepto" id="concepto" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('concepto', $contrato->concepto) }}" />
                                    @error('concepto')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-1/3">
                                    <label for="referencia" class="block font-medium text-sm text-gray-700">Referencia</label>
                                    <input type="text" name="referencia" id="referencia" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('referencia', $contrato->referencia) }}" />
                                    @error('referencia')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-1/4">
                                    <label for="base_imponible" class="block font-medium text-sm text-gray-700">Base imponible</label>
                                    <input type="text" name="base_imponible" id="base_imponible" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('base_imponible', $contrato->base_imponible) }}" />
                                    @error('base_imponible')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex justify-between mb-4">
                                <div class="w-5/12">
                                    <label for="iva" class="block font-medium text-sm text-gray-700">IVA</label>
                                    <input type="text" name="iva" id="iva" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('iva', $contrato->iva) }}" />
                                    @error('iva')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-5/12">
                                    <label for="irpf" class="block font-medium text-sm text-gray-700">IRPF</label>
                                    <input type="text" name="irpf" id="irpf" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('irpf', $contrato->irpf) }}" />
                                    @error('irpf')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex justify-between mb-4">
                                <div>
                                    <label for="total" class="block font-medium text-sm text-gray-700">Total</label>
                                    <input type="text" name="total" id="total" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('total', $contrato->total) }}" />
                                    @error('total')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="fecha_firma" class="block font-medium text-sm text-gray-700">Fecha de la firma</label>
                                    <input type="text" name="fecha_firma" id="fecha_firma" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('fecha_firma', $contrato->fecha_firma) }}" />
                                    @error('fecha_firma')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="archivo" class="block font-medium text-sm text-gray-700">Contrato</label>
                                    <input type="file" name="archivo" id="archivo" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('archivo', $contrato->archivo) }}" />
                                    @error('archivo')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex justify-between mb-4">
                                <div class="w-5/12">
                                    <label for="presupuesto" class="block font-medium text-sm text-gray-700">Presupuesto</label>
                                    <input type="text" name="presupuesto" id="presupuesto" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('presupuesto', $contrato->presupuesto) }}" />
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
