<x-app-layout>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Document</title>
    <style>
        /* Estilos adicionales para mejorar la responsividad */
        .responsive-card {
            width: 100%;
            max-width: 70rem;
            margin: 0 auto;
        }
        
        .responsive-title {
            font-size: clamp(2rem, 5vw, 4.5rem);
        }
        
        .responsive-image {
            height: auto;
            max-height: 20rem;
        }
        
        @media (max-width: 768px) {
            .responsive-actions {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .responsive-actions a, 
            .responsive-actions form,
            .responsive-actions button {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body class="min-h-screen flex flex-col items-center justify-center p-4" style="background: url('/img/logo_body.jpg') no-repeat center center fixed; background-size: cover;">
    @php
        $imagenesVete = [
            'VetSalud Animal Center' => 'img/vete_center.jpg',
            'Amor Animal Clinica Veterinaria' => 'img/vete_amorAnimal.png',
            'HuellaFeliz Vet' => 'img/vete_huellasFelices.jpg',
            '##' => 'img/servi_trata.jpg',
            '##' => 'img/servi_micro.jpg',
            '## Canina' => 'img/servi_esteri.jpg',
            'Esterilizacion Felina'=> 'img/servi_esteriGat.jpg',
            'Examen de Sangre' => 'img/servi_sangr.jpg',
            'Radiografias'=> 'img/servi_Radi.jpg',
            'Atencion de Emergencia' => 'img/servi_urge.jpg',
            'Centro veterinaria Villa Colombia'=> 'img/vete_villacol.jpg'
        ];
    @endphp
    <header class="mb-4 md:mb-8 text-center">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Detalles de la Veterinaria</h1>
    </header>

    <div class="card responsive-card rounded-lg shadow-md" 
         style="background: url('/img/logo_body.jpg') no-repeat center center fixed; 
                background-size: cover;">
   
        <div class="responsive-image overflow-hidden"> 
            <img 
                src="{{ asset($imagenesVete[$veterinaria->nombre] ?? 'img/serve_default.jpg') }}" 
                alt="{{ $veterinaria->nombre }}" 
                class="w-full h-full object-cover" 
            >
        </div>
        
        <!-- Cuerpo de la tarjeta -->
        <div class="p-4 text-black">
            <h3 class="responsive-title font-bold mb-2 text-black">{{ $veterinaria->nombre }}</h3>
            <ul class="space-y-2 text-sm md:text-base">
                <li><span class="font-semibold text-black">Descripción:</span> {{ $veterinaria->descripcion }}</li>
                <li><span class="font-semibold text-black">Teléfono:</span> {{ $veterinaria->telefono }}</li>
                <li><span class="font-semibold text-black">Dirección:</span> {{ $veterinaria->direccion }}</li>
                <li><span class="font-semibold text-black">Horario:</span> {{ $veterinaria->horario }}</li>
            </ul>
        </div>
        
        <!-- Botones de acción -->
        <div class="p-4 flex responsive-actions justify-between items-center gap-2 flex-wrap">
            <a href="{{ route('veterinarias.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded flex-1 text-center">
                Volver
            </a>

            @if(Auth::user()->id_rol == 1)
                <div class="flex space-x-2 gap-2 flex-1 flex-wrap justify-end">
                    <a href="{{ route('veterinarias.edit', $veterinaria->id_veterinaria) }}" class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded flex-1 text-center min-w-max">
                        Editar
                    </a>
                    <form action="{{ route('veterinarias.destroy', $veterinaria->id_veterinaria) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este servicio?')" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded w-full">
                            Eliminar
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>

    <footer class="flex flex-col items-center justify-center w-full mt-8" style="background-image: url('/img/sspi_header.svg'); min-height: 362px;">
        <h1>2025©️</h1>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
</x-app-layout>