<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0">INICIO DE SESIÓN</h4>
                        </div>
                        <div class="card-body">
                            {{-- Mostrar mensajes de error --}}
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif

                            {{-- Mostrar mensajes de éxito --}}
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('acceso.store') }}" method="POST">
                                @csrf
                                
                                <div class="mb-3">
                                    <label for="email" class="form-label">Correo Electrónico</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                        <input type="email" 
                                               name="email" 
                                               id="email"
                                               class="form-control @error('email') is-invalid @enderror" 
                                               placeholder="correo@ejemplo.com" 
                                               value="{{ old('email') }}"
                                               required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                        <input type="password" 
                                               name="password" 
                                               id="password"
                                               class="form-control @error('password') is-invalid @enderror" 
                                               placeholder="********" 
                                               required>
                                    </div>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa-solid fa-right-to-bracket"></i> INICIAR SESIÓN
                                    </button>
                                </div>
                            </form>

                            <div class="text-center mt-3">
                                <p>¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate aquí</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>
</html>