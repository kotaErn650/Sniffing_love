<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuevo Usuario') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Registrar nuevo usuario</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('usuarios.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required value="{{ old('nombre') }}">
                    </div>

                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" name="apellido" id="apellido" class="form-control" required value="{{ old('apellido') }}">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
                    </div>

                    <div class="mb-3">
                        <label for="contrasena" class="form-label">Contraseña</label>
                        <input type="password" name="contrasena" id="contrasena" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono') }}">
                    </div>

                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion') }}">
                    </div>

                    <div class="mb-3">
                        <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento') }}">
                    </div>

                    <div class="mb-3">
                        <label for="genero" class="form-label">Género</label>
                        <select name="genero" id="genero" class="form-control">
                            <option value="">-- Selecciona un género --</option>
                            @foreach (['Masculino', 'Femenino', 'Otro', 'Prefiero no decirlo'] as $genero)
                                <option value="{{ $genero }}" {{ old('genero') === $genero ? 'selected' : '' }}>{{ $genero }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="activo" class="form-label">Activo</label>
                        <select name="activo" id="activo" class="form-control" required>
                            <option value="1" {{ old('activo') === '1' ? 'selected' : '' }}>Sí</option>
                            <option value="0" {{ old('activo') === '0' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-warning">Guardar Usuario</button>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>