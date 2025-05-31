<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nuevo Servicio') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('servicios.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre del Servicio</label>
                        <input type="text" id="nombre" name="nombre" class="form-input w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="descripcion" class="block text-gray-700 font-bold mb-2">Descripción</label>
                        <textarea id="descripcion" name="descripcion" rows="3" class="form-textarea w-full"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="precio" class="block text-gray-700 font-bold mb-2">Precio</label>
                        <input type="number" id="precio" name="precio" step="0.01" class="form-input w-full" required>
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('servicios.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>