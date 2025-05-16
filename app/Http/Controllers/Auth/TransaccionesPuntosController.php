<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth\TransaccionesPuntos;
use App\Models\Auth\Usuarios;
use Illuminate\Http\Request;

class TransaccionesPuntosController extends Controller
{
    public function index()
    {
        $transacciones = TransaccionesPuntos::with('usuario')->get();
        return view('transaccionespuntos.index', compact('transacciones'));
    }

    public function create()
    {
        $usuarios = Usuarios::all();
        return view('transaccionespuntos.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'puntos' => 'required|integer',
            'tipo' => 'required|in:ganancia,redencion',
            'motivo' => 'nullable|string|max:100',
            'fecha_transaccion' => 'nullable|date',
            'id_referencia' => 'nullable|integer',
        ]);

        TransaccionesPuntos::create($data);
        return redirect()->route('transaccionespuntos.index')->with('success', 'Transacción registrada correctamente.');
    }

    public function show(TransaccionesPuntos $transaccionespunto)
    {
        return view('transaccionespuntos.show', compact('transaccionespunto'));
    }

    public function edit(TransaccionesPuntos $transaccionespunto)
    {
        $usuarios = Usuarios::all();
        return view('transaccionespuntos.edit', compact('transaccionespunto', 'usuarios'));
    }

    public function update(Request $request, TransaccionesPuntos $transaccionespunto)
    {
        $data = $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'puntos' => 'required|integer',
            'tipo' => 'required|in:ganancia,redencion',
            'motivo' => 'nullable|string|max:100',
            'fecha_transaccion' => 'nullable|date',
            'id_referencia' => 'nullable|integer',
        ]);

        $transaccionespunto->update($data);
        return redirect()->route('transaccionespuntos.index')->with('success', 'Transacción actualizada correctamente.');
    }

    public function destroy(TransaccionesPuntos $transaccionespunto)
    {
        $transaccionespunto->delete();
        return redirect()->route('transaccionespuntos.index')->with('success', 'Registro eliminado correctamente.');
    }
}