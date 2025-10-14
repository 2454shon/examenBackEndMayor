<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AuthController extends Controller
{

    // Mostrar formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Procesar el login
    public function inicio_sesion(Request $request)
    {
        $credentials = $request->validate([
            'nombre_usuario' => 'required|string',
            'contrasena' => 'required|string',
        ]);

//dd(auth()->guard('web')->getProvider()->getModel()); // Debería mostrar "App\Models\Auth\Usuario"

        if (auth()->guard('web')->attempt(['nombre_usuario' => $request->nombre_usuario, 'password' => $request->contrasena], $request->filled('remember'))) {
            $request->session()->regenerate();
//dd (redirect()->intended('/'));
            return redirect()->intended('/welcome');
        }

        return back()->withErrors([
            'nombre_usuario' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('nombre_usuario');
    }

    //logout
    public function cerrar_sesion(Request $request)
{
    auth()->guard('web')->logout(); // Usar el guard 'web' para cerrar sesión
    $request->session()->invalidate(); // Invalidar la sesión
    $request->session()->regenerateToken(); // Regenerar el token CSRF
    return redirect()->route('inicio_sesion'); // Redirigir al formulario de login
}
}
