@props(['direccion'])

<div class="flex space-x-2 justify-center">
    <a href="{{ $direccion }}" {{ $attributes->merge(['class' => 'flex justify-center text-white px-4 py-2 rounded-md text-1xl font-medium transition duration-300'])}}>{{ $boton }}</a>
</div>
