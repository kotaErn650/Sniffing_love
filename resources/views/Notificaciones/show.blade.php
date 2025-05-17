<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle de la Notificación') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>{{ $notificacion->titulo }}</h2>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $notificacion->id_notificacion }}</p>
                <p><strong>Usuario:</strong> {{ $notificacion->usuario->nombre ?? '—' }}</p>
                <p><strong>Mensaje:</strong></p>
                <div class="border p-3 rounded mb-3">
                    {!! nl2br(e($notificacion->mensaje)) !!}
                </div>
                <p><strong>Tipo:</strong> {{ ucfirst($notificacion->tipo) }}</p>
                <p><strong>Leída:</strong> {{ $notificacion->leida ? 'Sí' : 'No' }}</p>
                <p><strong>Fecha de Creación:</strong> {{ $notificacion->fecha_creacion }}</p>
                <p><strong>Fecha de Lectura:</strong> {{ $notificacion->fecha_leida ?? '—' }}</p>
                <p><strong>URL de Acción:</strong>
                    @if ($notificacion->url_accion)
                        <a href="{{ $notificacion->url_accion }}" target="_blank">{{ $notificacion->url_accion }}</a>
                    @else
                        —
                    @endif
                </p>
                <p><strong>Creado en:</strong> {{ $notificacion->created_at }}</p>
                <p><strong>Actualizado en:</strong> {{ $notificacion->updated_at }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('notificaciones.index') }}" class="btn btn-secondary">Volver</a>
            @if (Auth::user()->id_rol == 1)    
                <a href="{{ route('notificaciones.edit', $notificacion->id_notificacion) }}" class="btn btn-warning">Editar</a>
            @endif
            </div>
        </div>
    </div>
</x-app-layout>