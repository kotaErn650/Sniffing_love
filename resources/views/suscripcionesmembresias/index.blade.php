<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Suscripciones de Membresías') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Listado de Suscripciones</h4>
        @if (Auth::user()->id_rol == 1)
    
            <a href="{{ route('suscripcionesmembresias.create') }}" class="btn btn-success">+ Nueva Suscripción</a>
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
                        <th>Usuario</th>
                        <th>Membresía</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Estado</th>
                        <th>Método de Pago</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($suscripciones as $suscripcion)
                        <tr>
                            <td>{{ $suscripcion->id_suscripcion }}</td>
                            <td>{{ $suscripcion->usuario->nombre ?? 'N/A' }}</td>
                            <td>{{ $suscripcion->membresia->nombre ?? 'N/A' }}</td>
                            <td>{{ $suscripcion->fecha_inicio }}</td>
                            <td>{{ $suscripcion->fecha_fin }}</td>
                            <td>
                                @switch($suscripcion->estado)
                                    @case('activa')
                                        <span class="badge bg-success">Activa</span>
                                        @break
                                    @case('cancelada')
                                        <span class="badge bg-danger">Cancelada</span>
                                        @break
                                    @case('vencida')
                                        <span class="badge bg-secondary">Vencida</span>
                                        @break
                                @endswitch
                            </td>
                            <td>{{ $suscripcion->metodo_pago ?? '—' }}</td>
                            <td>
                                <a href="{{ route('suscripcionesmembresias.show', $suscripcion->id_suscripcion) }}" class="btn btn-primary btn-sm">Ver</a>
                            @if (Auth::user()->id_rol == 1)
   
                                <a href="{{ route('suscripcionesmembresias.edit', $suscripcion->id_suscripcion) }}" class="btn btn-warning btn-sm text-white">Editar</a>
                                <form action="{{ route('suscripcionesmembresias.destroy', $suscripcion->id_suscripcion) }}" method="POST" class="d-inline-block" onsubmit="return confirm('¿Eliminar esta suscripción?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No hay suscripciones registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>