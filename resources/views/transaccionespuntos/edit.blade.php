<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Transacción de Puntos') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Modificar información de la transacción</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('transaccionespuntos.update', $transaccionespunto->id_transaccion) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="id_usuario" class="form-label">Usuario</label>
                        <select name="id_usuario" id="id_usuario" class="form-control" required>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id_usuario }}"
                                    {{ old('id_usuario', $transaccionespunto->id_usuario) == $usuario->id_usuario ? 'selected' : '' }}>
                                    {{ $usuario->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="puntos" class="form-label">Puntos</label>
                        <input type="number" name="puntos" id="puntos" class="form-control" required
                               value="{{ old('puntos', $transaccionespunto->puntos) }}">
                    </div>

                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo</label>
                        <select name="tipo" id="tipo" class="form-control" required>
                            @foreach (['ganancia', 'redencion'] as $tipo)
                                <option value="{{ $tipo }}" {{ old('tipo', $transaccionespunto->tipo) === $tipo ? 'selected' : '' }}>
                                    {{ ucfirst($tipo) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="motivo" class="form-label">Motivo</label>
                        <input type="text" name="motivo" id="motivo" class="form-control"
                               value="{{ old('motivo', $transaccionespunto->motivo) }}">
                    </div>

                    <div class="mb-3">
                        <label for="fecha_transaccion" class="form-label">Fecha de Transacción</label>
                        <input type="datetime-local" name="fecha_transaccion" id="fecha_transaccion" class="form-control"
                               value="{{ old('fecha_transaccion', optional($transaccionespunto->fecha_transaccion)->format('Y-m-d\TH:i')) }}">
                    </div>

                    <div class="mb-3">
                        <label for="id_referencia" class="form-label">ID Referencia</label>
                        <input type="number" name="id_referencia" id="id_referencia" class="form-control"
                               value="{{ old('id_referencia', $transaccionespunto->id_referencia) }}">
                    </div>

                    <button type="submit" class="btn btn-warning">Actualizar Transacción</button>
                    <a href="{{ route('transaccionespuntos.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>