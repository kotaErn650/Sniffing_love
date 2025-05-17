<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Aceptaciones de Políticas') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Listado de Aceptaciones</h1>
        @if (Auth::user()->id_rol == 1)
            <a href="{{ route('aceptacionpoliticas.create') }}" class="btn btn-success">+ Nueva Aceptación</a>
        @endif
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Política</th>
                        <th>Fecha de Aceptación</th>
                        <th>Versión Aceptada</th>
                        <th>Creado</th>
                        <th>Actualizado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($aceptaciones as $aceptacion)
                        <tr>
                            <td>{{ $aceptacion->id_aceptacion }}</td>
                            <td>{{ $aceptacion->usuario->nombre ?? '—' }} {{ $aceptacion->usuario->apellido ?? '' }}</td>
                            <td>{{ $aceptacion->politica->titulo ?? '—' }}</td>
                            <td>{{ $aceptacion->fecha_aceptacion }}</td>
                            <td>{{ $aceptacion->version_aceptada }}</td>
                            <td>{{ $aceptacion->created_at }}</td>
                            <td>{{ $aceptacion->updated_at ?? '—' }}</td>
                            <td>
                                <a href="{{ route('aceptacionpoliticas.show', $aceptacion->id_aceptacion) }}" class="btn btn-sm btn-primary">Ver</a>
                            @if (Auth::user()->id_rol == 1)
                                <a href="{{ route('aceptacionpoliticas.edit', $aceptacion->id_aceptacion) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('aceptacionpoliticas.destroy', $aceptacion->id_aceptacion) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar esta aceptación?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger text-white" type="submit">Eliminar</button>
                                </form>
                            @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No hay registros de aceptaciones.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>