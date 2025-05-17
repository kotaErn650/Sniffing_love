<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notificaciones') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Listado de Notificaciones</h1>
        @if (Auth::user()->id_rol == 1)    
            <a href="{{ route('notificaciones.create') }}" class="btn btn-success">+ Nueva Notificación</a>
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
                        <th>Título</th>
                        <th>Mensaje</th>
                        <th>Tipo</th>
                        <th>Leída</th>
                        <th>Fecha Creación</th>
                        <th>Fecha Leída</th>
                        <th>URL Acción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($notificaciones as $notificacion)
                        <tr>
                            <td>{{ $notificacion->id_notificacion }}</td>
                            <td>{{ $notificacion->usuario->nombre ?? '—' }}</td>
                            <td>{{ $notificacion->titulo }}</td>
                            <td>{{ Str::limit($notificacion->mensaje, 50) }}</td>
                            <td>{{ ucfirst($notificacion->tipo) }}</td>
                            <td>{{ $notificacion->leida ? 'Sí' : 'No' }}</td>
                            <td>{{ $notificacion->fecha_creacion }}</td>
                            <td>{{ $notificacion->fecha_leida ?? '—' }}</td>
                            <td>
                                @if ($notificacion->url_accion)
                                    <a href="{{ $notificacion->url_accion }}" target="_blank">Ir</a>
                                @else
                                    —
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('notificaciones.show', $notificacion->id_notificacion) }}" class="btn btn-sm btn-primary">Ver</a>
                            @if (Auth::user()->id_rol == 1)    
                                <a href="{{ route('notificaciones.edit', $notificacion->id_notificacion) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('notificaciones.destroy', $notificacion->id_notificacion) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar esta notificación?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger text-white" type="submit">Eliminar</button>
                                </form>
                            @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">No hay notificaciones registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>