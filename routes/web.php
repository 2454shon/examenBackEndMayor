<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\RolController;
use App\Models\Auth\Usuario;
use Illuminate\Support\Facades\Route;

// Ruta para la vista welcome, protegida por autenticación
Route::get('/welcome', function () {
    return view('welcome');
})->middleware('admin');


// Rutas de autenticación para iniciar sesion y cerrar sesion
Route::get('/inicio_sesion', [AuthController::class, 'showLoginForm'])->name('inicio_sesion');
Route::post('/inicio_sesion', [AuthController::class, 'inicio_sesion']);
Route::post('/cerrar_sesion', [AuthController::class, 'cerrar_sesion'])->name('cerrar_sesion');

//Rutas para que se registre el usuario 
Route::get('/usuario', [UsuarioController::class, 'create'])->middleware('auth')->name('crear_usuario');
Route::post('/crear_usuario', [UsuarioController::class, 'store'])->middleware('auth')->name('guardar_usuario');
Route::get('/editar_usuario/{id}', [UsuarioController::class, 'edit'])->middleware('auth')->name('editar_usuario');
Route::put('/actualizar_usuario/{id}', [UsuarioController::class, 'update'])->middleware('auth')->name('actualizar_usuario');
Route::delete('/eliminar_usuario/{id}', [UsuarioController::class, 'destroy'])->middleware('auth')->name('eliminar_usuario');
// Ruta para listar usuarios
Route::get('/usuarios', [UsuarioController::class, 'index'])->middleware('auth')->name('auth.index');


// Rutas para registrar personas
Route::get('/crear_persona', [PersonaController::class, 'create'])->middleware('auth')->name('crear_persona');
Route::post('/guardar_persona', [PersonaController::class, 'store'])->middleware('auth')->name('guardar_persona');
Route::delete('/eliminar_persona/{id}', [PersonaController::class, 'destroy'])->middleware('auth')->name('eliminar_persona');
//Ruta para listar personas
Route::get('/personas', [PersonaController::class, 'index'])->middleware('auth')->name('personas.index');


// Rutas para registrar roles
Route::get('/crear_rol', [RolController::class, 'create'])->middleware('auth')->name('crear_rol');
Route::post('/guardar_rol', [RolController::class, 'store'])->middleware('auth')->name('guardar_rol');
Route::delete('/eliminar_rol/{id}', [RolController::class, 'destroy'])->middleware('auth')->name('eliminar_rol');
//Ruta para listar roles
Route::get('/roles', [RolController::class, 'index'])->middleware('auth')->name('roles.index');



