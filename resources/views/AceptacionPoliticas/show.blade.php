<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle de la Aceptación') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Aceptación #{{ $aceptacion->id_aceptacion }}</h2>
            </div>
            <div class="card-body">
                <p><strong>Usuario:</strong> {{ $aceptacion->usuario->nombre ?? '—' }} {{ $aceptacion->usuario->apellido ?? '' }}</p>
                <p><strong>Política:</strong> {{ $aceptacion->politica->titulo ?? '—' }}</p>
                <p><strong>Versión Aceptada:</strong> {{ $aceptacion->version_aceptada }}</p>
                <p><strong>Fecha de Aceptación:</strong> {{ $aceptacion->fecha_aceptacion }}</p>
                <p><strong>Creado en:</strong> {{ $aceptacion->created_at }}</p>
                <p><strong>Actualizado en:</strong> {{ $aceptacion->updated_at ?? '—' }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('aceptacionpoliticas.index') }}" class="btn btn-secondary">Volver</a>
                <a href="{{ route('aceptacionpoliticas.edit', $aceptacion->id_aceptacion) }}" class="btn btn-warning">Editar</a>
            </div>
        </div>
    </div>
</x-app-layout>