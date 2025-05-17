<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Membresías') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="d-flex justify-content-end mb-3">
        @if (Auth::user()->id_rol == 1)    
            <a href="{{ route('membresias.create') }}" class="btn btn-success">+ Nueva Membresía</a>
        @endif    
        </div>

        <table class="table table-bordered table-hover text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio Mensual</th>
                    <th>Beneficios</th>
                    <th>Duración (días)</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($membresias as $membresia)
                    <tr>
                        <td>{{ $membresia->id_membresia }}</td>
                        <td>{{ $membresia->nombre }}</td>
                        <td>{{ $membresia->descripcion ?? '—' }}</td>
                        <td>${{ number_format($membresia->precio_mensual, 2) }}</td>
                        <td>{{ $membresia->beneficios ?? '—' }}</td>
                        <td>{{ $membresia->duracion_dias }}</td>
                        <td>
                            <a href="{{ route('membresias.show', ['membresia' => $membresia->id_membresia]) }}" class="btn btn-primary btn-sm">Ver</a>

                        @if (Auth::user()->id_rol == 1)
                            <a href="{{ route('membresias.edit', ['membresia' => $membresia->id_membresia]) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('membresias.destroy', ['membresia' => $membresia->id_membresia]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
