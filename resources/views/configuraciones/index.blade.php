<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Configuraciones') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Configuraciones del Sistema</h4>
        @if (Auth::user()->id_rol == 1)
    
            <a href="{{ route('configuraciones.create') }}" class="btn btn-success">+ Nueva Configuración</a>
        @endif
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Clave</th>
                        <th>Valor</th>
                        <th>Descripción</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($configuraciones as $configuracion)
                        <tr>
                            <td>{{ $configuracion->id_configuracion }}</td>
                            <td>{{ $configuracion->clave }}</td>
                            <td>{{ $configuracion->valor }}</td>
                            <td>{{ $configuracion->descripcion ?? '—' }}</td>
                            <td>{{ $configuracion->tipo }}</td>
                            <td>
                                <a href="{{ route('configuraciones.show', $configuracion->id_configuracion) }}" class="btn btn-primary btn-sm">Ver</a>
                            @if (Auth::user()->id_rol == 1)
    
                                <a href="{{ route('configuraciones.edit', $configuracion->id_configuracion) }}" class="btn btn-warning btn-sm text-white">Editar</a>
                                <form action="{{ route('configuraciones.destroy', $configuracion->id_configuracion) }}" method="POST" class="d-inline-block" onsubmit="return confirm('¿Eliminar esta configuración?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay configuraciones registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>