<?php

namespace App\Http\Controllers;

use App\Models\Invitaciones;
use Illuminate\Http\Request;

class InvitacionController extends Controller
{
    public function index()
    {
        return Invitaciones::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|integer',
            'sender_id' => 'required|integer',
            'receiver_id' => 'required|integer',
            'status' => 'required|in:pendiente,aceptado,rechazado',
        ]);

        return Invitaciones::create($request->all());
    }

    public function show($id)
    {
        return Invitaciones::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $invitacion = Invitaciones::findOrFail($id);
        $invitacion->update($request->all());

        return $invitacion;
    }

    public function destroy($id)
    {
        $invitacion = Invitaciones::findOrFail($id);
        $invitacion->delete();

        return response()->noContent();
    }
}
