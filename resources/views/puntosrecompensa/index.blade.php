<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Puntos de Recompensa') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('puntosrecompensa.create') }}" class="btn btn-success">+ Nuevo Registro</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Puntos</th>
                        <th>Fecha Asignación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($puntos as $punto)
                        <tr>
                            <td>{{ $punto->id_punto }}</td>
                            <td>{{ $punto->usuario->nombre ?? 'Sin nombre' }}</td>
                            <td>{{ $punto->puntos }}</td>
                            <td>{{ $punto->fecha_actualizacion ? $punto->fecha_actualizacion->format('Y-m-d H:i:s') : 'No asignada' }}</td>
                            <td>
                                <a href="{{ route('puntosrecompensa.show', ['puntosrecompensa' => $punto->id_punto]) }}" class="btn btn-primary btn-sm">Ver</a>
                                <a href="{{ route('puntosrecompensa.edit', ['puntosrecompensa' => $punto->id_punto]) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('puntosrecompensa.destroy', ['puntosrecompensa' => $punto->id_punto]) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>