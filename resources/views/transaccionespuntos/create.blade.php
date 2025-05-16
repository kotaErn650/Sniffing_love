<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nueva Transacción de Puntos') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Registrar nueva transacción</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('transaccionespuntos.store') }}">
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
                        <label for="tipo" class="form-label">Tipo</label>
                        <select name="tipo" id="tipo" class="form-control" required>
                            <option value="">-- Selecciona un tipo --</option>
                            @foreach (['ganancia', 'redencion'] as $tipo)
                                <option value="{{ $tipo }}" {{ old('tipo') === $tipo ? 'selected' : '' }}>{{ ucfirst($tipo) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="motivo" class="form-label">Motivo</label>
                        <input type="text" name="motivo" id="motivo" class="form-control" value="{{ old('motivo') }}">
                    </div>

                    <div class="mb-3">
                        <label for="fecha_transaccion" class="form-label">Fecha de Transacción</label>
                        <input type="datetime-local" name="fecha_transaccion" id="fecha_transaccion" class="form-control" value="{{ old('fecha_transaccion') }}">
                    </div>

                    <div class="mb-3">
                        <label for="id_referencia" class="form-label">ID Referencia</label>
                        <input type="number" name="id_referencia" id="id_referencia" class="form-control" value="{{ old('id_referencia') }}">
                    </div>

                    <button type="submit" class="btn btn-warning">Guardar Transacción</button>
                    <a href="{{ route('transaccionespuntos.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>