<?php

namespace App\Http\Controllers;

use App\Models\Tarea;      // Asegúrate de importar tu modelo Tarea
use App\Models\Proyecto;   // Asegúrate de importar tu modelo Proyecto
use App\Models\Usuario;    // Asegúrate de importar tu modelo User
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Muestra el dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        // Contamos las tareas, proyectos y usuarios
        $tareasCount = Tarea::count();       // Contar tareas
        $proyectosCount = Proyecto::count(); // Contar proyectos
        $usuariosCount = Usuario::count();   // Contar usuarios

        // Obtener todos los proyectos para mostrarlos en el dashboard
        $proyectos = Proyecto::all();


        $tareas = Tarea::all();

        // Retornar la vista del dashboard con los datos contados y proyectos
        return view('dashboard', compact('tareasCount', 'proyectosCount', 'usuariosCount', 'proyectos','tareas'));
    }
}

