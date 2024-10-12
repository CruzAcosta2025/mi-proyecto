<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiquetas extends Model
{
    use HasFactory;

    protected $table = 'etiquetas';

    protected $fillable = [
        'project_id',
        'name',
        'color',
    ];

    public function proyectos()
    {
        return $this->belongsTo(Proyectos::class, 'project_id');
    }
}
