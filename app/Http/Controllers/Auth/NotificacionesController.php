<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth\Notificaciones;
use App\Models\Auth\Usuarios;
use Illuminate\Http\Request;

class NotificacionesController extends Controller
{
    public function index()
    {
        $notificaciones = Notificaciones::with('usuario')->get();
        return view('notificaciones.index', compact('notificaciones'));
    }

    public function create()
    {
        $usuarios = Usuarios::all();
        return view('notificaciones.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'titulo' => 'required|string|max:100',
            'mensaje' => 'required|string',
            'tipo' => 'required|in:sistema,cita,promocion,recordatorio',
            'leida' => 'boolean',
            'fecha_creacion' => 'required|date',
            'fecha_leida' => 'nullable|date',
            'url_accion' => 'nullable|string|max:255',
        ]);

        Notificaciones::create($data);
        return redirect()->route('notificaciones.index')->with('success', 'Notificación creada correctamente.');
    }

    public function show($id)
    {
        $notificacion = Notificaciones::with('usuario')->findOrFail($id);
        return view('notificaciones.show', compact('notificacion'));
    }

    public function edit($id)
    {
        $notificacion = Notificaciones::findOrFail($id);
        $usuarios = Usuarios::all();
        return view('notificaciones.edit', compact('notificacion', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'titulo' => 'required|string|max:100',
            'mensaje' => 'required|string',
            'tipo' => 'required|in:sistema,cita,promocion,recordatorio',
            'leida' => 'boolean',
            'fecha_creacion' => 'required|date',
            'fecha_leida' => 'nullable|date',
            'url_accion' => 'nullable|string|max:255',
        ]);

        $notificacion = Notificaciones::findOrFail($id);
        $notificacion->update($data);

        return redirect()->route('notificaciones.index')->with('success', 'Notificación actualizada correctamente.');
    }

    public function destroy($id)
    {
        $notificacion = Notificaciones::findOrFail($id);
        $notificacion->delete();

        return redirect()->route('notificaciones.index')->with('success', 'Notificación eliminada correctamente.');
    }
}