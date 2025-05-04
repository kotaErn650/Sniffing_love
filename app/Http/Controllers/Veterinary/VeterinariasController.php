<?php

namespace App\Http\Controllers\Veterinary;

use App\Models\Veterinary\Veterinarias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VeterinariasController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $veterinarias = Veterinarias::all();
        return view('veterinarias.index', compact('veterinarias'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        return view('veterinarias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'nit' => 'nullable|string|max:20',
            'direccion' => 'required|string|max:200',
            'telefono' => 'required|string|max:15',
            'email' => 'required|email|unique:veterinarias,email',
            'horario_apertura' => 'nullable|date_format:H:i:s',
            'horario_cierre' => 'nullable|date_format:H:i:s',
            'descripcion' => 'nullable|string',
            'latitud' => 'nullable|numeric',
            'longitud' => 'nullable|numeric',
            'activa' => 'required|boolean',
            'id_usuario_admin' => 'nullable|exists:usuarios,id',
            'calificacion_promedio' => 'required|numeric|min:0|max:5',
            'politica_cancelacion' => 'nullable|string',
        ]);

        Veterinarias::create($data);
        return redirect()->route('veterinarias.index')->with('success', 'Veterinaria creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Veterinarias $veterinaria)
    {
        return view('veterinarias.show', compact('veterinaria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Veterinarias $veterinaria)
    {
        return view('veterinarias.edit', compact('veterinaria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Veterinarias $veterinaria)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'nit' => 'nullable|string|max:20',
            'direccion' => 'required|string|max:200',
            'telefono' => 'required|string|max:15',
            'email' => 'required|email|unique:veterinarias,email,' . $veterinaria->id_veterinaria . ',id_veterinaria',
            'horario_apertura' => 'nullable|date_format:H:i:s',
            'horario_cierre' => 'nullable|date_format:H:i:s',
            'descripcion' => 'nullable|string',
            'latitud' => 'nullable|numeric',
            'longitud' => 'nullable|numeric',
            'activa' => 'required|boolean',
            'id_usuario_admin' => 'nullable|exists:usuarios,id',
            'calificacion_promedio' => 'required|numeric|min:0|max:5',
            'politica_cancelacion' => 'nullable|string',
        ]);

        $veterinaria->update($data);
        return redirect()->route('veterinarias.index')->with('success', 'Veterinaria actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(veterinarias $veterinarias)
    {
        $veterinaria->delete();
        return redirect()->route('veterinarias.index')->with('success', 'Veterinaria eliminada.');
    }
}
