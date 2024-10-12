<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TareaEtiqueta extends Model
{
    use HasFactory;

    protected $table = 'tarea_etiqueta';

    protected $fillable = [
        'task_id',
        'label_id',
    ];

    public function tarea()
    {
        return $this->belongsTo(Tareas::class, 'task_id');
    }

    public function etiqueta()
    {
        return $this->belongsTo(Etiquetas::class, 'label_id');
    }
}
