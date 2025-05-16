<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuevo Referido') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Registrar nuevo referido</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('referidos.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="id_usuario_referidor" class="form-label">Usuario Referidor</label>
                        <select name="id_usuario_referidor" id="id_usuario_referidor" class="form-control" required>
                            <option value="">-- Selecciona un usuario --</option>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id_usuario }}" {{ old('id_usuario_referidor') == $usuario->id_usuario ? 'selected' : '' }}>
                                    {{ $usuario->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_usuario_referido" class="form-label">Usuario Referido</label>
                        <select name="id_usuario_referido" id="id_usuario_referido" class="form-control" required>
                            <option value="">-- Selecciona un usuario --</option>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id_usuario }}" {{ old('id_usuario_referido') == $usuario->id_usuario ? 'selected' : '' }}>
                                    {{ $usuario->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_referido" class="form-label">Fecha de Referido</label>
                        <input type="datetime-local" name="fecha_referido" id="fecha_referido" class="form-control" value="{{ old('fecha_referido') }}">
                    </div>

                    <div class="mb-3">
                        <label for="puntos_otorgados" class="form-label">Puntos Otorgados</label>
                        <input type="number" name="puntos_otorgados" id="puntos_otorgados" class="form-control" required value="{{ old('puntos_otorgados') }}">
                    </div>

                    <button type="submit" class="btn btn-warning">Guardar Referido</button>
                    <a href="{{ route('referidos.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
