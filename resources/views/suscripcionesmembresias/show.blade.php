<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle de Suscripción') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Información de la Suscripción</h2>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $suscripcion->id_suscripcion }}</p>
                <p><strong>Usuario:</strong> {{ $suscripcion->usuario->nombre ?? 'No disponible' }}</p>
                <p><strong>Membresía:</strong> {{ $suscripcion->membresia->nombre ?? 'No disponible' }}</p>
                <p><strong>Fecha de Inicio:</strong> {{ $suscripcion->fecha_inicio }}</p>
                <p><strong>Fecha de Fin:</strong> {{ $suscripcion->fecha_fin }}</p>
                <p><strong>Estado:</strong>
                    @switch($suscripcion->estado)
                        @case('activa')
                            <span class="badge bg-success">Activa</span>
                            @break
                        @case('cancelada')
                            <span class="badge bg-danger">Cancelada</span>
                            @break
                        @case('vencida')
                            <span class="badge bg-secondary">Vencida</span>
                            @break
                        @default
                            —
                    @endswitch
                </p>
                <p><strong>Método de Pago:</strong> {{ $suscripcion->metodo_pago ?? '—' }}</p>
                <p><strong>Creado en:</strong> {{ $suscripcion->created_at ? $suscripcion->created_at->format('Y-m-d H:i:s') : '—' }}</p>
                <p><strong>Actualizado en:</strong> {{ $suscripcion->updated_at ? $suscripcion->updated_at->format('Y-m-d H:i:s') : '—' }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('suscripcionesmembresias.index') }}" class="btn btn-secondary">Volver</a>
                <a href="{{ route('suscripcionesmembresias.edit', $suscripcion->id_suscripcion) }}" class="btn btn-warning text-white">Editar</a>
            </div>
        </div>
    </div>
</x-app-layout>