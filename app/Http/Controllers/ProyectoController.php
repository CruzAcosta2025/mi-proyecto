<?php
namespace App\Http\Controllers;

use App\Models\Proyectos; // Asegúrate de que este modelo exista
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index()
    {
        $projects = Proyectos::all(); // Obtener todos los proyectos (ajusta según tu modelo)
        return view('projects.index', compact('projects')); // Asegúrate de que este archivo exista
    }

    public function create()
    {
        return view('projects.create'); // Asegúrate de que este archivo exista
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'user_id' => 'required|integer',
        ]);

        Proyectos::create($request->all());
        return redirect()->route('dashboard'); // Redirige a la lista de proyectos
    }
}
