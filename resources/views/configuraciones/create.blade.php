<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Nueva Configuración') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Formulario de Registro</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('configuraciones.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="clave" class="form-label">Clave</label>
                        <input type="text" name="clave" id="clave" class="form-control" required value="{{ old('clave') }}">
                    </div>

                    <div class="mb-3">
                        <label for="valor" class="form-label">Valor</label>
                        <input type="text" name="valor" id="valor" class="form-control" required value="{{ old('valor') }}">
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="3">{{ old('descripcion') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo</label>
                        <input type="text" name="tipo" id="tipo" class="form-control" required value="{{ old('tipo') }}">
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('configuraciones.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-warning text-white">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>