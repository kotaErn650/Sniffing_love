<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth\SuscripcionesMembresias;
use App\Models\Auth\Usuarios;
use App\Models\Auth\Membresias;
use Illuminate\Http\Request;

class SuscripcionesMembresiasController extends Controller
{
    public function index()
    {
        $suscripciones = SuscripcionesMembresias::with(['usuario', 'membresia'])->get();
        return view('suscripcionesmembresias.index', compact('suscripciones'));
    }

    public function create()
    {
        $usuarios = Usuarios::all();
        $membresias = Membresias::all();
        return view('suscripcionesmembresias.create', compact('usuarios', 'membresias'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'id_membresia' => 'required|exists:membresias,id_membresia',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'estado' => 'required|in:activa,cancelada,vencida',
            'metodo_pago' => 'nullable|string|max:50',
        ]);

        SuscripcionesMembresias::create($data);
        return redirect()->route('suscripcionesmembresias.index')->with('success', 'Suscripción creada correctamente.');
    }

    public function show($id)
    {
        $suscripcion = SuscripcionesMembresias::with(['usuario', 'membresia'])->findOrFail($id);
        return view('suscripcionesmembresias.show', compact('suscripcion'));
    }

    public function edit($id)
    {
        $suscripcion = SuscripcionesMembresias::findOrFail($id);
        $usuarios = Usuarios::all();
        $membresias = Membresias::all();
        return view('suscripcionesmembresias.edit', compact('suscripcion', 'usuarios', 'membresias'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'id_membresia' => 'required|exists:membresias,id_membresia',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'estado' => 'required|in:activa,cancelada,vencida',
            'metodo_pago' => 'nullable|string|max:50',
        ]);

        $suscripcion = SuscripcionesMembresias::findOrFail($id);
        $suscripcion->update($data);
        return redirect()->route('suscripcionesmembresias.index')->with('success', 'Suscripción actualizada correctamente.');
    }

    public function destroy($id)
    {
        SuscripcionesMembresias::destroy($id);
        return redirect()->route('suscripcionesmembresias.index')->with('success', 'Suscripción eliminada correctamente.');
    }
}