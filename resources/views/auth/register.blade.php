<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Rol (Selección para administradores o valor por defecto para usuarios normales) -->
        @auth
            @if(auth()->user()->id_rol == 1) <!-- Solo visible para administradores -->
                <div class="mt-4">
                    <x-input-label for="id_rol" :value="__('Tipo de Usuario')" />
                    <select id="id_rol" name="id_rol" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                        <option value="">{{ __('Seleccione un rol') }}</option>
                        @foreach($roles as $rol)
                            <option value="{{ $rol->id_rol }}" {{ old('id_rol') == $rol->id_rol ? 'selected' : '' }}>
                                {{ $rol->nombre }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('id_rol')" class="mt-2" />
                </div>
            @else
                <input type="hidden" name="id_rol" value="2"> <!-- Usuario normal por defecto -->
            @endif
        @else
            <input type="hidden" name="id_rol" value="2"> <!-- Usuario normal por defecto -->
        @endauth

        <!-- Nombre -->
        <div class="mt-4">
            <x-input-label for="nombre" :value="__('Nombre')" class="text-black text-xl font-bold"/>
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="given-name" />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>

        <!-- Apellido -->
        <div class="mt-4">
            <x-input-label for="apellido" :value="__('Apellido')" class="text-black text-xl font-bold"/>
            <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" :value="old('apellido')" required autocomplete="family-name" />
            <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="text-black text-xl font-bold"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" class="text-white text-xl font-bold"/>
            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmar Contraseña -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')"class="text-black text-xl font-bold"/>
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Teléfono -->
        <div class="mt-4">
            <x-input-label for="telefono" :value="__('Teléfono')" class="text-black text-xl font-bold"/>
            <x-text-input id="telefono" class="block mt-1 w-full"
                          type="text"
                          name="telefono"
                          :value="old('telefono')"
                          autocomplete="tel" />
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
        </div>

        <!-- Dirección -->
        <div class="mt-4">
            <x-input-label for="direccion" :value="__('Dirección')" class="text-black text-xl font-bold"/>
            <x-text-input id="direccion" class="block mt-1 w-full"
                          type="text"
                          name="direccion"
                          :value="old('direccion')"
                          autocomplete="street-address" />
            <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
        </div>

        <!-- Fecha de Nacimiento -->
        <div class="mt-4">
            <x-input-label for="fecha_nacimiento" :value="__('Fecha de Nacimiento')" class="text-black text-xl font-bold"/>
            <x-text-input id="fecha_nacimiento" class="block mt-1 w-full"
                          type="date"
                          name="fecha_nacimiento"
                          :value="old('fecha_nacimiento')" />
            <x-input-error :messages="$errors->get('fecha_nacimiento')" class="mt-2" />
        </div>

        <!-- Género -->
        <div class="mt-4">
            <x-input-label for="genero" :value="__('Género')" class="text-black text-xl font-bold" />
            <select id="genero" name="genero" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="">{{ __('Seleccione...') }}</option>
                <option value="Masculino" {{ old('genero') == 'Masculino' ? 'selected' : '' }}>{{ __('Masculino') }}</option>
                <option value="Femenino" {{ old('genero') == 'Femenino' ? 'selected' : '' }}>{{ __('Femenino') }}</option>
                <option value="Otro" {{ old('genero') == 'Otro' ? 'selected' : '' }}>{{ __('Otro') }}</option>
                <option value="Prefiero no decir" {{ old('genero') == 'Prefiero no decir' ? 'selected' : '' }}>{{ __('Prefiero no decir') }}</option>
            </select>
            <x-input-error :messages="$errors->get('genero')" class="mt-2" />
        </div>

        <!-- Foto de Perfil -->
        <div class="mt-4">
            <x-input-label for="foto_perfil" :value="__('Foto de Perfil (Opcional)')" class="text-black text-xl font-bold"/>
            <input id="foto_perfil" class="block mt-1 w-full text-sm text-black
                      file:mr-4 file:py-2 file:px-4
                      file:rounded-md file:border-0
                      file:text-sm file:font-semibold
                      file:bg-indigo-50 file:text-indigo-700
                      hover:file:bg-indigo-100"
                   type="file"
                   name="foto_perfil" />
            <x-input-error :messages="$errors->get('foto_perfil')" class="mt-2" />
        </div>

        <!-- Términos y Condiciones -->
        <div class="mt-4">
            <label for="terms" class="flex items-center">
                <input id="terms" type="checkbox" name="terms" required
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-lime-500">
                <span class="ml-2  text-xl text-black">{{ __('Acepto los términos y condiciones') }}</span>
            </label>
            <x-input-error :messages="$errors->get('terms')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-xl text-black hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500" href="{{ route('login') }}">
                {{ __('¿Ya estás registrado?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrarse') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>