<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle del Referido') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Información del Referido</h2>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $referido->id_referido }}</p>
                <p><strong>Usuario Referidor:</strong> {{ $referido->usuarioReferidor->nombre ?? 'Sin nombre' }}</p>
                <p><strong>Usuario Referido:</strong> {{ $referido->usuarioReferido->nombre ?? 'Sin nombre' }}</p>
                <p><strong>Fecha de Referido:</strong> {{ $referido->fecha_referido }}</p>
                <p><strong>Puntos Otorgados:</strong> {{ $referido->puntos_otorgados }}</p>
                <p><strong>Creado en:</strong> {{ $referido->created_at }}</p>
                <p><strong>Actualizado en:</strong> {{ $referido->updated_at }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('referidos.index') }}" class="btn btn-secondary">Volver</a>
                <a href="{{ route('referidos.edit', $referido->id_referido) }}" class="btn btn-warning">Editar</a>
            </div>
        </div>
    </div>
</x-app-layout> 