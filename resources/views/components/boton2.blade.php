@props(['tipo', 'direccion'])


@if ($tipo == "div")
    <div class="flex space-x-2 justify-center">
        <div {{ $attributes->merge(['class' => 'flex justify-center text-white px-4 py-2 rounded-md text-1xl font-medium transition duration-300'])}}>{{ $boton }}</div>
    </div>
@endif

@if ($tipo == "link")
    <div class="flex space-x-2 justify-center">
        <a href="{{ $direccion }}" {{ $attributes->merge(['class' => 'flex justify-center text-white px-4 py-2 rounded-md text-1xl font-medium transition duration-300'])}}>{{ $boton }}</a>
    </div>
@endif

@if ($tipo == "input")
    <div class="flex space-x-2 justify-center">
        <button {{ $attributes->merge(['class' => 'flex justify-center text-white px-4 py-2 rounded-md text-1xl font-medium transition duration-300'])}}>
            {{ $boton }}
        </button>
    </div>
@endif

