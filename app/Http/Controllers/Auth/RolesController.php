<?php

namespace App\Http\Controllers\Auth;

use App\Models\Auth\Roles;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Roles::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre_rol' => 'required|string|max:100',
            'descripcion' => 'nullable|string|max:255',
        ]);

        Roles::create($data);

        return redirect()->route('roles.index')->with('success', 'Rol creado correctamente.');
    }

    public function show(string $id)
    {
        $role = Roles::findOrFail($id);
        return view('roles.show', compact('role'));
    }

    public function edit(string $id)
    {
        $role = Roles::findOrFail($id);
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'nombre_rol' => 'required|string|max:100',
            'descripcion' => 'nullable|string|max:255',
        ]);

        $role = Roles::findOrFail($id);
        $role->update($data);

        return redirect()->route('roles.index')->with('success', 'Rol actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        $role = Roles::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Rol eliminado.');
    }
}