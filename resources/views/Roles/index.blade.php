<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h1>
    </x-slot>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Listado de Roles</h1>
            <a href="{{ route('roles.create') }}" class="btn btn-success">+ Nuevo Rol</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre del Rol</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha de Creación</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td>{{ $role->id_rol }}</td>
                            <td>{{ $role->nombre_rol }}</td>
                            <td>{{ $role->descripcion ?? 'No disponible' }}</td>
                            <td>{{ $role->created_at ? $role->created_at->format('Y-m-d H:i') : 'No disponible' }}</td>
                            <td>
                                <a href="{{ route('roles.show', $role->id_rol) }}" class="btn btn-sm btn-primary">Ver</a>
                                <a href="{{ route('roles.edit', $role->id_rol) }}" class="btn btn-sm btn-warning">Editar</a>
                                
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No hay roles registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>