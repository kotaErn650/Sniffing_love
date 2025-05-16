<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth\Membresias;
use Illuminate\Http\Request;

class MembresiasController extends Controller
{
    public function index()
    {
        $membresias = Membresias::all();
        return view('membresias.index', compact('membresias'));
    }

    public function create()
    {
        return view('membresias.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:50',
            'descripcion' => 'nullable|string',
            'precio_mensual' => 'required|numeric|min:0',
            'beneficios' => 'nullable|string',
            'duracion_dias' => 'required|integer|min:1',
        ]);

        Membresias::create($data);
        return redirect()->route('membresias.index')->with('success', 'Membresía creada correctamente.');
    }

    public function show(Membresias $membresia)
    {
        return view('membresias.show', compact('membresia'));
    }

    public function edit(Membresias $membresia)
    {
        return view('membresias.edit', compact('membresia'));
    }

    public function update(Request $request, Membresias $membresia)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:50',
            'descripcion' => 'nullable|string',
            'precio_mensual' => 'required|numeric|min:0',
            'beneficios' => 'nullable|string',
            'duracion_dias' => 'required|integer|min:1',
        ]);

        $membresia->update($data);
        return redirect()->route('membresias.index')->with('success', 'Membresía actualizada correctamente.');
    }

    public function destroy(Membresias $membresia)
    {
        $membresia->delete();
        return redirect()->route('membresias.index')->with('success', 'Membresía eliminada correctamente.');
    }
}