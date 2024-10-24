<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    // Indica la tabla asociada
    protected $table = 'usuarios';

    // Los campos que pueden ser rellenados
    protected $fillable = [
        'nombre',
        'apellidos',
        'password', // Cambiado de 'password' a 'contraseña'
        'email',
        'rol' // Añadido el campo 'rol'
    ];

    // Las fechas se manejarán automáticamente por Laravel
    public $timestamps = true;

    // Ocultar el campo de contraseña cuando se convierta a un arreglo o JSON
    protected $hidden = [
        'password', // Cambiado de 'password' a 'contraseña'
    ];

    // Puedes añadir relaciones aquí si es necesario

    public function tareas()
    {
        return $this->belongsToMany(Tarea::class, 'tarea_usuario', 'usuario_id', 'tarea_id')
            ->withPivot('asignado_en');
    }


    // En el modelo Usuario
    public function proyectos()
    {
        return $this->belongsToMany(Proyecto::class, 'proyecto_usuario', 'usuario_id', 'proyecto_id');
    }
}
