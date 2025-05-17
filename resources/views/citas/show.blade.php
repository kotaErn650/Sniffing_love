<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles de la Cita</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 40px;
            color: #333;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Contenedor flex para centrar la imagen */
        .header-container {
            display: flex;
            justify-content: center; /* centra horizontal */
            margin-bottom: 20px;
        }

        .header-container img {
            max-height: 200px;
            width: auto;
            border-radius: 12px;
        }

        h1 {
            text-align: center;
            color: #f4a024;
            margin-bottom: 30px;
        }

        p {
            font-size: 16px;
            margin-bottom: 10px;
            padding: 8px;
            background-color: #fffbe6;
            border-left: 5px solid #f4a024;
            border-radius: 6px;
        }

        strong {
            color: #444;
        }

        a {
            display: inline-block;
            margin: 10px 10px 0 0;
            padding: 10px 18px;
            background-color: #f4a024;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #e3921b;
        }
    </style>
</head>
<body>

    <div class="header-container">
        <img src="{{ asset('/img/fondoSnnifing.png') }}" alt="Imagen de encabezado">
    </div>

    <h1>Detalles de la Cita</h1>

    <p><strong>ID:</strong> {{ $cita->id_cita }}</p>
    <p><strong>Veterinaria:</strong> {{ $cita->id_veterinaria }}</p>
    <p><strong>Usuario:</strong> {{ $cita->id_usuario }}</p>
    <p><strong>Mascota:</strong> {{ $cita->id_mascota }}</p>
    <p><strong>Servicio:</strong> {{ $cita->id_veterinaria_servicio }}</p>
    <p><strong>Veterinario:</strong> {{ $cita->id_veterinario ?? 'No asignado' }}</p>
    <p><strong>Fecha y Hora:</strong> {{ $cita->fecha_hora }}</p>
    <p><strong>Estado:</strong> {{ ucfirst($cita->estado) }}</p>
    <p><strong>Motivo:</strong> {{ $cita->motivo ?? 'N/A' }}</p>
    <p><strong>Notas:</strong> {{ $cita->notas ?? 'N/A' }}</p>
    <p><strong>Calificación:</strong> {{ $cita->calificacion ?? 'Sin calificar' }}</p>
    <p><strong>Comentario de la Calificación:</strong> {{ $cita->comentario_calificacion ?? 'N/A' }}</p>
    <p><strong>Fecha de Creación:</strong> {{ $cita->fecha_creacion }}</p>
    <p><strong>Última Actualización:</strong> {{ $cita->fecha_actualizacion ?? 'Sin cambios' }}</p>

    <a href="{{ route('citas.index') }}">← Volver al listado</a>
    <a href="{{ route('citas.edit', $cita->id_cita) }}">Editar</a>
</body>
</html>
