<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ProyectoUsuarioController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\TareaUsuarioController;

Route::get('/login', function () {
    return view('auth'); // Asegúrate de que 'auth' sea la vista correcta para el login
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'home'])->name('dashboard')->middleware('auth');

// RUTAS PARA PROYECTOS
// Mostrar todos los proyectos
Route::get('/proyectos', [ProyectoController::class, 'index'])->name('proyectos.index');

// Mostrar formulario para crear un nuevo proyecto
Route::get('/proyectos/create', [ProyectoController::class, 'create'])->name('proyectos.create');

// Almacenar un nuevo proyecto
Route::post('/proyectos', [ProyectoController::class, 'store'])->name('proyectos.store');

// Mostrar un proyecto específico
Route::get('/proyectos/{id}', [ProyectoController::class, 'show'])->name('proyectos.show');

// Mostrar formulario para editar un proyecto
Route::get('/proyectos/{id}/edit', [ProyectoController::class, 'edit'])->name('proyectos.edit');

// Actualizar un proyecto
Route::put('/proyectos/{id}', [ProyectoController::class, 'update'])->name('proyectos.update');

// Eliminar un proyecto
Route::delete('/proyectos/{id}', [ProyectoController::class, 'destroy'])->name('proyectos.destroy');

// 


// Mostrar todos los proyectos con usuarios asignados
Route::get('/proyecto_usuario', [ProyectoUsuarioController::class, 'index'])->name('proyecto_usuario.index');

// Mostrar formulario para asignar un usuario a un proyecto
Route::get('/proyecto_usuario/create/{id}', [ProyectoUsuarioController::class, 'create'])->name('proyecto_usuario.create');

// Almacenar la asignación de un usuario a un proyecto
Route::post('/proyecto_usuario/{id}', [ProyectoUsuarioController::class, 'store'])->name('proyecto_usuario.store');

// Mostrar formulario para editar la asignación de un usuario a un proyecto
Route::get('/proyecto_usuario/edit/{id}', [ProyectoUsuarioController::class, 'edit'])->name('proyecto_usuario.edit');

// Actualizar la asignación de un usuario a un proyecto
Route::put('/proyecto_usuario/{id}', [ProyectoUsuarioController::class, 'update'])->name('proyecto_usuario.update');

//
Route::delete('/proyecto_usuario/{id}', [ProyectoUsuarioController::class, 'destroy'])->name('proyecto_usuario.destroy');


// RUTAS PARA TAREAS


// Rutas para TareaController
Route::get('tareas', [TareaController::class, 'index'])->name('tareas.index');           // Listar tareas
Route::get('tareas/create', [TareaController::class, 'create'])->name('tareas.create'); // Mostrar formulario para crear una tarea
Route::post('tareas', [TareaController::class, 'store'])->name('tareas.store');         // Almacenar nueva tarea
Route::get('tareas/{id}/edit', [TareaController::class, 'edit'])->name('tareas.edit');  // Mostrar formulario para editar una tarea
Route::put('tareas/{id}', [TareaController::class, 'update'])->name('tareas.update');   // Actualizar tarea
Route::delete('tareas/{id}', [TareaController::class, 'destroy'])->name('tareas.destroy'); // Eliminar tarea
Route::get('tareas/{id}', [TareaController::class, 'show'])->name('tareas.show');      // Mostrar detalles de la tarea


// Rutas para TareaUsuarioController
Route::get('tarea_usuario', [TareaUsuarioController::class, 'index'])->name('tarea_usuario.index');           // Listar tareas y usuarios
Route::get('tarea_usuario/create/{tarea}', [TareaUsuarioController::class, 'create'])->name('tarea_usuario.create'); // Mostrar formulario para asignar usuario
Route::post('tarea_usuario/store', [TareaUsuarioController::class, 'store'])->name('tarea_usuario.store');         // Almacenar asignación de usuario
Route::get('tarea_usuario/edit/{tarea}', [TareaUsuarioController::class, 'edit'])->name('tarea_usuario.edit');    // Mostrar formulario para editar asignación
Route::put('tarea_usuario/update/{tarea}', [TareaUsuarioController::class, 'update'])->name('tarea_usuario.update'); // Actualizar asignación
