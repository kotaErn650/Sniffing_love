<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth\Politicas;
use Illuminate\Http\Request;

class PoliticasController extends Controller
{
    public function index()
    {
        $politicas = Politicas::all(); 
    return view('politicas.index', compact('politicas'));
    }

    public function create()
    {
        return view('politicas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:100',
            'contenido' => 'required|string',
            'tipo' => 'required|in:terminos,privacidad,cancelacion,seguridad',
            'fecha_creacion' => 'required|date',
            'fecha_actualizacion' => 'nullable|date',
            'version' => 'required|string|max:20',
            'activa' => 'required|boolean',
        ]);

        Politicas::create($data);

        return redirect()->route('politicas.index')->with('success', 'Política creada correctamente.');
    }

    public function show($id_politica)
    {
        $politica = Politicas::findOrFail($id_politica);
        return view('politicas.show', compact('politica'));
    }

    public function edit($id_politica)
    {
        $politica = Politicas::findOrFail($id_politica);
        return view('politicas.edit', compact('politica'));
    }

    public function update(Request $request, $id_politica)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:100',
            'contenido' => 'required|string',
            'tipo' => 'required|in:terminos,privacidad,cancelacion,seguridad',
            'fecha_creacion' => 'required|date',
            'fecha_actualizacion' => 'nullable|date',
            'version' => 'required|string|max:20',
            'activa' => 'required|boolean',
        ]);

        $politica = Politicas::findOrFail($id_politica);
        $politica->update($data);

        return redirect()->route('politicas.index')->with('success', 'Política actualizada correctamente.');
    }

    public function destroy($id_politica)
    {
        $politica = Politicas::findOrFail($id_politica);
        $politica->delete();

        return redirect()->route('politicas.index')->with('success', 'Política eliminada correctamente.');
    }
}