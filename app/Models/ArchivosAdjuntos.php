<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivosAdjuntos extends Model
{
    use HasFactory;

    protected $table = 'archivos_adjuntos';

    protected $fillable = [
        'task_id',
        'file_path',
        'uploaded_by',
    ];

    public function tarea()
    {
        return $this->belongsTo(Tareas::class, 'task_id');
    }
}
