<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuevo Registro de Puntos') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Registrar nueva asignación de puntos</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('puntosrecompensa.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="id_usuario" class="form-label">Usuario</label>
                        <select name="id_usuario" id="id_usuario" class="form-control" required>
                            <option value="">-- Selecciona un usuario --</option>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id_usuario }}" {{ old('id_usuario') == $usuario->id_usuario ? 'selected' : '' }}>
                                    {{ $usuario->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="puntos" class="form-label">Puntos</label>
                        <input type="number" name="puntos" id="puntos" class="form-control" required value="{{ old('puntos') }}">
                    </div>

                    <div class="mb-3">
                        <label for="fecha_actualizacion" class="form-label">Fecha de Asignación</label>
                        <input type="datetime-local" name="fecha_actualizacion" id="fecha_actualizacion" class="form-control" value="{{ old('fecha_actualizacion') }}">
                    </div>

                    <button type="submit" class="btn btn-warning">Guardar Registro</button>
                    <a href="{{ route('puntosrecompensa.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>