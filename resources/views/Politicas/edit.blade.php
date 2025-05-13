<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Política') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Modificar información de la política</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('politicas.update', $politica->id_politica) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" required
                               value="{{ old('titulo', $politica->titulo) }}">
                    </div>

                    <div class="mb-3">
                        <label for="contenido" class="form-label">Contenido</label>
                        <textarea name="contenido" id="contenido" class="form-control" rows="5" required>{{ old('contenido', $politica->contenido) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo</label>
                        <select name="tipo" id="tipo" class="form-control" required>
                            @foreach (['terminos', 'privacidad', 'cancelacion', 'seguridad'] as $tipo)
                                <option value="{{ $tipo }}" {{ old('tipo', $politica->tipo) === $tipo ? 'selected' : '' }}>
                                    {{ ucfirst($tipo) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_creacion" class="form-label">Fecha de Creación</label>
                        <input type="datetime-local" name="fecha_creacion" id="fecha_creacion" class="form-control"
                               value="{{ old('fecha_creacion', \Carbon\Carbon::parse($politica->fecha_creacion)->format('Y-m-d\TH:i')) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_actualizacion" class="form-label">Fecha de Actualización</label>
                        <input type="datetime-local" name="fecha_actualizacion" id="fecha_actualizacion" class="form-control"
                               value="{{ old('fecha_actualizacion', optional($politica->fecha_actualizacion)->format('Y-m-d\TH:i')) }}">
                    </div>

                    <div class="mb-3">
                        <label for="version" class="form-label">Versión</label>
                        <input type="text" name="version" id="version" class="form-control" required
                               value="{{ old('version', $politica->version) }}">
                    </div>

                    <div class="mb-3">
                        <label for="activa" class="form-label">Activa</label>
                        <select name="activa" id="activa" class="form-control" required>
                            <option value="1" {{ old('activa', $politica->activa) == 1 ? 'selected' : '' }}>Sí</option>
                            <option value="0" {{ old('activa', $politica->activa) == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-warning">Actualizar Política</button>
                    <a href="{{ route('politicas.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>