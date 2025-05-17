<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth\Referidos;
use App\Models\Auth\Usuarios;
use Illuminate\Http\Request;

class ReferidosController extends Controller
{
    public function index()
    {
        $referidos = Referidos::with(['usuarioReferidor', 'usuarioReferido'])->get();
        return view('referidos.index', compact('referidos'));
    }

    public function create()
    {
        $usuarios = Usuarios::all();
        return view('referidos.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_usuario_referidor' => 'required|exists:usuarios,id_usuario',
            'id_usuario_referido' => 'required|exists:usuarios,id_usuario',
            'fecha_referido' => 'required|date',
            'puntos_otorgados' => 'required|integer'
        ]);

        Referidos::create($data);
        return redirect()->route('referidos.index')->with('success', 'Registro creado correctamente.');
    }

    public function show(Referidos $referido)
    {
        return view('referidos.show', compact('referido'));
    }

    public function edit(Referidos $referido)
    {
        $usuarios = Usuarios::all();
        return view('referidos.edit', compact('referido', 'usuarios'));
    }

    public function update(Request $request, Referidos $referido)
    {
        $data = $request->validate([
            'id_usuario_referidor' => 'required|exists:usuarios,id_usuario',
            'id_usuario_referido' => 'required|exists:usuarios,id_usuario',
            'fecha_referido' => 'required|date',
            'puntos_otorgados' => 'required|integer'
        ]);

        $referido->update($data);
        return redirect()->route('referidos.index')->with('success', 'Registro actualizado correctamente.');
    }

    public function destroy(Referidos $referido)
    {
        $referido->delete();
        return redirect()->route('referidos.index')->with('success', 'Registro eliminado correctamente.');
    }
}