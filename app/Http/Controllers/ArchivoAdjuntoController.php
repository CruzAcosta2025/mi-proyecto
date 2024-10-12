<?php

namespace App\Http\Controllers;

use App\Models\ArchivosAdjuntos;
use Illuminate\Http\Request;

class ArchivoAdjuntoController extends Controller
{
    public function index()
    {
        return ArchivosAdjuntos::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_id' => 'required|integer',
            'file_path' => 'required|string|max:255',
            'uploaded_by' => 'required|integer',
        ]);

        return ArchivosAdjuntos::create($request->all());
    }

    public function show($id)
    {
        return ArchivosAdjuntos::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $archivoAdjunto = ArchivosAdjuntos::findOrFail($id);
        $archivoAdjunto->update($request->all());

        return $archivoAdjunto;
    }

    public function destroy($id)
    {
        $archivoAdjunto = ArchivosAdjuntos::findOrFail($id);
        $archivoAdjunto->delete();

        return response()->noContent();
    }
}
