<?php

namespace App\Http\Controllers\Auth;


use App\Models\Auth\Roles;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Roles::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre_rol' => 'required|string|max:100',
            'descripcion' => 'nullable|string|max:255',
        ]);

        Roles::create($data);
        return redirect()->route('roles.index')->with('success', 'Rol creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Roles::findOrFail($id);
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Roles::findOrFail($id);
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'nombre_rol' => 'required|string|max:100',
            'descripcion' => 'nullable|string|max:255',
        ]);
    
        // Recupera el rol usando el ID
        $role = Roles::findOrFail($id);
    
        // Actualiza el rol con los nuevos datos
        $role->update($data);
    
        return redirect()->route('roles.index')->with('success', 'Rol actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Rol eliminado.');
    }
}
