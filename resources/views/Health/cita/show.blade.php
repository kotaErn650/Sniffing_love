<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles de la Cita</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
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

    <div class="image-container">
        <img src="{{ asset('/img/fondoSnnifing.png') }}" alt="Imagen de la cita"> //Logo
    </div>
    

    <a href="{{ route('citas.index') }}">← Volver al listado</a>
    <a href="{{ route('citas.edit', $cita->id_cita) }}">Editar</a>
</body>
</html>
