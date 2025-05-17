<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Listado de Usuarios</h1>

        @if (Auth::user()->id_rol == 1)

            <a href="{{ route('usuarios.create') }}" class="btn btn-success">+ Nuevo Usuario</a>
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
                        <th>Rol</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Fecha Nacimiento</th>
                        <th>Género</th>
                        <th>Foto Perfil</th>
                        <th>Fecha Registro</th>
                        <th>Último Acceso</th>
                        <th>Activo</th>
                        <th>Verificado</th>
                        <th>Token Verificación</th>
                        <th>Remember Token</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id_usuario }}</td>
                            <td>{{ $usuario->rol->nombre_rol ?? '—' }}</td>
                            <td>{{ $usuario->nombre }}</td>
                            <td>{{ $usuario->apellido }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->telefono ?? '—' }}</td>
                            <td>{{ $usuario->direccion ?? '—' }}</td>
                            <td>{{ $usuario->fecha_nacimiento ?? '—' }}</td>
                            <td>{{ $usuario->genero ?? '—' }}</td>
                            <td>
                                @if ($usuario->foto_perfil)
                                    <img src="{{ asset('storage/' . $usuario->foto_perfil) }}" alt="Foto" width="50">
                                @else
                                    —
                                @endif
                            </td>
                            <td>{{ $usuario->fecha_registro }}</td>
                            <td>{{ $usuario->ultimo_acceso ?? '—' }}</td>
                            <td>{{ $usuario->activo ? 'Sí' : 'No' }}</td>
                            <td>{{ $usuario->verificado ? 'Sí' : 'No' }}</td>
                            <td>{{ $usuario->token_verificacion ?? '—' }}</td>
                            <td>{{ $usuario->remember_token ?? '—' }}</td>
                            <td>
                                <a href="{{ route('usuarios.show', $usuario->id_usuario) }}" class="btn btn-sm btn-primary">Ver</a>

                            @if (Auth::user()->id_rol == 1)
                                <a href="{{ route('usuarios.edit', $usuario->id_usuario) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('usuarios.destroy', $usuario->id_usuario) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger text-white">Eliminar</button>
                            @endif
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="17" class="text-center">No hay usuarios registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>