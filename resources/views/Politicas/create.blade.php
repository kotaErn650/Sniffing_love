<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nueva Política') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Registrar nueva política</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('politicas.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" required value="{{ old('titulo') }}">
                    </div>

                    <div class="mb-3">
                        <label for="contenido" class="form-label">Contenido</label>
                        <textarea name="contenido" id="contenido" class="form-control" rows="5" required>{{ old('contenido') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo</label>
                        <select name="tipo" id="tipo" class="form-control" required>
                            <option value="">-- Selecciona un tipo --</option>
                            @foreach (['terminos', 'privacidad', 'cancelacion', 'seguridad'] as $tipo)
                                <option value="{{ $tipo }}" {{ old('tipo') === $tipo ? 'selected' : '' }}>{{ ucfirst($tipo) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_creacion" class="form-label">Fecha de Creación</label>
                        <input type="datetime-local" name="fecha_creacion" id="fecha_creacion" class="form-control" value="{{ old('fecha_creacion') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_actualizacion" class="form-label">Fecha de Actualización</label>
                        <input type="datetime-local" name="fecha_actualizacion" id="fecha_actualizacion" class="form-control" value="{{ old('fecha_actualizacion') }}">
                    </div>

                    <div class="mb-3">
                        <label for="version" class="form-label">Versión</label>
                        <input type="text" name="version" id="version" class="form-control" required value="{{ old('version') }}">
                    </div>

                    <div class="mb-3">
                        <label for="activa" class="form-label">Activa</label>
                        <select name="activa" id="activa" class="form-control" required>
                            <option value="1" {{ old('activa') === '1' ? 'selected' : '' }}>Sí</option>
                            <option value="0" {{ old('activa') === '0' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-warning">Guardar Política</button>
                    <a href="{{ route('politicas.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>