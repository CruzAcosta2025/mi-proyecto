<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ProyectoUsuarioController extends Controller
{
    // Mostrar todos los proyectos y los usuarios asignados a cada proyecto
    public function index()
    {
        $proyectos = Proyecto::with('usuarios')->get(); // Obtener proyectos con usuarios asignados
        return view('proyecto_usuario.index', compact('proyectos'));
    }

    // Mostrar formulario para asignar usuarios a un proyecto
    public function create($proyectoId)
    {
        $proyecto = Proyecto::findOrFail($proyectoId);
        $usuarios = Usuario::all(); // Obtener todos los usuarios
        return view('proyecto_usuario.create', compact('proyecto', 'usuarios'));
    }

    // Almacenar la asignación de un usuario a un proyecto
    public function store(Request $request, $proyectoId)
    {
        $request->validate([
            'usuario_id' => 'required|integer|exists:usuarios,id',
        ]);

        $proyecto = Proyecto::findOrFail($proyectoId);
        $proyecto->usuarios()->attach($request->usuario_id); // Asignar usuario al proyecto

        return redirect()->route('proyecto_usuario.index')->with('success', 'Usuario asignado al proyecto exitosamente.');
    }

    // Mostrar formulario para eliminar la asignación de un usuario a un proyecto
    public function edit($proyectoId)
    {
        $proyecto = Proyecto::findOrFail($proyectoId);
        $usuarios = Usuario::all();
        return view('proyecto_usuario.edit', compact('proyecto', 'usuarios'));
    }

    // Eliminar la asignación de un usuario de un proyecto
    public function destroy(Request $request, $proyectoId)
    {
        $request->validate([
            'usuario_id' => 'required|integer|exists:usuarios,id',
        ]);

        $proyecto = Proyecto::findOrFail($proyectoId);
        $proyecto->usuarios()->detach($request->usuario_id); // Desasignar usuario del proyecto

        return redirect()->route('proyecto_usuario.index')->with('success', 'Usuario desasignado del proyecto exitosamente.');
    }
}
