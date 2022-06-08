<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href="{{route('users.index')}}">
                {{--<x-jet-application-mark class="block h-9 w-auto" />--}}
                <img class="w-20" src="{{ url('logo.png') }}" />
             </a>
        </x-slot>

        {{--<x-jet-validation-errors class="mb-4" />--}}
        {{-- {{dd($user)}} --}}
        <form method="POST" action="{{ route('users.update', compact('user')) }}">
            @csrf
            @method('PUT')

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name',$user->name)" required autofocus autocomplete="name" />
                 @error('name')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
                </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email',$user->email)" required />
                @error('email')
                     <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
 
            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required  value="{{old('password',$user->password)}}" />
                 @error('password')
                     <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" value="{{$user->password}}"/>
                @error('password_confirmation')
                    <p class="text-sm text-red-600">{{ $message }}</p>
               @enderror
                </div>
 

            <div class="mt-4">
                <x-jet-label for="rol" value="{{ __('Asignar Rol') }}" />
                <select id="rol" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md mt-1 w-full"  name="rol" required >
                    <
                    @foreach ($roles as $rol)
                    <option value="{{ $rol->id}}"
                        {{ $rol->id == $user->rol ? 'selected' :'' }}>
                        {{ $rol->name }}</option>
                    @endforeach

                </select>
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

            <div class="flex items-center justify-end mt-4">


                <x-jet-button class="ml-4">
                    {{ __('Guardar cambios') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
