<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $table = 'personas'; // Ajusta si el nombre de la tabla es diferente
    protected $fillable = [
    'nombres',
    'apellidos',
    'email',
    'telefono',
    'fecha_nacimiento',
    'genero',
    'direccion'
    ];
}