<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TareaUsuario extends Model
{
    use HasFactory;

    protected $table = 'tarea_usuario';
    
    protected $fillable = [
        'tarea_id', 
        'usuario_id', 
        'asignado_en'
    ];

    // Relación con Tarea
    public function tarea()
    {
        return $this->belongsTo(Tarea::class, 'tarea_id');
    }

    // Relación con Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
