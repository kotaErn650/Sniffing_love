<?php

namespace App\Http\Controllers\Veterinary;

use App\Models\Veterinary\Servicios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     * 
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * 
     */
    public function index()
    {
        $servicios = Servicios::all();
        return view('servicios.index', compact ('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'descripcion' => 'nullable',
            'duracion_estimada' => 'nullable|integer',
            'categoria' => 'nullable|max:50',
        ]);

        Servicio::create($request->all());

        return redirect()->route('servicios.index')->with('success', 'Servicio creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicios $servicios)
    {
        return view('servicios.edit', compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Serviciob $servicios)
    {
        return view('servicios.edit', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RRequest $request, Servicio $servicio)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'descripcion' => 'nullable',
            'duracion_estimada' => 'nullable|integer',
            'categoria' => 'nullable|max:50',
        ]);

        $servicio->update($request->all());

        return redirect()->route('servicios.index')->with('success', 'Servicio actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servivio $servicio)
    {
        $servicio->delete();
        return redirect()->route('servicios.index')->with('success', 'Servicio eliminado correctamente.');
    }
}
