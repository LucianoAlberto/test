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

                <div class="block  mx-2">
                    <a href="{{route('pagos.index',$cliente)}}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Pagos</a>
                </div>
            </div>
        </div>
    </x-slot>
        <!---Fin menu superior-->

    {{-- Formulario para crear un nuevo pago --}}
    <div class="w-full max-w-xs  m-auto mt-5" id='nuevo_pago'>
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('pagos.update', ['cliente' => $cliente, 'pago' => $pago]) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha">
                    Fecha Pago
                </label>
                <input
                    class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="fecha" type="date" name="fecha" required
                    value="{{ old('fecha', $pago->fecha)}}">
                @error('fecha')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="abonado">
                    Importe Abonado
                </label>
                <input
                    class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="abonado" type="text" name="abonado" required pattern="^\d+(\.\d{2})?$"
                    value="{{ old('abonado', $pago->abonado)}}">
                @error('abonado')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="pendiente">
                    Importe Pendiente
                </label>
                <input
                    class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="pendiente" type="text" name="pendiente" required pattern="^\d+(\.\d{2})?$"
                    value="{{ old('pendiente', $pago->pendiente)}}">
                @error('pendiente')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="referencia">
                    Referencia Contrato
                </label>
                <select
                    class="shadow appearance-none border border-black rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="referencia" name="referencia" required>
                    <option value="0" {{ $pago->referencia == NULL ? 'selected' :'' }}>Sin Contrato</option>
                    @foreach ($cliente->contratos as $contrato)
                        <option value={{ $contrato->referencia }} {{ $contrato->referencia == $pago->referencia ? 'selected' :'' }}>{{ $contrato->referencia }}</option>
                    @endforeach

                </select>
                @error('referencia')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <div class="flex items-center justify-center">
                <button
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
