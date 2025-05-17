<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuevo Producto') }}
        </h1>
    </x-slot>

    <div class="py-8" style="background-image: url('/img/cielo.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-white">
                    <h2 class="mb-0">Crear Nuevo Producto</h2>
                </div>

                <div class="card-body bg-white">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">

                            <!-- Columna izquierda -->
                            <div class="col-md-6">
                                <!-- Nombre -->
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre del Producto</label>
                                    <input type="text" 
                                           class="form-control @error('nombre') is-invalid @enderror" 
                                           id="nombre" name="nombre" 
                                           value="{{ old('nombre') }}" required>
                                    @error('nombre')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Categoría -->
                                <div class="mb-3">
                                    <label for="categoria" class="form-label">Categoría</label>
                                    <select class="form-select @error('categoria') is-invalid @enderror" 
                                            id="categoria" name="categoria" required>
                                        <option value="">Seleccione una categoría</option>
                                        @foreach ($categorias as $key => $value)
                                            <option value="{{ $key }}" {{ old('categoria') == $key ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('categoria')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Precio -->
                                <div class="mb-3">
                                    <label for="precio" class="form-label">Precio ($)</label>
                                    <input type="number" step="0.01" min="0" 
                                           class="form-control @error('precio') is-invalid @enderror" 
                                           id="precio" name="precio" 
                                           value="{{ old('precio') }}" required>
                                    @error('precio')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Veterinaria (ID) -->
                                <!-- Veterinaria (ID) -->
                                <div class="mb-3">
                                    <label for="id_veterinaria" class="form-label">Veterinaria</label>
                                    <select class="form-select @error('id_veterinaria') is-invalid @enderror" id="id_veterinaria" name="id_veterinaria" required>
                                        <option value="">Seleccione una veterinaria</option>
                                        @foreach ($veterinarias as $veterinaria)
                                            <option value="{{ $veterinaria->id }}" {{ old('id_veterinaria') == $veterinaria->id ? 'selected' : '' }}>
                                                {{ $veterinaria->id }} - {{ $veterinaria->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_veterinaria')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Columna derecha -->
                            <div class="col-md-6">
                                <!-- Stock -->
                                <div class="mb-3">
                                    <label for="stock" class="form-label">Stock Disponible</label>
                                    <input type="number" min="0" 
                                           class="form-control @error('stock') is-invalid @enderror" 
                                           id="stock" name="stock" 
                                           value="{{ old('stock', 0) }}" required>
                                    @error('stock')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Imagen -->
                                <div class="mb-3">
                                    <label for="imagen" class="form-label">URL de la Imagen</label>
                                    <input type="url" 
                                           class="form-control @error('imagen') is-invalid @enderror" 
                                           id="imagen" name="imagen" 
                                           value="{{ old('imagen') }}" placeholder="https://">
                                    @error('imagen')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Activo -->
                                <div class="mb-3 form-check form-switch">
                                    <input class="form-check-input" type="checkbox" 
                                           id="activo" name="activo" {{ old('activo') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="activo">Producto activo</label>
                                </div>
                            </div>

                            <!-- Descripción (ancho completo) -->
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                                              id="descripcion" name="descripcion" rows="3">{{ old('descripcion') }}</textarea>
                                    @error('descripcion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('productos.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
