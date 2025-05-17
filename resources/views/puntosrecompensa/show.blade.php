<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle del Registro de Puntos') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>{{ $puntosrecompensa->usuario->nombre ?? 'Sin nombre' }}</h2>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $puntosrecompensa->id_punto }}</p>
                <p><strong>Puntos:</strong> {{ $puntosrecompensa->puntos }}</p>
                <p><strong>Fecha de Asignación:</strong>
                    {{ $puntosrecompensa->fecha_actualizacion ? $puntosrecompensa->fecha_actualizacion->format('Y-m-d H:i:s') : '—' }}
                </p>
                <p><strong>Creado en:</strong>
                    {{ $puntosrecompensa->created_at ? $puntosrecompensa->created_at->format('Y-m-d H:i:s') : '—' }}
                </p>
                <p><strong>Actualizado en:</strong>
                    {{ $puntosrecompensa->updated_at ? $puntosrecompensa->updated_at->format('Y-m-d H:i:s') : '—' }}
                </p>
            </div>
            <div class="card-footer">
                <a href="{{ route('puntosrecompensa.index') }}" class="btn btn-secondary">Volver</a>
            @if (Auth::user()->id_rol == 1)    
                <a href="{{ route('puntosrecompensa.edit', $puntosrecompensa->id_punto) }}" class="btn btn-warning">Editar</a>
            @endif
            </div>
        </div>
    </div>
</x-app-layout>
