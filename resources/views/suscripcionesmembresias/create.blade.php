<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Nueva Suscripción') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Formulario de Registro</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('suscripcionesmembresias.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="id_usuario" class="form-label">Usuario</label>
                        <select name="id_usuario" id="id_usuario" class="form-select" required>
                            <option value="">Seleccione un usuario</option>
                            @foreach($usuarios as $usuario)
                                <option value="{{ $usuario->id_usuario }}" {{ old('id_usuario') == $usuario->id_usuario ? 'selected' : '' }}>
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
                                <option value="{{ $membresia->id_membresia }}" {{ old('id_membresia') == $membresia->id_membresia ? 'selected' : '' }}>
                                    {{ $membresia->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" required value="{{ old('fecha_inicio') }}">
                    </div>

                    <div class="mb-3">
                        <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                        <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" required value="{{ old('fecha_fin') }}">
                    </div>

                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select name="estado" id="estado" class="form-select" required>
                            <option value="activa" {{ old('estado') == 'activa' ? 'selected' : '' }}>Activa</option>
                            <option value="cancelada" {{ old('estado') == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                            <option value="vencida" {{ old('estado') == 'vencida' ? 'selected' : '' }}>Vencida</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="metodo_pago" class="form-label">Método de Pago</label>
                        <input type="text" name="metodo_pago" id="metodo_pago" class="form-control" value="{{ old('metodo_pago') }}">
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('suscripcionesmembresias.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-warning text-white">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>