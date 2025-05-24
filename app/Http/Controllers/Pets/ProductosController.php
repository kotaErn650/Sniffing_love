<?php

namespace App\Http\Controllers\Pets;

use App\Http\Controllers\Controller;
use App\Models\Pets\Productos;
use App\Models\Veterinary\Veterinarias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Productos::orderBy('nombre')->paginate(10);
    return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $veterinarias = Veterinarias::all();
        $categorias = [
            'alimento' => 'Alimento',
            'medicamento' => 'Medicamento',
            'accesorio' => 'Accesorio',
            'higiene' => 'Higiene',
            'otro' => 'Otro'
        ];
        
        return view('productos.create', compact('categorias','veterinarias' ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'categoria' => 'required|in:alimento,medicamento,accesorio,higiene,otro',
        'precio' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'descripcion' => 'nullable|string',
        'imagen' => 'nullable|url',
        'activo' => 'sometimes|boolean',
        'id_veterinaria' => 'required|exists:veterinarias,id_veterinaria'
    ]);

    // Convertir el valor del checkbox a booleano
    $validated['activo'] = $request->has('activo');

    try {
        Productos::create($validated);
        return redirect()->route('productos.index')->with('success', 'Producto creado con éxito.');
    } catch (\Exception $e) {
        return back()->withInput()->with('error', 'Error al crear el producto: '.$e->getMessage());
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producto = Productos::findOrFail($id);
        return view(' .productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto = Productos::findOrFail($id);
        $categorias = [
            'alimento' => 'Alimento',
            'medicamento' => 'Medicamento',
            'accesorio' => 'Accesorio',
            'higiene' => 'Higiene',
            'otro' => 'Otro'
        ];
        
        return view('productos.edit', compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
 {
    $producto = Productos::findOrFail($id);

    $producto->nombre = $request->input('nombre');
    $producto->categoria = $request->input('categoria');
    $producto->precio = $request->input('precio');
    $producto->stock = $request->input('stock');
    $producto->imagen = $request->input('imagen'); // Si es URL
    $producto->activo = $request->has('activo');
    $producto->descripcion = $request->input('descripcion');

    $producto->save();

    return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Productos::findOrFail($id);
        
        // Eliminar imagen asociada si existe
        if ($producto->imagen) {
            Storage::disk('public')->delete($producto->imagen);
        }
        
        $producto->delete();
        
        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado exitosamente');
    }
    
    /**
     * Método adicional para desactivar producto (soft delete)
     */
public function deactivate(string $id)
{
    $producto = Productos::findOrFail($id);
    $producto->update(['activo' => false]);
    
    return redirect()->back()
        ->with('success', 'Producto desactivado exitosamente');
}
    
public function activate(string $id)
{
    $producto = Productos::findOrFail($id);
    $producto->update(['activo' => true]);
    
    return redirect()->back()
        ->with('success', 'Producto activado exitosamente');
}
}