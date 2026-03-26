<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
</head>
<body>

    @extends('layouts.app')

    @section('content')

    <h1>EPISODIOS REGISTRADOS</h1>
    <br>

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('episodios.create') }}" class="btn btn-success mb-3 me-3">
            <i class="fa-solid fa-plus"></i> NUEVO EPISODIO
        </a>

        <form action="{{ route('cerrar') }}" method="POST">
            @csrf
            <button class="btn btn-danger me-3 mb-3">Cerrar Sesion</button>
        </form>
        
        @if(auth()->user()->is_admin)
            <a href="{{ route('admin-dashboard') }}" class="btn btn-secondary mb-3">
                Panel Admin
            </a>
        @endif
        
    </div>
    <br>
    
    <table class="table table-striped table-hover">
        <thead class="table table-dark">
            <tr>
                <th>ID</th>
                <th>TÍTULO</th>
                <th>SERIE</th>
                <th>TEMPORADA</th>
                <th>NÚMERO EPISODIO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($episodios as $episodio)
            <tr>
                <!-- Nombre del campo en la BD -->
                <!-- Se manejan como objetos, no arreglos -->

                <td> {{ $episodio->id }}</td>
                <td> {{ $episodio->titulo }}</td>
                <td> {{ $episodio->serie }}</td>
                <td> {{ $episodio->temporada }}</td>
                <td> {{ $episodio->numero_episodio }}</td>
                <td>
                    <a href="{{ route('episodios.edit', $episodio) }}" class="btn btn-warning">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>

                    <form action="{{ route('episodios.destroy', $episodio) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        
                        <button class="btn btn-danger" onclick="return confirm('¿Eliminar el registro?')">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
</body>
</html>