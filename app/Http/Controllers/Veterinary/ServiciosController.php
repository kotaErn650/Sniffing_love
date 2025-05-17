<?php

namespace App\Http\Controllers\Veterinary;

use App\Models\Veterinary\Servicios;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    public function index()
    {
        $servicios = Servicios::all();
        return view('servicios.index', compact('servicios'));
    }

    public function create()
    {
        return view('servicios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'descripcion' => 'nullable',
            'duracion_estimada' => 'nullable|integer',
            'categoria' => 'nullable|max:50',
        ]);

        Servicios::create($request->all());

        return redirect()->route('servicios.index')->with('success', 'Servicio creado correctamente.');
    }

    public function show($id)
    {
        $servicio = Servicios::findOrFail($id);
        return view('servicios.show', compact('servicio'));
    }

    public function edit($id)
    {
        $servicio = Servicios::findOrFail($id);
        return view('servicios.edit', compact('servicio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'descripcion' => 'nullable',
            'duracion_estimada' => 'nullable|integer',
            'categoria' => 'nullable|max:50',
        ]);

        $servicio = Servicios::findOrFail($id);
        $servicio->update($request->all());

        return redirect()->route('servicios.index')->with('success', 'Servicio actualizado correctamente.');
    }

    public function destroy($id)
    {
        $servicio = Servicios::findOrFail($id);
        $servicio->delete();

        return redirect()->route('servicios.index')->with('success', 'Servicio eliminado correctamente.');
    }
}
