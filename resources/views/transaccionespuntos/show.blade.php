<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle de la Transacción de Puntos') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Información de la Transacción</h2>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $transaccionespunto->id_transaccion }}</p>
                <p><strong>Usuario:</strong> {{ $transaccionespunto->usuario->nombre ?? 'Sin nombre' }}</p>
                <p><strong>Puntos:</strong> {{ $transaccionespunto->puntos }}</p>
                <p><strong>Tipo:</strong> {{ ucfirst($transaccionespunto->tipo) }}</p>
                <p><strong>Motivo:</strong> {{ $transaccionespunto->motivo ?? '—' }}</p>
                <p><strong>Fecha de Transacción:</strong> {{ $transaccionespunto->fecha_transaccion ? $transaccionespunto->fecha_transaccion->format('Y-m-d H:i:s') : '—' }}</p>
                <p><strong>ID de Referencia:</strong> {{ $transaccionespunto->id_referencia ?? '—' }}</p>
                <p><strong>Creado en:</strong> {{ $transaccionespunto->created_at }}</p>
                <p><strong>Actualizado en:</strong> {{ $transaccionespunto->updated_at }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('transaccionespuntos.index') }}" class="btn btn-secondary">Volver</a>
                <a href="{{ route('transaccionespuntos.edit', $transaccionespunto->id_transaccion) }}" class="btn btn-warning">Editar</a>
            </div>
        </div>
    </div>
</x-app-layout>