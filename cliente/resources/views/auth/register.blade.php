<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="nombre" value="{{ __('Nombre') }}" />
                <x-jet-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
            </div>

            <div>
                <x-jet-label for="dni" value="{{ __('DNI') }}" />
                <x-jet-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')" required autofocus autocomplete="dni" />
            </div>

            <div>
                <x-jet-label for="telefono" value="{{ __('Teléfono') }}" />
                <x-jet-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required autofocus autocomplete="telefono" />
            </div>

            <div>
                <x-jet-label for="direccion" value="{{ __('Dirección completa') }}" />
                <x-jet-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required autofocus autocomplete="direccion" />
            </div>

            <div>
                <x-jet-label for="codigoPostal" value="{{ __('Código postal') }}" />
                <x-jet-input id="codigoPostal" class="block mt-1 w-full" type="text" name="codigoPostal" :value="old('codigoPostal')" required autofocus autocomplete="codigoPostal" />
            </div>

            <div>
                <x-jet-label for="localidad" value="{{ __('Localidad') }}" />
                <x-jet-input id="localidad" class="block mt-1 w-full" type="text" name="localidad" :value="old('localidad')" required autofocus autocomplete="localidad" />
            </div>

            <div>
                <x-jet-label for="provincia" value="{{ __('Provincia') }}" />
                <x-jet-input id="provincia" class="block mt-1 w-full" type="text" name="provincia" :value="old('provincia')" required autofocus autocomplete="provincia" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <x-boton2 tipo="div" class="ml-1 bg-gray-800 hover:bg-gray-700 hover:scale-125 w-6 h-6 fill-none " onclick="mostrarFormMascota()">
                <x-slot name="boton">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-slash-minus" viewBox="0 0 16 16">
                        <path d="m1.854 14.854 13-13a.5.5 0 0 0-.708-.708l-13 13a.5.5 0 0 0 .708.708ZM4 1a.5.5 0 0 1 .5.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2A.5.5 0 0 1 4 1Zm5 11a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5A.5.5 0 0 1 9 12Z"/>
                      </svg>
                </x-slot>
            </x-boton2>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>

  <!-- Main modal -->
  <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
      <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    @foreach ($tipos as $tipo)
                        <x-jet-label for="peligrosaMascota" value="{{$tipo->nombre}}" />
                        <input name="tipo" type="checkbox" value="{{$tipo->id}}" onChange="mostrarAlergias(event)" />
                    @endforeach
                <div>
                    <x-jet-label for="nombreMascota" value="{{ __('Nombre mascota') }}" />
                    <x-jet-input id="nombreMascota" class="block mt-1 w-full" type="text" name="nombreMascota" :value="old('nombreMascota')" required autofocus autocomplete="nombreMascota" />
                </div>

                <div>
                    <x-jet-label for="edadMascota" value="{{ __('Edad mascota') }}" />
                    <x-jet-input id="edadMascota" class="block mt-1 w-full" type="text" name="edadMascota" :value="old('edadMascota')" required autofocus autocomplete="edadMascota" />
                </div>

                <div>
                    <x-jet-label for="peligrosaMascota" value="{{ __('Peligrosa') }}" />
                    <input name="peligrosa" type="checkbox" value="peligrosa" >
                </div>

                <div>
                    <x-jet-label for="alergia" value="{{ __('¿Tiene alergia?') }}" />
                    {{-- <x-jet-input id="alergiaMascota" class="block mt-1 w-full" type="text" name="alergiaMascota" :value="old('alergiaMascota')" required autofocus autocomplete="alergiaMascota" /> --}}
                    <input name="alergia" type="checkbox" value="{{ old('alergia', '') }}" onChange="mostrarAlergias(event)" />
                </div>

                <div class="hidden" id="inputAlergias">
                    <x-jet-label for="alergia" value="{{ __('Alergias') }}" />
                    {{-- <x-jet-input id="alergiaMascota" class="block mt-1 w-full" type="text" name="alergiaMascota" :value="old('alergiaMascota')" required autofocus autocomplete="alergiaMascota" /> --}}
                    <x-jet-input class="block mt-1 w-full" type="text" name="inputAlergias" :value="old('inputAlergias')" required autofocus autocomplete="inputAlergias" />
                </div>

                <div>
                    <x-jet-label for="alergiaMascota" value="{{ __('Alergia mascota') }}" />
                    <x-jet-input id="alergiaMascota" class="block mt-1 w-full" type="text" name="alergiaMascota" :value="old('alergiaMascota')" required autofocus autocomplete="alergiaMascota" />
                </div>
              </div>

              <x-boton2 tipo="div" class="ml-1 bg-gray-800 hover:bg-gray-700 hover:scale-125 w-6 h-6 fill-none " onclick="ocultarFormMascota()">
                <x-slot name="boton">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-slash-minus" viewBox="0 0 16 16">
                        <path d="m1.854 14.854 13-13a.5.5 0 0 0-.708-.708l-13 13a.5.5 0 0 0 .708.708ZM4 1a.5.5 0 0 1 .5.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2A.5.5 0 0 1 4 1Zm5 11a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5A.5.5 0 0 1 9 12Z"/>
                      </svg>
                </x-slot>
            </x-boton2>
          </div>
      </div>
  </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
