<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Referidos') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="d-flex justify-content-end mb-3">
        @if (Auth::user()->id_rol == 1)    
            <a href="{{ route('referidos.create') }}" class="btn btn-success">+ Nuevo Registro</a>
        @endif    
        </div>

        <table class="table table-bordered table-hover text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Usuario Referidor</th>
                    <th>Usuario Referido</th>
                    <th>Fecha de Referido</th>
                    <th>Puntos Otorgados</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($referidos as $referido)
                    <tr>
                        <td>{{ $referido->id_referido }}</td>
                        <td>{{ $referido->usuarioReferidor->nombre ?? 'Sin nombre' }}</td>
                        <td>{{ $referido->usuarioReferido->nombre ?? 'Sin nombre' }}</td>
                        <td>{{ $referido->fecha_referido ? $referido->fecha_referido->format('Y-m-d H:i:s') : 'No asignada' }}</td>
                        <td>{{ $referido->puntos_otorgados }}</td>
                        <td>
                            <a href="{{ route('referidos.show', ['referido' => $referido->id_referido]) }}" class="btn btn-primary btn-sm">Ver</a>
                        @if (Auth::user()->id_rol == 1)    
                            <a href="{{ route('referidos.edit', ['referido' => $referido->id_referido]) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('referidos.destroy', ['referido' => $referido->id_referido]) }}" method="POST" class="d-inline">
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