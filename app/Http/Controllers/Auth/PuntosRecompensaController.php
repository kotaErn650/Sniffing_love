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
        $puntos = PuntosRecompensa::with('usuario')->get();
        return view('puntosrecompensa.index', compact('puntos'));
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
            'fecha_actualizacion' => 'nullable|date',
        ]);

        PuntosRecompensa::create($data);
        return redirect()->route('puntosrecompensa.index')->with('success', 'Puntos registrados correctamente.');
    }

    public function show(PuntosRecompensa $puntosrecompensa)
    {
        return view('puntosrecompensa.show', compact('puntosrecompensa'));
    }

    public function edit(PuntosRecompensa $puntosrecompensa)
    {
        $usuarios = Usuarios::all();
        return view('puntosrecompensa.edit', compact('puntosrecompensa', 'usuarios'));
    }

    public function update(Request $request, PuntosRecompensa $puntosrecompensa)
    {
        $data = $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'puntos' => 'required|integer',
            'fecha_actualizacion' => 'nullable|date',
        ]);

        $puntosrecompensa->update($data);
        return redirect()->route('puntosrecompensa.index')->with('success', 'Puntos actualizados correctamente.');
    }

    public function destroy(PuntosRecompensa $puntosrecompensa)
    {
        $puntosrecompensa->delete();
        return redirect()->route('puntosrecompensa.index')->with('success', 'Registro eliminado correctamente.');
    }
}