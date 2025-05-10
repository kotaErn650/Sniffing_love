<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Rol') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Editar Información del Rol</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('roles.update', $role->id_rol) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nombre_rol" class="form-label">Nombre del Rol</label>
                        <input type="text" name="nombre_rol" id="nombre_rol" class="form-control" value="{{ old('nombre_rol', $role->nombre_rol) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="3">{{ old('descripcion', $role->descripcion) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-warning">Actualizar Rol</button>
                    <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>