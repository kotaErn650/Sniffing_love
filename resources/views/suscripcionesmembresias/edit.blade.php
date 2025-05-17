<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Suscripción') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Editar Suscripción #{{ $suscripcion->id_suscripcion }}</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('suscripcionesmembresias.update', $suscripcion->id_suscripcion) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="id_usuario" class="form-label">Usuario</label>
                        <select name="id_usuario" id="id_usuario" class="form-select" required>
                            <option value="">Seleccione un usuario</option>
                            @foreach($usuarios as $usuario)
                                <option value="{{ $usuario->id_usuario }}" {{ $suscripcion->id_usuario == $usuario->id_usuario ? 'selected' : '' }}>
                                    {{ $usuario->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_membresia" class="form-label">Membresía</label>
                        <select name="id_membresia" id="id_membresia" class="form-select" required>
                            <option value="">Seleccione una membresía</option>
                            @foreach($membresias as $membresia)
                                <option value="{{ $membresia->id_membresia }}" {{ $suscripcion->id_membresia == $membresia->id_membresia ? 'selected' : '' }}>
                                    {{ $membresia->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" required value="{{ $suscripcion->fecha_inicio }}">
                    </div>

                    <div class="mb-3">
                        <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                        <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" required value="{{ $suscripcion->fecha_fin }}">
                    </div>

                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select name="estado" id="estado" class="form-select" required>
                            <option value="activa" {{ $suscripcion->estado == 'activa' ? 'selected' : '' }}>Activa</option>
                            <option value="cancelada" {{ $suscripcion->estado == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                            <option value="vencida" {{ $suscripcion->estado == 'vencida' ? 'selected' : '' }}>Vencida</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="metodo_pago" class="form-label">Método de Pago</label>
                        <input type="text" name="metodo_pago" id="metodo_pago" class="form-control" value="{{ $suscripcion->metodo_pago }}">
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('suscripcionesmembresias.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-warning text-white">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>