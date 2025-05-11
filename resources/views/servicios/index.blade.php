<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Servicios') }}
        </h1>
    </x-slot>

    <div class="py-8" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Listado de Servicios</h2>
                    <p class="text-gray-600 mt-1">Administra todos los servicios veterinarios disponibles</p>
                </div>
                @if (Auth::user()->id_rol == 1)
                    <a href="{{ route('servicios.create') }}" class="btn btn-success bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                        <i class="fas fa-plus mr-2"></i> Nuevo Servicio
                    </a>
                @endif
            </div>

            <div class="grid grid-cols-2 xl:grid-cols-2 md:grid-cols-1 gap-6">
                @php
                    $imagenesServicios = [
                        'Consulta General' => 'img/serve_consulta.jpg',
                        'Vacunacion Felina' => 'img/servi_vacu.jpg',
                        'Vacunacion Canina' => 'img/servi_vacuna.jpg',
                        'Desparacitacion' => 'img/servi_trata.jpg',
                        'Microchip' => 'img/servi_micro.jpg',
                        'Esterilizacion Canina' => 'img/servi_esteri.jpg',
                        'Esterilizacion Felina'=> 'img/servi_esteriGat.jpg',
                        'Examen de Sangre' => 'img/servi_sangr.jpg',
                        'Radiografias'=> 'img/servi_Radi.jpg',
                        'Atencion de Emergencia' => 'img/servi_urge.jpg'
                    ];
                @endphp

                @forelse($servicios as $servicio)
                    <div class="rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-200 flex" style="background-color: #EAA429; border: 2px solid #D8931A;">
                        <!-- Contenedor de imagen -->
                        <div class="w-1/3 h-full flex-shrink-0 bg-amber-500 bg-opacity-90">
                            <a href="{{ $urlsServicios[$servicio->nombre] ?? '#' }}" class="block h-auto">
                                <img 
                                    src="{{ asset($imagenesServicios[$servicio->nombre] ?? 'img/serve_default.jpg') }}" 
                                    alt="{{ $servicio->nombre }}" 
                                    class="w-full h-full object-cover"
                                >
                            </a>
                        </div>

                        <div class="p-4 text-white flex flex-col justify-between h-full">
                            <div class="mb-2">
                                <h3 class="text-xl font-bold">{{ $servicio->nombre }}</h3>
                                <p class="text-sm text-white text-opacity-90 line-clamp-3">{{ $servicio->descripcion ?? 'Sin descripción' }}</p>
                            </div>

                            <div class="flex justify-between text-sm my-2">
                                <span class="bg-black bg-opacity-20 px-2 py-1 rounded">
                                    <h3>Tiempo de Respuesta</h3>
                                    {{ $servicio->duracion_estimada }} min
                                </span>
                                <span class="bg-black bg-opacity-30 px-2 py-1 rounded gap-2">
                                    <H2>Categoria: </H2>{{ $servicio->categoria ?? 'Sin categoría' }}
                                </span>
                            </div>

                            <div class="flex justify-between mt-3">
                                <a href="{{ route('servicios.show', $servicio->id_servicio) }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                                    <i class="fas fa-eye"></i> Ver
                                </a>
                               @if (Auth::user()->id_rol == 1)
                                    <a href="{{ route('servicios.edit', $servicio->id_servicio) }}" class="bg-yellow-500 hover:bg-yellow-600 hover:text-black  text-black  px-4 py-2 rounded">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                
                                
                                    <form action="{{ route('servicios.destroy', $servicio->id_servicio) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este servicio?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded ">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-10 bg-yellow-300 text-gray-700 rounded">
                        <i class="fas fa-paw fa-3x mb-4"></i>
                        <p class="text-xl">No hay servicios registrados</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
