<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $table = 'tareas';
    
    protected $fillable = [
        'proyecto_id', 
        'nombre', 
        'descripcion', 
        'estado', 
        'prioridad', 
        'fecha_vencimiento'
    ];

    // Una tarea pertenece a un proyecto
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }
}
