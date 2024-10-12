<?php

namespace App\Http\Controllers;

use App\Models\Etiquetas;
use Illuminate\Http\Request;

class EtiquetaController extends Controller
{
    public function index()
    {
        return Etiquetas::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:7',
        ]);

        return Etiquetas::create($request->all());
    }

    public function show($id)
    {
        return Etiquetas::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $etiqueta = Etiquetas::findOrFail($id);
        $etiqueta->update($request->all());

        return $etiqueta;
    }

    public function destroy($id)
    {
        $etiqueta = Etiquetas::findOrFail($id);
        $etiqueta->delete();

        return response()->noContent();
    }
}
