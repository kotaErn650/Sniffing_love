<!DOCTYPE html>
<html>
<head>
    <title>Listado de Citas</title>
    
    <style>
        
        body {

              <a href="{{ route('citas.index') }}"
   style="background-image: url('/img/sspi_header.svg');
          background-size: cover;
          background-position: center;
          display: block;
          padding: 30px;
          margin-bottom: 20px;
          text-align: center;
          color: white;
          font-size: 24px;
          font-weight: bold;
          border-radius: 12px;">
    Citas
</a>
        }
       
        .init {
            color: black;

        

        }
        
        .eestado{
            color: black;
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
        .variables{
            color: #000000
        }
            .ver-btn {
    background-color: #4CAF50; /* Verde */
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.ver-btn:hover {
    background-color: #45a049;
    transform: scale(1.05);
    text-decoration: none;
    color: white;
}

        

    </style>
</head>
<body>
    <h1>Listado de Citas</h1>

    <div class="text-center mb-4">
    <img src="{{ asset('img/fondoSnnifing.png') }}" alt="Crea tu cita" class="img-fluid" style="max-height: 150px; margin: 10 auto; display;">
</div>

    <a href="{{ route('citas.create') }}">Crear nueva cita</a>
    <ul>
        @foreach ($citas as $cita)
            <li class="variables">
                <strong class="init">Cita ID:</strong> {{ $cita->id_cita }} <br>
                <strong class="init">Estado:</strong> {{ $cita->estado }} <br>
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
