<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectoUsuario extends Model
{
    use HasFactory;

    protected $table = 'proyecto_usuario';

    protected $fillable = [
        'project_id',
        'user_id',
        'role',
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyectos::class, 'project_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'user_id');
    }
}

