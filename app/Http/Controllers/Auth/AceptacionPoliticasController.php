<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth\AceptacionPoliticas;
use App\Models\Auth\Usuarios;
use App\Models\Auth\Politicas;
use Illuminate\Http\Request;

class AceptacionPoliticasController extends Controller
{
    public function index()
    {
        $aceptaciones = AceptacionPoliticas::with(['usuario', 'politica'])->get();
        return view('aceptacionpoliticas.index', compact('aceptaciones'));
    }

    public function create()
    {
        $usuarios = Usuarios::all();
        $politicas = Politicas::all();
        return view('aceptacionpoliticas.create', compact('usuarios', 'politicas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'id_politica' => 'required|exists:politicas,id_politica',
            'fecha_aceptacion' => 'required|date',
            'version_aceptada' => 'required|string|max:20',
        ]);

        AceptacionPoliticas::create($data);

        return redirect()->route('aceptacionpoliticas.index')->with('success', 'Aceptación registrada correctamente.');
    }

    public function show($id)
    {
        $aceptacion = AceptacionPoliticas::with(['usuario', 'politica'])->findOrFail($id);
        return view('aceptacionpoliticas.show', compact('aceptacion'));
    }

    public function edit($id)
    {
        $aceptacion = AceptacionPoliticas::findOrFail($id);
        $usuarios = Usuarios::all();
        $politicas = Politicas::all();
        return view('aceptacionpoliticas.edit', compact('aceptacion', 'usuarios', 'politicas'));
    }

    public function update(Request $request, $id)
    {
        $aceptacion = AceptacionPoliticas::findOrFail($id);

        $data = $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'id_politica' => 'required|exists:politicas,id_politica',
            'fecha_aceptacion' => 'required|date',
            'version_aceptada' => 'required|string|max:20',
        ]);

        $aceptacion->update($data);

        return redirect()->route('aceptacionpoliticas.index')->with('success', 'Aceptación actualizada correctamente.');
    }

    public function destroy($id)
    {
        $aceptacion = AceptacionPoliticas::findOrFail($id);
        $aceptacion->delete();

        return redirect()->route('aceptacionpoliticas.index')->with('success', 'Aceptación eliminada correctamente.');
    }
}
