<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Referido') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Modificar información del referido</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('referidos.update', $referido->id_referido) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="id_usuario_referidor" class="form-label">Usuario Referidor</label>
                        <select name="id_usuario_referidor" id="id_usuario_referidor" class="form-control" required>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id_usuario }}" {{ old('id_usuario_referidor', $referido->id_usuario_referidor) == $usuario->id_usuario ? 'selected' : '' }}>
                                    {{ $usuario->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_usuario_referido" class="form-label">Usuario Referido</label>
                        <select name="id_usuario_referido" id="id_usuario_referido" class="form-control" required>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id_usuario }}" {{ old('id_usuario_referido', $referido->id_usuario_referido) == $usuario->id_usuario ? 'selected' : '' }}>
                                    {{ $usuario->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_referido" class="form-label">Fecha de Referido</label>
                        <input type="datetime-local" name="fecha_referido" id="fecha_referido" class="form-control" value="{{ old('fecha_referido', optional($referido->fecha_referido)->format('Y-m-d\TH:i')) }}">
                    </div>

                    <div class="mb-3">
                        <label for="puntos_otorgados" class="form-label">Puntos Otorgados</label>
                        <input type="number" name="puntos_otorgados" id="puntos_otorgados" class="form-control" required value="{{ old('puntos_otorgados', $referido->puntos_otorgados) }}">
                    </div>

                    <button type="submit" class="btn btn-warning">Actualizar Registro</button>
                    <a href="{{ route('referidos.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>