<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle de la Política') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>{{ $politica->titulo }}</h2>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $politica->id_politica }}</p>
                <p><strong>Contenido:</strong></p>
                <div class="border p-3 rounded mb-3">
                    {!! nl2br(e($politica->contenido)) !!}
                </div>
                <p><strong>Tipo:</strong> {{ $politica->tipo }}</p>
                <p><strong>Versión:</strong> {{ $politica->version }}</p>
                <p><strong>Activa:</strong> {{ $politica->activa ? 'Sí' : 'No' }}</p>
                <p><strong>Fecha de Creación:</strong> {{ $politica->fecha_creacion }}</p>
                <p><strong>Fecha de Actualización:</strong> {{ $politica->fecha_actualizacion ?? '—' }}</p>
                <p><strong>Creado en:</strong> {{ $politica->created_at }}</p>
                <p><strong>Actualizado en:</strong> {{ $politica->updated_at }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('politicas.index') }}" class="btn btn-secondary">Volver</a>
            @if (Auth::user()->id_rol == 1)
                <a href="{{ route('politicas.edit', $politica->id_politica) }}" class="btn btn-warning">Editar</a>
            @endif
            </div>
        </div>
    </div>
</x-app-layout>