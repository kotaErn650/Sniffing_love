<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle de Configuración') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Información de la Configuración</h2>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $configuracion->id_configuracion }}</p>
                <p><strong>Clave:</strong> {{ $configuracion->clave }}</p>
                <p><strong>Valor:</strong> {{ $configuracion->valor }}</p>
                <p><strong>Descripción:</strong> {{ $configuracion->descripcion ?? '—' }}</p>
                <p><strong>Tipo:</strong> {{ $configuracion->tipo }}</p>
                <p><strong>Creado en:</strong> {{ $configuracion->created_at ? $configuracion->created_at->format('Y-m-d H:i:s') : '—' }}</p>
                <p><strong>Actualizado en:</strong> {{ $configuracion->updated_at ? $configuracion->updated_at->format('Y-m-d H:i:s') : '—' }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('configuraciones.index') }}" class="btn btn-secondary">Volver</a>
            @if (Auth::user()->id_rol == 1)
    
                <a href="{{ route('configuraciones.edit', $configuracion->id_configuracion) }}" class="btn btn-warning text-white">Editar</a>
            @endif
            
            </div>
        </div>
    </div>
</x-app-layout>