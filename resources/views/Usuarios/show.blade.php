<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle del Usuario') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Información del usuario</h2>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">ID</dt>
                    <dd class="col-sm-9">{{ $usuario->id_usuario }}</dd>

                    <dt class="col-sm-3">Nombre</dt>
                    <dd class="col-sm-9">{{ $usuario->nombre }}</dd>

                    <dt class="col-sm-3">Apellido</dt>
                    <dd class="col-sm-9">{{ $usuario->apellido }}</dd>

                    <dt class="col-sm-3">Correo Electrónico</dt>
                    <dd class="col-sm-9">{{ $usuario->email }}</dd>

                    <dt class="col-sm-3">Teléfono</dt>
                    <dd class="col-sm-9">{{ $usuario->telefono ?? '—' }}</dd>

                    <dt class="col-sm-3">Dirección</dt>
                    <dd class="col-sm-9">{{ $usuario->direccion ?? '—' }}</dd>

                    <dt class="col-sm-3">Fecha de Nacimiento</dt>
                    <dd class="col-sm-9">{{ $usuario->fecha_nacimiento ? $usuario->fecha_nacimiento->format('Y-m-d') : '—' }}</dd>

                    <dt class="col-sm-3">Género</dt>
                    <dd class="col-sm-9">{{ $usuario->genero ?? '—' }}</dd>

                    <dt class="col-sm-3">Activo</dt>
                    <dd class="col-sm-9">{{ $usuario->activo ? 'Sí' : 'No' }}</dd>

                    <dt class="col-sm-3">Fecha de Registro</dt>
                    <dd class="col-sm-9">{{ $usuario->fecha_registro ?? '—' }}</dd>

                    <dt class="col-sm-3">Último Acceso</dt>
                    <dd class="col-sm-9">{{ $usuario->ultimo_acceso ?? '—' }}</dd>

                    <dt class="col-sm-3">Verificado</dt>
                    <dd class="col-sm-9">{{ $usuario->verificado ? 'Sí' : 'No' }}</dd>
                </dl>

                <a href="{{ route('usuarios.edit', $usuario->id_usuario) }}" class="btn btn-warning">Editar</a>
                <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver al listado</a>
            </div>
        </div>
    </div>
</x-app-layout>