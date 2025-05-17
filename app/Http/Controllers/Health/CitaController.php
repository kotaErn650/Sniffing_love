<?php

namespace App\Http\Controllers\Health;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Health\Cita;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::all();
        return view('citas.index', compact('citas'));
    }

    public function create()
    {
        return view('citas.create');
    }

    public function store(Request $request)
    {
        Cita::create($request->all());
        return redirect()->route('citas.index')->with('success', 'Cita creada correctamente.');
    }

    public function show($id)
    {
        $cita = Cita::findOrFail($id);
        return view('citas.show', compact('cita'));
    }

    public function edit($id)
    {
        $cita = Cita::findOrFail($id);
        return view('citas.edit', compact('cita'));
    }

    public function update(Request $request, $id)
    {
        $cita = Cita::findOrFail($id);
        $cita->update($request->all());
        return redirect()->route('citas.index')->with('success', 'Cita actualizada correctamente.');
    }

    public function destroy($id)
    {
        Cita::destroy($id);
        return redirect()->route('citas.index')->with('success', 'Cita eliminada correctamente.');
    }
}
