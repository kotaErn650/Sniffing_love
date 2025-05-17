<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle de la Membresía') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>{{ $membresia->nombre }}</h2>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $membresia->id_membresia }}</p>
                <p><strong>Descripción:</strong></p>
                <div class="border p-3 rounded mb-3">
                    {!! nl2br(e($membresia->descripcion)) !!}
                </div>
                <p><strong>Precio Mensual:</strong> ${{ number_format($membresia->precio_mensual, 2) }}</p>
                <p><strong>Beneficios:</strong></p>
                <div class="border p-3 rounded mb-3">
                    {!! nl2br(e($membresia->beneficios)) !!}
                </div>
                <p><strong>Duración (días):</strong> {{ $membresia->duracion_dias }}</p>
                <p><strong>Creado en:</strong> {{ $membresia->created_at }}</p>
                <p><strong>Actualizado en:</strong> {{ $membresia->updated_at }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('membresias.index') }}" class="btn btn-secondary">Volver</a>

            @if (Auth::user()->id_rol == 1)    

                
                <a href="{{ route('membresias.edit', $membresia->id_membresia) }}" class="btn btn-warning">Editar</a>
            @endif    
            </div>
        </div>
    </div>
</x-app-layout>