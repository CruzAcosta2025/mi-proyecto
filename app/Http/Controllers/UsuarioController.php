<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    // Obtener todos los usuarios
    public function index()
    {
        return response()->json(Usuario::all(), 200);
    }

    // Guardar un nuevo usuario
    public function store(Request $request)
    {
        // Validar los campos de la solicitud
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'type' => 'required|in:1,2', // 1 = admin, 2 = staff
        ]);

        // Crear un nuevo usuario
        $usuario = Usuario::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'password' => Hash::make($request->password), // Hashear la contraseña
            'email' => $request->email,
            'type' => $request->type,
        ]);

        return response()->json($usuario, 201); // 201 significa que el recurso fue creado
    }

    // Obtener un usuario específico por ID
    public function show($id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json($usuario, 200);
    }

    // Actualizar un usuario
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        // Validar los campos
        $request->validate([
            'nombres' => 'string|max:255',
            'apellidos' => 'string|max:255',
            'password' => 'nullable|string|min:8',
            'email' => 'string|email|max:255|unique:usuarios,email,' . $id, // Asegurarse de que el email sea único para este ID
            'type' => 'in:1,2',
        ]);

        // Actualizar los campos
        $usuario->nombres = $request->nombres ?? $usuario->nombres;
        $usuario->apellidos = $request->apellidos ?? $usuario->apellidos;

        if ($request->password) {
            $usuario->password = Hash::make($request->password); // Actualizar la contraseña solo si es proporcionada
        }

        $usuario->email = $request->email ?? $usuario->email;
        $usuario->type = $request->type ?? $usuario->type;

        $usuario->save();

        return response()->json($usuario, 200);
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $usuario->delete();

        return response()->json(null, 204); // 204 significa que no hay contenido en la respuesta
    }
}
