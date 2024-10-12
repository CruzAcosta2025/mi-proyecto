<?php

namespace App\Http\Controllers;

use App\Models\Comentarios;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function index()
    {
        return Comentarios::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_id' => 'required|integer',
            'user_id' => 'required|integer',
            'content' => 'required|string',
        ]);

        return Comentarios::create($request->all());
    }

    public function show($id)
    {
        return Comentarios::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $comentario = Comentarios::findOrFail($id);
        $comentario->update($request->all());

        return $comentario;
    }

    public function destroy($id)
    {
        $comentario = Comentarios::findOrFail($id);
        $comentario->delete();

        return response()->noContent();
    }
}
