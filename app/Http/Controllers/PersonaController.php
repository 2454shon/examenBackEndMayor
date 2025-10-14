<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    // Mostrar formulario de creación de persona
    public function create()
    {
        return view('personas.create'); // Vista para el formulario
    }

    // Guardar la nueva persona en la base de datos
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|unique:personas,email',
            'telefono' => 'nullable|string|max:20',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'nullable|in:masculino,femenino,otro',
            'direccion' => 'nullable|string|max:255',
        ]);

        // Crear la persona
        Persona::create($validated);

        // Redirigir a /welcome con mensaje de éxito
        return redirect('/welcome')->with('success', 'Persona registrada correctamente.');
    }

    public function destroy($id)
    {
        $persona = Persona::find($id);

        if (!$persona) {
            return redirect('/welcome')->with('error', 'Persona no encontrada.');
        }

        $persona->delete();

        return redirect('/welcome')->with('success', 'Persona eliminada correctamente.');
    }
    
}