<?php

namespace App\Http\Controllers;

use App\Models\Tareas;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index()
    {
        return Tareas::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'completed' => 'required|boolean',
            'project_id' => 'required|integer',
        ]);

        return Tareas::create($request->all());
    }

    public function show($id)
    {
        return Tareas::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $tarea = Tareas::findOrFail($id);
        $tarea->update($request->all());

        return $tarea;
    }

    public function destroy($id)
    {
        $tarea = Tareas::findOrFail($id);
        $tarea->delete();

        return response()->noContent();
    }
}
