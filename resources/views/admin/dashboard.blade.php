<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <h4 class="mb-0">
                                <i class="fa-solid fa-shield-hood"></i> 
                                Panel de Administrador
                            </h4>
                        </div>
                        <div class="card-body">
                            <h1 class="text-center mb-4">¡Bienvenido Administrador!</h1>
                            
                            <div class="row mt-4">
                                <div class="col-md-4 mb-3">
                                    <div class="card text-white bg-primary">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <i class="fa-solid fa-film"></i> Episodios
                                            </h5>
                                            <p class="card-text">Gestionar episodios</p>
                                            <a href="{{ route('episodios.index') }}" class="btn btn-light">
                                                Ver episodios
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4 mb-3">
                                    <div class="card text-white bg-success">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <i class="fa-solid fa-users"></i> Usuarios
                                            </h5>
                                            <p class="card-text">Gestionar usuarios</p>
                                            <a href="#" class="btn btn-light">
                                                Ver usuarios
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4 mb-3">
                                    <div class="card text-white bg-warning">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <i class="fa-solid fa-chart-simple"></i> Reportes
                                            </h5>
                                            <p class="card-text">Ver estadísticas</p>
                                            <a href="#" class="btn btn-light">
                                                Ver reportes
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>
</html>