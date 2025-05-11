<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Políticas') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Listado de Políticas</h1>
            <a href="{{ route('politicas.create') }}" class="btn btn-success">+ Nueva Política</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Contenido</th>
                        <th>Tipo</th>
                        <th>Versión</th>
                        <th>Fecha Creación</th>
                        <th>Fecha Actualización</th>
                        <th>Activa</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($politicas as $politica)
                        <tr>
                            <td>{{ $politica->id_politica }}</td>
                            <td>{{ $politica->titulo }}</td>
                            <td>{{ Str::limit($politica->contenido, 100) }}</td>
                            <td>{{ $politica->tipo }}</td>
                            <td>{{ $politica->version }}</td>
                            <td>{{ $politica->fecha_creacion }}</td>
                            <td>{{ $politica->fecha_actualizacion ?? '—' }}</td>
                            <td>{{ $politica->activa ? 'Sí' : 'No' }}</td>
                            <td>
                                <a href="{{ route('politicas.show', $politica->id_politica) }}" class="btn btn-sm btn-primary">Ver</a>
                                <a href="{{ route('politicas.edit', $politica->id_politica) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('politicas.destroy', $politica->id_politica) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar esta política?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger text-white">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">No hay políticas registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>