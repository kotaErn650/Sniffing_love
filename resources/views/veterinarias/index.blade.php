@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Listado de Veterinarias</h1>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>NIT</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Horario</th>
                <th>Activa</th>
                <th>Administrador</th>
                <th>Calificación</th>
                <th>Fecha Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($veterinarias as $v)
                <tr>
                    <td>{{ $v->id_veterinaria }}</td>
                    <td>{{ $v->nombre }}</td>
                    <td>{{ $v->nit ?? 'N/A' }}</td>
                    <td>{{ $v->direccion }}</td>
                    <td>{{ $v->telefono }}</td>
                    <td>{{ $v->email }}</td>
                    <td>{{ $v->horario_apertura }} - {{ $v->horario_cierre }}</td>
                    <td>{{ $v->activa ? 'Sí' : 'No' }}</td>
                    <td>{{ $v->usuarioAdmin->name ?? 'No asignado' }}</td>
                    <td>{{ $v->calificacion_promedio }}</td>
                    <td>{{ $v->fecha_registro->format('Y-m-d H:i') }}</td>
                    <td>
                        <a href="{{ route('veterinarias.show', $v->id_veterinaria) }}" class="btn btn-sm btn-primary">Ver</a>
                        <a href="{{ route('veterinarias.edit', $v->id_veterinaria) }}" class="btn btn-sm btn-warning">Editar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="12" class="text-center">No hay veterinarias registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
