<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Aceptación de Política') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Modificar información de la aceptación</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('aceptacionpoliticas.update', $aceptacion->id_aceptacion) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="id_usuario" class="form-label">Usuario</label>
                        <select name="id_usuario" id="id_usuario" class="form-control" required>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id_usuario }}"
                                    {{ old('id_usuario', $aceptacion->id_usuario) == $usuario->id_usuario ? 'selected' : '' }}>
                                    {{ $usuario->nombre }} {{ $usuario->apellido }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_politica" class="form-label">Política</label>
                        <select name="id_politica" id="id_politica" class="form-control" required>
                            @foreach ($politicas as $politica)
                                <option value="{{ $politica->id_politica }}"
                                    {{ old('id_politica', $aceptacion->id_politica) == $politica->id_politica ? 'selected' : '' }}>
                                    {{ $politica->titulo }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_aceptacion" class="form-label">Fecha de Aceptación</label>
                        <input type="datetime-local" name="fecha_aceptacion" id="fecha_aceptacion" class="form-control"
                               value="{{ old('fecha_aceptacion', \Carbon\Carbon::parse($aceptacion->fecha_aceptacion)->format('Y-m-d\TH:i')) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="version_aceptada" class="form-label">Versión Aceptada</label>
                        <input type="text" name="version_aceptada" id="version_aceptada" class="form-control" required
                               value="{{ old('version_aceptada', $aceptacion->version_aceptada) }}">
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-warning">Actualizar Aceptación</button>
                        <a href="{{ route('aceptacionpoliticas.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>