<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Proyecto; // Asegúrate de importar el modelo Proyecto
use Illuminate\Http\Request;

class TareaController extends Controller
{
    // Mostrar todos las tareas
    public function index()
    {
        $tareas = Tarea::all();
        return view('tareas.index', compact('tareas'));
    }

    // Mostrar formulario para crear una nueva tarea
    public function create()
    {
        $proyectos = Proyecto::all(); // Obtener todos los proyectos para el select
        return view('tareas.create', compact('proyectos'));
    }

    // Almacenar una nueva tarea
    public function store(Request $request)
    {
        $request->validate([
            'proyecto_id' => 'required|integer|exists:proyectos,id',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'estado' => 'required|in:pendiente,en progreso,completada',
            'prioridad' => 'required|in:baja,media,alta',
            'fecha_vencimiento' => 'required|date',
        ]);

        Tarea::create($request->all());

        return redirect()->route('tareas.index')->with('success', 'Tarea creada exitosamente.');
    }

    // Mostrar un formulario para editar una tarea existente
    public function edit($id)
    {
        $tarea = Tarea::findOrFail($id);
        $proyectos = Proyecto::all(); // Obtener todos los proyectos para el select
        return view('tareas.edit', compact('tarea', 'proyectos'));
    }

    // Actualizar una tarea existente
    public function update(Request $request, $id)
    {
        $tarea = Tarea::findOrFail($id);

        $request->validate([
            'proyecto_id' => 'sometimes|required|integer|exists:proyectos,id',
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|required|string',
            'estado' => 'sometimes|required|in:pendiente,en progreso,completada',
            'prioridad' => 'sometimes|required|in:baja,media,alta',
            'fecha_vencimiento' => 'sometimes|required|date',
        ]);

        $tarea->update($request->all());

        return redirect()->route('tareas.index')->with('success', 'Tarea actualizada exitosamente.');
    }

    // Eliminar una tarea
    public function destroy($id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->delete();

        return redirect()->route('tareas.index')->with('success', 'Tarea eliminada exitosamente.');
    }
}
