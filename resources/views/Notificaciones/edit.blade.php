<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Notificación') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Modificar notificación</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('notificaciones.update', $notificacion->id_notificacion) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="id_usuario" class="form-label">Usuario</label>
                        <select name="id_usuario" id="id_usuario" class="form-control" required>
                            <option value="">-- Selecciona un usuario --</option>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id_usuario }}" {{ old('id_usuario', $notificacion->id_usuario) == $usuario->id_usuario ? 'selected' : '' }}>
                                    {{ $usuario->nombre }} {{ $usuario->apellido }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" required value="{{ old('titulo', $notificacion->titulo) }}">
                    </div>

                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Mensaje</label>
                        <textarea name="mensaje" id="mensaje" class="form-control" rows="4" required>{{ old('mensaje', $notificacion->mensaje) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo</label>
                        <select name="tipo" id="tipo" class="form-control" required>
                            @foreach (['sistema', 'cita', 'promocion', 'recordatorio'] as $tipo)
                                <option value="{{ $tipo }}" {{ old('tipo', $notificacion->tipo) === $tipo ? 'selected' : '' }}>
                                    {{ ucfirst($tipo) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="leida" class="form-label">Leída</label>
                        <select name="leida" id="leida" class="form-control" required>
                            <option value="1" {{ old('leida', $notificacion->leida) == 1 ? 'selected' : '' }}>Sí</option>
                            <option value="0" {{ old('leida', $notificacion->leida) == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_creacion" class="form-label">Fecha de Creación</label>
                        <input type="datetime-local" name="fecha_creacion" id="fecha_creacion" class="form-control"
                            value="{{ old('fecha_creacion', \Carbon\Carbon::parse($notificacion->fecha_creacion)->format('Y-m-d\TH:i')) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_leida" class="form-label">Fecha de Lectura</label>
                        <input type="datetime-local" name="fecha_leida" id="fecha_leida" class="form-control"
                            value="{{ old('fecha_leida', optional($notificacion->fecha_leida)->format('Y-m-d\TH:i')) }}">
                    </div>

                    <div class="mb-3">
                        <label for="url_accion" class="form-label">URL de Acción</label>
                        <input type="url" name="url_accion" id="url_accion" class="form-control"
                            value="{{ old('url_accion', $notificacion->url_accion) }}">
                    </div>

                    <button type="submit" class="btn btn-warning">Actualizar Notificación</button>
                    <a href="{{ route('notificaciones.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>