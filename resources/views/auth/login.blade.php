<x-guest-layout>
    <div class="max-w-md mx-auto p-4 sm:p-6 lg:p-8 bg-white shadow-md rounded-md">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" id="loginForm">
            @csrf
            <input type="hidden" name="password_attempts" id="password_attempts" value="1">
            <input type="hidden" name="expected_password" id="expected_password" value="">

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" id="password_label" />
                <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <!-- Submit + Forgot Password -->
            <div class="flex flex-col sm:flex-row items-center justify-between mt-4 gap-2">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="w-full sm:w-auto" type="button" onclick="validatePassword()">
                    {{ __('Continue') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <script>
        let passwordAttempts = 1;
        let expectedPassword = '';

        function validatePassword() {
            const passwordInput = document.getElementById('password');
            const currentPassword = passwordInput.value;
            const passwordLabel = document.getElementById('password_label');
            
            if (passwordAttempts === 1) {
                // Primera vez: guardar la contraseña y pedirla de nuevo
                expectedPassword = currentPassword;
                passwordAttempts++;
                passwordInput.value = '';
                passwordLabel.textContent = 'Password 2do Intento';
                alert('Deves confirma Passsword ( 2 of 3)');
                passwordInput.focus();
            } else if (passwordAttempts === 2) {
                // Segunda vez: verificar y pedir la tercera
                if (currentPassword !== expectedPassword) {
                    alert('Passwords no es correcto. Inicia de nuevo.');
                    resetPasswordValidation();
                    return;
                }
                passwordAttempts++;
                passwordInput.value = '';
                passwordLabel.textContent = 'Password ';
                alert('Deves confirmar Passsword 3er Intento');
                passwordInput.focus();
            } else if (passwordAttempts === 3) {
                // Tercera vez: verificar y enviar
                if (currentPassword !== expectedPassword) {
                    alert('Passwords no es correcto. Inicia de nuevo.');
                    resetPasswordValidation();
                    return;
                }
                
                // Todas las verificaciones pasaron, enviar formulario
                document.getElementById('password_attempts').value = passwordAttempts;
                document.getElementById('expected_password').value = expectedPassword;
                document.getElementById('loginForm').submit();
            }
        }

        function resetPasswordValidation() {
            passwordAttempts = 1;
            expectedPassword = '';
            document.getElementById('password').value = '';
            document.getElementById('password_label').textContent = 'Password (attempt 1 of 3)';
        }
    </script>
</x-guest-layout>