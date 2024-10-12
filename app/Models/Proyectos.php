<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    use HasFactory;

    protected $table = 'proyectos';

    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    public function tareas()
    {
        return $this->hasMany(Tareas::class, 'project_id');
    }
}

