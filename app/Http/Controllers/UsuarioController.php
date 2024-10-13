<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    // Obtener todos los usuarios y mostrarlos en una vista
    public function index()
    {
        $usuarios = Usuario::all(); // Obtener todos los usuarios
        return view('usuarios.index', compact('usuarios')); // Pasar los usuarios a la vista
    }

    // Mostrar el formulario para crear un nuevo usuario
    public function create()
    {
        return view('usuarios.create'); // Retornar la vista del formulario de creación
    }

    // Guardar un nuevo usuario
    public function store(Request $request)
    {
        // Validar los campos de la solicitud
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'contraseña' => 'required|string|min:8',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'rol' => 'required|in:admin,miembro',
        ]);

        // Crear un nuevo usuario
        Usuario::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'contraseña' => Hash::make($request->contraseña),
            'email' => $request->email,
            'rol' => $request->rol,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado con éxito.'); // Redirigir a la lista de usuarios con un mensaje de éxito
    }

    // Mostrar un usuario específico por ID
    public function show($id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return redirect()->route('usuarios.index')->with('error', 'Usuario no encontrado'); // Redirigir si no se encuentra el usuario
        }

        return view('usuarios.show', compact('usuario')); // Pasar el usuario a la vista
    }

    // Mostrar el formulario para editar un usuario
    public function edit($id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return redirect()->route('usuarios.index')->with('error', 'Usuario no encontrado'); // Redirigir si no se encuentra el usuario
        }

        return view('usuarios.edit', compact('usuario')); // Pasar el usuario a la vista de edición
    }

    // Actualizar un usuario
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return redirect()->route('usuarios.index')->with('error', 'Usuario no encontrado'); // Redirigir si no se encuentra el usuario
        }

        // Validar los campos
        $request->validate([
            'nombre' => 'string|max:255',
            'apellidos' => 'string|max:255',
            'contraseña' => 'nullable|string|min:8',
            'email' => 'string|email|max:255|unique:usuarios,email,' . $id,
            'rol' => 'in:admin,miembro',
        ]);

        // Actualizar los campos
        $usuario->nombre = $request->nombre ?? $usuario->nombre;
        $usuario->apellidos = $request->apellidos ?? $usuario->apellidos;

        if ($request->contraseña) {
            $usuario->contraseña = Hash::make($request->contraseña); // Actualizar la contraseña solo si es proporcionada
        }

        $usuario->email = $request->email ?? $usuario->email;
        $usuario->rol = $request->rol ?? $usuario->rol;

        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado con éxito.'); // Redirigir a la lista de usuarios con un mensaje de éxito
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return redirect()->route('usuarios.index')->with('error', 'Usuario no encontrado'); // Redirigir si no se encuentra el usuario
        }

        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado con éxito.'); // Redirigir a la lista de usuarios con un mensaje de éxito
    }
}
