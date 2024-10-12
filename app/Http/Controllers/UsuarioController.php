<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        return Usuario::all(); // Listar todos los usuarios
    }

    public function show($id)
    {
        return Usuario::findOrFail($id); // Mostrar un usuario específico
    }

    public function update(Request $request, $id)
    {
        $user = Usuario::findOrFail($id);
        $user->update($request->all()); // Actualizar información del usuario

        return $user;
    }

    public function destroy($id)
    {
        $user = Usuario::findOrFail($id);
        $user->delete(); // Eliminar un usuario

        return response()->noContent();
    }
}
