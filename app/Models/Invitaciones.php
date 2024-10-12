<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitaciones extends Model
{
    use HasFactory;

    protected $table = 'invitaciones';

    protected $fillable = [
        'project_id',
        'sender_id',
        'receiver_id',
        'status',

    ];
}
