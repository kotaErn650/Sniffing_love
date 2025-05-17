<?php

namespace App\Http\Controllers\Veterinary;

use App\Http\Controllers\Controller;
use App\Models\Veterinary\Carritos;
use Illuminate\Http\Request;

class CarritosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carritos = Carritos::with('usuario')->get();
        return view('veterinary.carritos.index', compact('carritos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('veterinary.carritos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_usuario' => 'required|exists:users,id'
        ]);

        Carritos::create($validated);

        return redirect()->route('veterinary.carritos.index')
            ->with('success', 'Carrito creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $carrito = Carritos::with('usuario')->findOrFail($id);
        return view('veterinary.carritos.show', compact('carrito'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $carrito = Carritos::findOrFail($id);
        return view('veterinary.carritos.edit', compact('carrito'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'id_usuario' => 'required|exists:users,id'
        ]);

        $carrito = Carritos::findOrFail($id);
        $carrito->update($validated);

        return redirect()->route('veterinary.carritos.index')
            ->with('success', 'Carrito actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carrito = Carritos::findOrFail($id);
        $carrito->delete();

        return redirect()->route('veterinary.carritos.index')
            ->with('success', 'Carrito eliminado exitosamente.');
    }
}