<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestUsuario;
use App\Models\Persona;
use App\Models\Rol;
use App\Models\Auth\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los usuarios con sus relaciones
        $usuarios = Usuario::with(['persona', 'rol'])->get();
        return view('auth.index', compact('usuarios'));
    }

        // Mostrar formulario de registro
    public function create()
    {
        // Obtener todas las personas y roles
        $personas = Persona::all();
        $roles = Rol::all();

        return view('auth.registro', compact('personas', 'roles'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestUsuario $request)
    {
        // Validar los datos
        // $request->validate([
        //     'persona_id' => 'required|exists:personas,id',
        //     'rol_id' => 'required|exists:roles,id',
        //     'nombre_usuario' => 'required|string|unique:usuarios,nombre_usuario|max:255',
        //     'contrasena' => 'required|string|min:6',
        //     'estado' => 'required|in:0,1',
        // ]);

        // Crear el usuario
        Usuario::create([
            'persona_id' => $request->persona_id,
            'rol_id' => $request->rol_id,
            'nombre_usuario' => $request->nombre_usuario,
            'contrasena' => Hash::make($request->contrasena),
            'estado' => $request->estado,
        ]);

    // Redirigir a la vista welcome con mensaje de éxito
    return redirect('/welcome')->with('success', 'Usuario registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usuario = Usuario::with(['persona', 'rol'])->findOrFail($id);  // Busca el usuario o error 404
        $personas = Persona::all();  // Para el select de persona
        $roles = Rol::all();         // Para el select de rol

        return view('auth.edit', compact('usuario', 'personas', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        // Validación (similar a store, pero permite actualizar sin contraseña obligatoria)
        $validated = $request->validate([
            'persona_id' => 'required|exists:personas,id',
            'rol_id' => 'required|exists:roles,id',
            'nombre_usuario' => 'required|string|max:255|unique:usuarios,nombre_usuario,' . $id,  // Ignora el ID actual para unique
            'contrasena' => 'nullable|string|min:6',  // Opcional para no cambiar contraseña
            'estado' => 'required|in:0,1',
        ]);

        // Actualizar usuario
        $usuario->update($validated);

        // Si se proporciona contraseña, hashearla
        if ($request->filled('contrasena')) {
            $usuario->update(['contrasena' => Hash::make($request->contrasena)]);
        }

        return redirect()->route('auth.index')->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();  // Elimina el usuario (puedes agregar soft deletes si usas trait)

        return redirect()->route('auth.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
