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
        $proyectosUsuario = Proyecto::with('usuarios')->get(); // Obtener proyectos con usuarios asignados
        return view('dashboard', compact('proyectosUsuario'));
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


    // Actualizar la asignación de un usuario a un proyecto
    public function update(Request $request, $proyectoId)
    {
        $request->validate([
            'usuario_id' => 'required|integer|exists:usuarios,id',
        ]);

        $proyecto = Proyecto::findOrFail($proyectoId);
        // Aquí puedes hacer la lógica que necesites para actualizar la asignación

        // Por ejemplo, podrías reasignar un usuario en lugar de simplemente adjuntar uno nuevo
        $proyecto->usuarios()->sync([$request->usuario_id]); // Actualiza la asignación de usuario

        return redirect()->route('proyecto_usuario.index')->with('success', 'Usuario actualizado en el proyecto exitosamente.');
    }
    // Mostrar formulario para editar la asignación de un usuario a un proyecto
    public function edit($proyectoId)
    {
        $proyecto = Proyecto::findOrFail($proyectoId); // Busca el proyecto por ID
        $usuarios = Usuario::all(); // Obtener todos los usuarios
        return view('proyecto_usuario.edit', compact('proyecto', 'usuarios')); // Retorna la vista con el proyecto y usuarios
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
