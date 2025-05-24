<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Configuración') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Editar Configuración #{{ $configuracion->id_configuracion }}</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('configuraciones.update', $configuracion->id_configuracion) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="clave" class="form-label">Clave</label>
                        <input type="text" name="clave" id="clave" class="form-control" required value="{{ $configuracion->clave }}">
                    </div>

                    <div class="mb-3">
                        <label for="valor" class="form-label">Valor</label>
                        <input type="text" name="valor" id="valor" class="form-control" required value="{{ $configuracion->valor }}">
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="3">{{ $configuracion->descripcion }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo</label>
                        <input type="text" name="tipo" id="tipo" class="form-control" required value="{{ $configuracion->tipo }}">
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('configuraciones.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-warning text-white">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>