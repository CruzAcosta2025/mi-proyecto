<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArchivoAdjuntoController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\EtiquetaController;
use App\Http\Controllers\InvitacionController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\UsuarioController;


Route::get('/login', function () {
    return view('auth'); // Asegúrate de que 'auth' sea la vista correcta para el login
})->name('login');


#Route::resource('usuarios', UsuarioController::class);

Route::get('/auth', function () {
    return view('auth');
})->name('auth');


Route::get('/dashboard', function () {
    return view('dashboard'); // Asegúrate de que esta vista exista
})->name('dashboard');


Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'home'])->name('dashboard')->middleware('auth');


Route::get('/proyectos/create', [ProyectoController::class, 'create'])->name('proyectos.create');
Route::post('/proyectos', [ProyectoController::class, 'store'])->name('proyectos.store');
Route::get('/proyectos', [ProyectoController::class, 'index'])->name('proyectos.index');




#Route::apiResource('archivo-adjunto', ArchivoAdjuntoController::class);
#Route::apiResource('comentarios', ComentarioController::class);
#Route::apiResource('etiquetas', EtiquetaController::class);
#Route::apiResource('invitaciones', InvitacionController::class);
#Route::apiResource('proyectos', ProyectoController::class);
#Route::apiResource('tareas', TareaController::class);
#Route::apiResource('usuarios', UsuarioController::class);

