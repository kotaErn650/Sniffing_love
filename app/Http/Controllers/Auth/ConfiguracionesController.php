<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth\Configuraciones;
use Illuminate\Http\Request;

class ConfiguracionesController extends Controller
{
    public function index()
    {
        $configuraciones = Configuraciones::all();
        return view('configuraciones.index', compact('configuraciones'));
    }

    public function create()
    {
        return view('configuraciones.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'clave' => 'required|string|max:100',
            'valor' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:255',
            'tipo' => 'required|string|max:50',
        ]);

        Configuraciones::create($data);
        return redirect()->route('configuraciones.index')->with('success', 'Configuración creada correctamente.');
    }

    public function show($id)
    {
        $configuracion = Configuraciones::findOrFail($id);
        return view('configuraciones.show', compact('configuracion'));
    }

    public function edit($id)
    {
        $configuracion = Configuraciones::findOrFail($id);
        return view('configuraciones.edit', compact('configuracion'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'clave' => 'required|string|max:100',
            'valor' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:255',
            'tipo' => 'required|string|max:50',
        ]);

        $configuracion = Configuraciones::findOrFail($id);
        $configuracion->update($data);

        return redirect()->route('configuraciones.index')->with('success', 'Configuración actualizada correctamente.');
    }

    public function destroy($id)
    {
        Configuraciones::destroy($id);
        return redirect()->route('configuraciones.index')->with('success', 'Configuración eliminada correctamente.');
    }
}