<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class RegisterController extends Controller
{
    public function register(Request $request)
    {
        try {
            // Validar los campos de registro
            $request->validate([
                'nombre' => 'required|string|max:255',
                'apellidos' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:usuarios,email',
                'password' => 'required|string|min:8',
            ]);

            // Crear un nuevo usuario
            Usuario::create([
                'nombre' => $request->nombre,
                'apellidos' => $request->apellidos,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Asegúrate de que el campo se llame 'contraseña'
            ]);

            return redirect()->route('home')->with('success', 'Usuario registrado exitosamente.');

        } catch (\Exception $e) {
            Log::error('Error al registrar usuario: ' . $e->getMessage());
            return back()->withErrors(['error' => '']); // Mensaje de error más genérico
        }
    }
}

