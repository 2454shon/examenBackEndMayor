<?php

namespace App\Models\Auth;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Persona;
use App\Models\Rol;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios'; // Ajusta si el nombre de la tabla es diferente

    protected $fillable = [
        'persona_id',
        'rol_id',
        'nombre_usuario',
        'contrasena',
        'estado',
    ];

    protected $hidden = [
        'contrasena',
        'remember_token',
    ];

    // Relación con Persona
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    // Relación con Rol
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    // Cambiar el campo de contraseña predeterminado
    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    // Cambiar el campo de identificación para autenticación
    public function getAuthIdentifierName()
    {
        return 'nombre_usuario';
    }
}