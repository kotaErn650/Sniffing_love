<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle del Servicio') }}
        </h1>
    </x-slot>

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

    <div class="py-8" style="background-color: #F8F1E0;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Detalle del Servicio</h2>
                    <p class="text-gray-600 mt-1">Consulta los detalles completos de este servicio veterinario</p>
                </div>

                <!-- Mostrar solo si el usuario tiene permisos -->
                @if (Auth::user()->id_rol == 1)
                    <a href="{{ route('servicios.edit', $servicio->id_servicio) }}" class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                @endif
            </div>

            <div class="grid grid-cols-1  md:grid-cols-1 lg:grid-cols-1 gap-6">
                <div class="rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-200 flex" style="background-color: #EAA429; border: 2px solid #D8931A;">
                    <!-- Contenedor de imagen -->
                    <div class="w-1/3 h-full flex-shrink-0 bg-amber-500 bg-opacity-90">
                        <img 
                            src="{{ asset($imagenesServicios[$servicio->nombre] ?? 'img/serve_default.jpg') }}" 
                            alt="{{ $servicio->nombre }}" 
                            class="w-full h-full object-cover"
                        >
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
                            <span class="bg-black bg-opacity-30 px-2 py-1 rounded">
                                <h2>Categoría: </h2>{{ $servicio->categoria ?? 'Sin categoría' }}
                            </span>
                        </div>



                        <div class="flex justify-between mt-3">
                            <!-- Mostrar solo si el usuario tiene permisos para eliminar -->
                             <a href="{{ route('servicios.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                            @if (Auth::user()->id_rol == 1)
                                <a href="{{ route('servicios.create') }}" class="btn btn-success bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                                    <i class="fas fa-plus mr-2"></i> Nuevo Servicio
                                </a>
                                <form action="{{ route('servicios.destroy', $servicio->id_servicio) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este servicio?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                </form>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
