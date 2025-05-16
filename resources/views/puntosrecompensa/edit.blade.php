<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Puntos de Recompensa') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Modificar información del registro</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('puntosrecompensa.update', $puntosrecompensa->id_punto) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="id_usuario" class="form-label">Usuario</label>
                        <select name="id_usuario" id="id_usuario" class="form-control" required>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id_usuario }}"
                                    {{ old('id_usuario', $puntosrecompensa->id_usuario) == $usuario->id_usuario ? 'selected' : '' }}>
                                    {{ $usuario->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="puntos" class="form-label">Puntos</label>
                        <input type="number" name="puntos" id="puntos" class="form-control" required
                               value="{{ old('puntos', $puntosrecompensa->puntos) }}">
                    </div>

                    <div class="mb-3">
                        <label for="fecha_actualizacion" class="form-label">Fecha de Asignación</label>
                        <input type="datetime-local" name="fecha_actualizacion" id="fecha_actualizacion" class="form-control"
                               value="{{ old('fecha_actualizacion', optional($puntosrecompensa->fecha_actualizacion)->format('Y-m-d\TH:i')) }}">
                    </div>

                    <button type="submit" class="btn btn-warning">Actualizar Registro</button>
                    <a href="{{ route('puntosrecompensa.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>