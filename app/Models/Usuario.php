<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Cambia esto
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Authenticatable // Cambia Model a Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombres',
        'apellidos',
        'email',
        'password',
    ];

}
