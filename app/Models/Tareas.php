<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tareas extends Model
{
    use HasFactory;

    protected $table = 'tareas';

    protected $fillable = [
        'title',
        'description',
        'completed',
        'project_id',
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyectos::class, 'project_id');
    }
}

