<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    use HasFactory;

    protected $table = 'comentarios';

    protected $fillable = [
        'task_id',
        'user_id',
        'content',
    ];

    public function tarea()
    {
        return $this->belongsTo(Tareas::class, 'task_id');
    }
}
