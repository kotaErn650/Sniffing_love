<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nueva Membresía') }}
        </h1>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Registrar nueva membresía</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('membresias.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required value="{{ old('nombre') }}">
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="4">{{ old('descripcion') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="precio_mensual" class="form-label">Precio Mensual</label>
                        <input type="number" step="0.01" name="precio_mensual" id="precio_mensual" class="form-control" required value="{{ old('precio_mensual') }}">
                    </div>

                    <div class="mb-3">
                        <label for="beneficios" class="form-label">Beneficios</label>
                        <textarea name="beneficios" id="beneficios" class="form-control" rows="4">{{ old('beneficios') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="duracion_dias" class="form-label">Duración (días)</label>
                        <input type="number" name="duracion_dias" id="duracion_dias" class="form-control" required value="{{ old('duracion_dias') }}">
                    </div>

                    <button type="submit" class="btn btn-warning">Guardar Membresía</button>
                    <a href="{{ route('membresias.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>