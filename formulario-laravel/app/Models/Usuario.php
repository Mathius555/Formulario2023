<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public $timestamps = false;
    protected $fillable = ['nombre', 'apellido', 'DNI', 'telefono', 'email'];
    protected $primaryKey = 'id_usuario';
    protected $table = 'usuario';
    use HasFactory;
}
