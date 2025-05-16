    <x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Transacciones de Puntos') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('transaccionespuntos.create') }}" class="btn btn-success">+ Nueva Transacción</a>
        </div>

        <table class="table table-bordered table-hover text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Puntos</th>
                    <th>Tipo</th>
                    <th>Motivo</th>
                    <th>Fecha Transacción</th>
                    <th>ID Referencia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transacciones as $transaccion)
                    <tr>
                        <td>{{ $transaccion->id_transaccion }}</td>
                        <td>{{ $transaccion->usuario->nombre ?? 'Sin nombre' }}</td>
                        <td>{{ $transaccion->puntos }}</td>
                        <td>{{ ucfirst($transaccion->tipo) }}</td>
                        <td>{{ $transaccion->motivo ?? '—' }}</td>
                        <td>{{ $transaccion->fecha_transaccion ? $transaccion->fecha_transaccion->format('Y-m-d H:i:s') : 'No asignada' }}</td>
                        <td>{{ $transaccion->id_referencia ?? '—' }}</td>
                        <td>
                            <a href="{{ route('transaccionespuntos.show', ['transaccionespunto' => $transaccion->id_transaccion]) }}" class="btn btn-primary btn-sm">Ver</a>
                            <a href="{{ route('transaccionespuntos.edit', ['transaccionespunto' => $transaccion->id_transaccion]) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('transaccionespuntos.destroy', ['transaccionespunto' => $transaccion->id_transaccion]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta transacción?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>