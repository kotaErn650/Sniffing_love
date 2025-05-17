<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cita</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #f4a024;
        }

        .text-center {
            text-align: center;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }

        img.img-fluid {
            max-width: 100%;
            height: auto;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background: #fffbe6;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="number"],
        input[type="datetime-local"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-top: 5px;
        }

        button[type="submit"] {
            margin-top: 20px;
            background-color: #f4a024;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 10px;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #d98c00;
        }
    </style>
</head>
<body>
    <h1>Editar Cita</h1>

    <div class="text-center mb-4">
        <img src="/img/fondoSnnifing.png" alt="Editar cita" class="img-fluid" style="max-height: 150px;"> {{-- Logo --}}
    </div>

    <form action="{{ route('citas.update', $cita->id_cita) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="id_veterinaria">Veterinaria:</label>
        <input type="number" name="id_veterinaria" value="{{ $cita->id_veterinaria }}" required><br>

        <label for="id_usuario">Usuario:</label>
        <input type="number" name="id_usuario" value="{{ $cita->id_usuario }}" required><br>

        <label for="id_mascota">Mascota:</label>
        <input type="number" name="id_mascota" value="{{ $cita->id_mascota }}" required><br>

        <label for="id_veterinaria_servicio">Servicio:</label>
        <input type="number" name="id_veterinaria_servicio" value="{{ $cita->id_veterinaria_servicio }}" required><br>

        <label for="id_veterinario">Veterinario (opcional):</label>
        <input type="number" name="id_veterinario" value="{{ $cita->id_veterinario }}"><br>

        <label for="fecha_hora">Fecha y hora:</label>
        <input type="datetime-local" name="fecha_hora" value="{{ \Carbon\Carbon::parse($cita->fecha_hora)->format('Y-m-d\TH:i') }}" required><br>

        <label for="estado">Estado:</label>
        <select name="estado" required>
            <option value="pendiente" {{ $cita->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="confirmada" {{ $cita->estado == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
            <option value="completada" {{ $cita->estado == 'completada' ? 'selected' : '' }}>Completada</option>
            <option value="cancelada" {{ $cita->estado == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
            <option value="no_asistio" {{ $cita->estado == 'no_asistio' ? 'selected' : '' }}>No asistió</option>
        </select><br>

        <label for="motivo">Motivo:</label>
        <textarea name="motivo">{{ $cita->motivo }}</textarea><br>

        <label for="notas">Notas:</label>
        <textarea name="notas">{{ $cita->notas }}</textarea><br>

        <label for="calificacion">Calificación (1 a 5):</label>
        <input type="number" name="calificacion" min="1" max="5" value="{{ $cita->calificacion }}"><br>

        <label for="comentario_calificacion">Comentario:</label>
        <textarea name="comentario_calificacion">{{ $cita->comentario_calificacion }}</textarea><br>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
