<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['nombre', 'apellido', 'dni', 'telefono', 'email'];
    protected $primaryKey = 'id_usuario';
    protected $table = 'usuario';
    use HasFactory;
}
