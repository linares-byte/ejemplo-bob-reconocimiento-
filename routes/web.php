<?php

use Illuminate\Support\Facades\Route;
// Usar la ruta del controlador
use App\Http\Controllers\EpisodioController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// Agregar esta ruta con nombre 'login'
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');

Route::middleware(['auth'])->group(function () {
    // Usar los metodos del controlador en la ruta
    Route::resource('episodios', EpisodioController::class);
});

// Ruta para consultar la informacion de un episodio
Route::get('episodio/{id}/edit', [
    EpisodioController::class, 'edit'
])->name('episodios.edit');

// Ruta para actualizar la información
Route::put('episodio/{id}', [
    EpisodioController::class, 'update'
])->name('episodios.update');

//-----------

// Ruta para regresar vista del formulario de registro
Route::get('/register', [
    AuthController::class, 'registerForm'
])->name('register');

// Ruta para registrar usuarios
Route::post('/registro', [
    AuthController::class, 'register'
])->name('registro.store');

//------------

// Ruta para regresar vista de inicio de sesion
Route::get('/acceso', [
    AuthController::class, 'loginForm'
])->name('acceso');

// Ruta para iniciar sesion
Route::post('/acceso',[
    AuthController::class,'login'
])->name('acceso.store');

// Ruta para cerrar sesión
Route::post('/cerrar',[
    AuthController::class, 'logout'
])->name('cerrar');

//
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin-dashboard',[
        AuthController::class, 'adminDashboard'
    ])->name('admin-dashboard');
});