<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    // Mostrar todos los proyectos
    public function index()
    {
        $proyectos = Proyecto::all();
        return view('proyectos.index', compact('proyectos')); // Retorna una vista
    }

    // Mostrar un proyecto específico
    public function show($id)
    {
        $proyecto = Proyecto::find($id);
        if (!$proyecto) {
            return redirect()->route('proyectos.index')->with('error', 'Proyecto no encontrado');
        }
        return view('proyectos.show', compact('proyecto')); // Retorna una vista
    }

    // Crear un nuevo proyecto
    public function create()
    {
        $usuarios = Usuario::all(); // Obtener todos los usuarios
        return view('proyectos.create', compact('usuarios')); // Retorna la vista y pasa los usuarios
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'usuario_id' => 'required|integer|exists:usuarios,id',
        ]);

        Proyecto::create($request->all());
        return redirect()->route('proyectos.index')->with('success', 'Proyecto creado exitosamente');
    }

    // Actualizar un proyecto existente
    public function edit($id)
    {
        $proyecto = Proyecto::find($id);
        if (!$proyecto) {
            return redirect()->route('proyectos.index')->with('error', 'Proyecto no encontrado');
        }

        $usuarios = Usuario::all(); // Obtener todos los usuarios
        return view('proyectos.edit', compact('proyecto', 'usuarios')); // Pasar el proyecto y los usuarios a la vista
    }


    public function update(Request $request, $id)
    {
        $proyecto = Proyecto::find($id);
        if (!$proyecto) {
            return redirect()->route('proyectos.index')->with('error', 'Proyecto no encontrado');
        }

        $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|required|string',
            'fecha_inicio' => 'sometimes|required|date',
            'fecha_fin' => 'sometimes|required|date',
            'usuario_id' => 'sometimes|required|integer|exists:usuarios,id',
        ]);

        $proyecto->update($request->all());
        return redirect()->route('proyectos.index')->with('success', 'Proyecto actualizado exitosamente');
    }

    // Eliminar un proyecto
    public function destroy($id)
    {
        $proyecto = Proyecto::find($id);
        if (!$proyecto) {
            return redirect()->route('proyectos.index')->with('error', 'Proyecto no encontrado');
        }

        $proyecto->delete();
        return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado exitosamente');
    }
}
