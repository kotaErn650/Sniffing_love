<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth\PuntosRecompensa;
use App\Models\Auth\Usuarios;
use Illuminate\Http\Request;

class PuntosRecompensaController extends Controller
{
    public function index()
    {
        $recompensas = PuntosRecompensa::with('usuario')->get();
        return view('puntosrecompensa.index', compact('recompensas'));
    }

    public function create()
    {
        $usuarios = Usuarios::all();
        return view('puntosrecompensa.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'puntos' => 'required|integer',
            'motivo' => 'required|string|max:255',
            'fecha_asignacion' => 'required|date',
        ]);

        PuntosRecompensa::create($data);

        return redirect()->route('puntosrecompensa.index')->with('success', 'Puntos asignados correctamente.');
    }

    public function show($id)
    {
        $recompensa = PuntosRecompensa::with('usuario')->findOrFail($id);
        return view('puntosrecompensa.show', compact('recompensa'));
    }

    public function edit($id)
    {
        $recompensa = PuntosRecompensa::findOrFail($id);
        $usuarios = Usuarios::all();
        return view('puntosrecompensa.edit', compact('recompensa', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'puntos' => 'required|integer',
            'motivo' => 'required|string|max:255',
            'fecha_asignacion' => 'required|date',
        ]);

        $recompensa = PuntosRecompensa::findOrFail($id);
        $recompensa->update($data);

        return redirect()->route('puntosrecompensa.index')->with('success', 'Puntos actualizados correctamente.');
    }

    public function destroy($id)
    {
        $recompensa = PuntosRecompensa::findOrFail($id);
        $recompensa->delete();

        return redirect()->route('puntosrecompensa.index')->with('success', 'Puntos eliminados correctamente.');
    }
}