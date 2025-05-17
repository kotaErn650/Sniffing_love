<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Cita</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffffff;
            padding: 20px;
            margin: 0;
        }

        h1 {
            text-align: center;
            color: #f4a024;
        }

        .text-center {
            text-align: center;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fffbe6;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        button {
            margin-top: 20px;
            background-color: #f4a024;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #e29400;
        }
    </style>
</head>
<body>
    <h1>Crear Nueva Cita</h1>

    <div class="text-center mb-4">
        <img src="{{ asset('img/fondoSnnifing.png') }}" alt="Crea tu cita" class="img-fluid" style="max-height: 150px;">
    </div>

    <form action="{{ route('citas.store') }}" method="POST">
        @csrf

        <label for="id_veterinaria">Veterinaria:</label>
        <input type="number" name="id_veterinaria" required><br>

        <label for="id_usuario">Usuario:</label>
        <input type="number" name="id_usuario" required><br>

        <label for="id_mascota">Mascota:</label>
        <input type="number" name="id_mascota" required><br>

        <label for="id_veterinaria_servicio">Servicio:</label>
        <input type="number" name="id_veterinaria_servicio" required><br>

        <label for="id_veterinario">Veterinario (opcional):</label>
        <input type="number" name="id_veterinario"><br>

        <label for="fecha_hora">Fecha y hora:</label>
        <input type="datetime-local" name="fecha_hora" required><br>

        <label for="estado">Estado:</label>
        <select name="estado" required>
            <option value="pendiente">Pendiente</option>
            <option value="confirmada">Confirmada</option>
            <option value="completada">Completada</option>
            <option value="cancelada">Cancelada</option>
            <option value="no_asistio">No asistió</option>
        </select><br>

        <label for="motivo">Motivo:</label>
        <textarea name="motivo"></textarea><br>

        <label for="notas">Notas:</label>
        <textarea name="notas"></textarea><br>

        <label for="calificacion">Calificación (1 a 5):</label>
        <input type="number" name="calificacion" min="1" max="5"><br>

        <label for="comentario_calificacion">Comentario:</label>
        <textarea name="comentario_calificacion"></textarea><br>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>
