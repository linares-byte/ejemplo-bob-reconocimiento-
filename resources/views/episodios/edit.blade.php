<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')

        <h1> EDITAR EPISODIO: {{ $episodio->titulo }} </h1>

        <form action="{{ route('episodios.update', $episodio) }}" method="POST">
            <!-- USO OBLIGATORIO PARA LA ACTUALIZACION -->
            @csrf
            @method('PUT')

            <input type="text" name="titulo" value="{{ $episodio->titulo }}" placeholder="Título" class="form-control">
            <br>
            <input type="text" name="serie" value="{{ $episodio->serie }}" placeholder="Serie" class="form-control">
            <br>
            <input type="number" name="temporada" value="{{ $episodio->temporada }}" placeholder="Temporada" class="form-control">
            <br>
            <input type="number" name="numero_episodio" value="{{ $episodio->numero_episodio }}" placeholder="Número de episodio" class="form-control">
            <br>

            <button type="submit" class="btn btn-success">Guardar</button>

        </form>

        <div class="d-flex justify-content-end">
            <a href="{{ route('episodios.index') }}" class="btn btn-danger">
                Volver
            </a>
        </div>

    @endsection
</body>
</html>