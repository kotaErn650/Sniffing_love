<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle del Rol') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Información del Rol</h2>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $role->id_rol }}</p>
                <p><strong>Nombre del Rol:</strong> {{ $role->nombre_rol }}</p>
                <p><strong>Descripción:</strong> {{ $role->descripcion ?? 'No disponible' }}</p>
                <p><strong>Fecha de Creación:</strong> {{ $role->created_at ? $role->created_at->format('Y-m-d H:i') : 'No disponible' }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('roles.index') }}" class="btn btn-secondary">Volver al listado</a>
                <a href="{{ route('roles.edit', $role->id_rol) }}" class="btn btn-warning">Editar</a>
            </div>
        </div>
    </div>
</x-app-layout>