<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Episodios</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')

    <h1>Registrar episodio</h1>
    <form action="{{ route('episodios.store') }}" method="POST">
        <!-- Proteccion añadida por laravel -->
        @csrf

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-film"></i></span>
            <input type="text" name="titulo" placeholder="Título" class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-tv"></i></span>
            <input type="text" name="serie" placeholder="Serie" class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-layer-group"></i></span>
            <input type="number" name="temporada" placeholder="Temporada" class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-hashtag"></i></span>
            <input type="number" name="numero_episodio" placeholder="Número de episodio" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary" value="Guardar"><i class="fa-solid fa-floppy-disk"></i> GUARDAR</button>
    </form>
    
    <a href="{{ route('episodios.index') }}">VER EPISODIOS</a>
    @endsection
</body>
</html>