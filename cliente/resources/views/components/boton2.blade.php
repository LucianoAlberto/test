@props(['tipo', 'direccion'])


@if ($tipo == "div")
    <div {{ $attributes->merge(['class' => 'flex justify-center items-center text-white py-2 rounded-md text-1xl font-medium transition duration-300 cursor-pointer'])}}>
        {{ $boton }}
    </div>
@endif

@if ($tipo == "divAbsolute")
    <div {{ $attributes->merge(['class' => 'flex space-x-2 justify-start absolute flex justify-center text-white px-4 py-2 rounded-md text-1xl font-medium transition duration-300 cursor-pointer'])}}>
        {{ $boton }}
    </div>
@endif

@if ($tipo == "link")
    <div class="flex space-x-2 justify-center">
        <a href="{{ $direccion }}" {{ $attributes->merge(['class' => 'flex justify-around items-center text-white rounded-md text-1xl font-medium transition duration-300'])}}>{{ $boton }}</a>
    </div>
@endif

@if ($tipo == "linkConAsset")
    <div {{ $attributes->merge(['class' => 'flex  space-x-2 justify-center items-center text-white rounded-md text-1xl font-medium transition duration-300'])}}>
        <a href="{{ asset("/storage/$direccion") }}" target="_blank" class=" flex justify-center w-full">{{ $boton }}</a>
    </div>
@endif

@if ($tipo == "input")
    <div {{ $attributes->merge(['class' => 'space-x-2 flex justify-center text-white rounded-md text-1xl font-medium transition duration-300'])}}>
        <button class="flex items-center justify-center">
            {{ $boton }}
        </button>
    </div>
@endif

@if ($tipo == "descarga")
    <div class="flex space-x-2 justify-center">
        <a href="{{ $direccion }}" {{ $attributes->merge(['class' => 'flex justify-center text-white px-4 py-2 rounded-md text-1xl font-medium transition duration-300'])}} download>{{ $boton }}</a>
    </div>
@endif

@if ($tipo == "descargaConAsset")
    <div class="flex space-x-2 justify-center">
        <a href="{{ asset("/storage/$direccion") }}" {{ $attributes->merge(['class' => 'flex justify-center text-white px-4 py-2 rounded-md text-1xl font-medium transition duration-300'])}} download>{{ $boton }}</a>
    </div>
@endif

@if ($tipo == "submit")
    <div class="flex space-x-2 justify-center">
        <button type="submit" {{ $attributes->merge(['class' => 'flex justify-center text-white px-4 py-2 rounded-md text-1xl font-medium transition duration-300'])}}>
            {{ $boton }}
        </button>
    </div>
@endif
