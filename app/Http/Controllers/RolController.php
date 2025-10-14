<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los roles
        $roles = Rol::all();
        //dd($roles);
        return view('roles.index', compact('roles'));
    }


    // Mostrar formulario de creación de rol
    public function create()
    {
        return view('roles.create'); // Vista para el formulario
    }

    // Guardar el nuevo rol en la base de datos
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'rol' => 'required|string|max:255|unique:roles,rol',
        ]);

        // Crear el rol
        Rol::create($validated);

        // Redirigir a /welcome con mensaje de éxito
        return redirect('/welcome')->with('success', 'Rol registrado correctamente.');
    }

    public function destroy($id){
        $rol = Rol::find ($id);
        if (!$rol){
            return redirect('/welcome')->middleware('error', 'Rol no encontrado.');
        }

        $rol -> delete();

        return redirect('/welcome')->with('success', 'Rol eliminado correctamente.');

    }
}