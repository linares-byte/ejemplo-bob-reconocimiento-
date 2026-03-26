<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h4 class="mb-0">REGISTRO DE USUARIOS</h4>
                        </div>
                        <div class="card-body">
                            {{-- Mostrar errores de validación --}}
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- Mostrar mensajes de sesión --}}
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <form action="{{ route('registro.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">Nombre Completo</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                        <input type="text" 
                                               name="name" 
                                               id="name"
                                               class="form-control @error('name') is-invalid @enderror" 
                                               placeholder="Juan Pérez" 
                                               value="{{ old('name') }}"
                                               required>
                                    </div>
                                    @error('name')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

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
                                    @error('email')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Teléfono</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                        <input type="text" 
                                               name="phone" 
                                               id="phone"
                                               class="form-control @error('phone') is-invalid @enderror" 
                                               placeholder="5512345678" 
                                               value="{{ old('phone') }}"
                                               required>
                                    </div>
                                    @error('phone')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
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
                                    <small class="text-muted">Mínimo 8 caracteres</small>
                                    @error('password')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                        <input type="password" 
                                               name="password_confirmation" 
                                               id="password_confirmation"
                                               class="form-control" 
                                               placeholder="********" 
                                               required>
                                    </div>
                                </div>

                                {{-- SOLO MOSTRAR CHECKBOX DE ADMIN SI EL USUARIO ACTUAL ES ADMIN --}}
                                @if(Auth::check() && Auth::user()->is_admin)
                                <div class="mb-3 form-check">
                                    <input type="checkbox" 
                                           name="is_admin" 
                                           class="form-check-input" 
                                           id="is_admin" 
                                           value="1"
                                           {{ old('is_admin') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_admin">
                                        Registrar como administrador
                                    </label>
                                </div>
                                @endif

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa-solid fa-user-plus"></i> REGISTRARSE
                                    </button>
                                </div>
                            </form>

                            <div class="text-center mt-3">
                                <p>¿Ya tienes cuenta? <a href="{{ route('acceso') }}">Inicia sesión aquí</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>
</html>