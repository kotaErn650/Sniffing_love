<!DOCTYPE html>
<html>
<head>
    <title>Listado de Citas</title>
    
    <style>
        
        body {
            
            font-family: 'Arial', sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 20px;

            
            
        }
       


        h1 {
            text-align: center;
            color: #f4a024;
        }

        a {
            display: inline-block;
            margin-bottom: 20px;
            color: white;
            background-color: #f4a024;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #fffbe6;
            border: 1px solid #f4a024;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 10px;
        }

        li a {
            background-color: transparent;
            color: #007BFF;
            margin-right: 10px;
        }

        form {
            display: inline;
        }

        button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 8px;
            cursor: pointer;
        }


    </style>
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('⭐🐩🐾 Dashboard 🐾 🐶⭐') }}
        </h2>
    </x-slot>


<body>

    <h1>Listado de Citas</h1>

    <div class="text-center mb-4">
    <img src="{{ asset('img/fondoSnnifing.png') }}" alt="Crea tu cita" class="img-fluid" style="max-height: 150px; margin: 10 auto; display;">
</div>

    <a href="{{ route('citas.create') }}">Crear nueva cita</a>
    <ul>
        @foreach ($citas as $cita)
            <li>
                <strong>Cita ID:</strong> {{ $cita->id_cita }} <br>
                <strong>Estado:</strong> {{ $cita->estado }} <br>
                <a href="{{ route('citas.show', $cita->id_cita) }}">Ver</a>
                <a href="{{ route('citas.edit', $cita->id_cita) }}">Editar</a>
                <form action="{{ route('citas.destroy', $cita->id_cita) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit";>Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
</x-app-layout>