<x-app-layout>
<x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Veterinarias')}}
        </h1>
    </x-slot>
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ route('veterinarias.create') }}" class="btn btn-success">+ Nueva Veterinaria</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>click en el Enlace!!👇</a></th>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">NIT</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Email</th>
                            <th scope="col">Horario</th>
                            <th scope="col">Activa</th>
                            <th scope="col">Administrador</th>
                            <th scope="col">Calificación</th>
                            <th scope="col">Fecha Registro</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    @php
                        $urls = [
                            'https://www.nexdu.com/co/cali-vac/empresa/animal-center-veterinaria-eps-cali-470233',
                            'https://comunidadamoranimal.com/turnos/',
                            'https://huellitasfelices.com/adoptanos/',
                            // ... más URLs en el mismo orden que las veterinarias
                                ];

                                $imagenes = [
                                '/img/vete_center.jpg',
                                '/img/vete_amorAnimal.png',
                                '/img/vete_huellasFelices.jpg',
                                // ... más imágenes en el mismo orden
                                ];        
                    @endphp
                        @forelse ($veterinarias as $v)
                            
                            <tr>
                                <td>
                                    <a href="{{ $urls[$loop->index] ?? '#' }}">
                                        <img src="{{ $imagenes[$loop->index] ?? '/img/default.jpg' }}" 
                                            alt="Veterinaria" 
                                            style="width: auto; height: auto; object-fit: cover;">
                                    </a>
                                </td>
                                <td>{{ $v->id_veterinaria }}</td>
                                <td>{{ $v->nombre }}</td>
                                <td>{{ $v->nit  ?? 'N/A ' }} </td>
                                <td>{{ $v->direccion }}</td>
                                <td>{{ $v->telefono }}</td>
                                <td>{{ $v->email }}</td>
                                <td>{{ $v->horario_apertura }} - {{ $v->horario_cierre }}</td>
                                <td>
                                    <span class="badge {{ $v->activa ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $v->activa ? 'Sí' : 'No' }}
                                    </span>
                                </td>
                                <td>{{ $v->usuarioAdmin->name ?? 'No asignado' }}</td>
                                <td>{{ $v->calificacion_promedio ?? 'N/A' }}</td>
                                <td>{{ $v->fecha_registro ? $v->fecha_registro->format('Y-m-d H:i') : 'No disponible' }}</td>
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
        </div>
</x-app-layout>

