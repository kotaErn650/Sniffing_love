<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Veterinarias') }}
        </h1>
    </x-slot>


@section('content')
<div class="container mx-auto px-4 py-6">

    <h1 class="text-2xl font-bold mb-4">Listado de Productos</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
        <button type="submit"class="px-3 py-1 text-sm text-white bg-green-600 rounded hover:bg-green-700">
        <a href="{{route('productos.create') }}">Crear Producto</a>
        </button>
    @foreach($productos as $producto)

        <div class="w-full md:w-1/4">

        </div>
        <div class="p-4 mb-4 rounded shadow-md border 
            {{ $producto->activo ? 'bg-white' : 'bg-red-100 text-gray-500' }}">
            
            <div class="flex justify-between items-center">
                <div class=">
                    <h2 class="text-xl font-bold {{ $producto->activo ? 'text-black' : 'text-gray-500' }}">
                        {{ $producto->nombre }}
                        @unless($producto->activo)
                            <span class="text-xs bg-red-500 text-white px-2 py-1 rounded ml-2">Desactivado</span>
                        @endunless
                    </h2>
                    <p class="text-sm">{{ $producto->descripcion }}</p>
                    <p><strong>Precio:</strong> ${{ number_format($producto->precio, 0, ',', '.') }}</p>
                    <p><strong>Stock:</strong> {{ $producto->stock }}</p>

                     @if($producto->imagen)
                        <img src="{{ $producto->imagen }}" 
                            alt="{{ $producto->nombre }}"
                            class="w-48 h-48 object-cover rounded-lg border">
                     @else
                        <div class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                            <i class="fas fa-box-open text-4xl text-gray-400"></i>
                        </div>
                    @endif
                </div>

                <div class="flex gap-2">

                    <a href="{{ route('productos.show', $producto->id_producto) }}" 
                    class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-eye"> Ver</i>
                    </a>
                    <a href="{{ route('productos.edit', $producto->id_producto) }}"
                    class="btn btn-sm px-3 py-1 text-sm text-white bg-yellow-500 rounded hover:bg-yellow-600">
                    <i class="fas fa-edit">EDITAR</i>
                    </a>

                    @if($producto->activo)
                        <form action="{{ route('productos.deactivate', $producto->id_producto) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="px-3 py-1 text-sm text-white bg-yellow-500 rounded hover:bg-yellow-600">
                                <i class="fas fa-toggle-off">DESACTIVAR</i>
                            </button>
                        </form>
                    @else
                        <form action="{{ route('productos.activate', $producto->id_producto) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="px-3 py-1 text-sm text-white bg-green-600 rounded hover:bg-green-700">
                                <i class="fas fa-toggle-off">ACTIVAR</i>
                            </button>
                        </form>
                        <form action="{{ route('productos.destroy', $producto->id_producto) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 text-sm text-white bg-red-600 rounded hover:bg-red-700">
                                <i class="fas fa-trash">Eliminar</i>
                            </button>
                        </form>
                    @endif


                    
                </div>
            </div>
        </div>
    @endforeach

    <div class="mt-6">
        {{ $productos->links() }}
    </div>
</div>
</x-app-layout>
