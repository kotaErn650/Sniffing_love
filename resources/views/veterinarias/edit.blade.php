<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Veterinaria') }}
        </h1>
    </x-slot>

    <div class="py-8 bg-black" style="background-image: url('/img/cielo.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('veterinarias.update', $veterinaria->id_veterinaria) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <!-- Columna izquierda -->
                            <div class="col-md-6">
                                <!-- Nombre -->
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre de la Veterinaria *</label>
                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                                           id="nombre" name="nombre" value="{{ old('nombre', $veterinaria->nombre) }}" required>
                                    @error('nombre')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- NIT -->
                                <div class="mb-3">
                                    <label for="nit" class="form-label">NIT</label>
                                    <input type="text" class="form-control @error('nit') is-invalid @enderror" 
                                           id="nit" name="nit" value="{{ old('nit', $veterinaria->nit) }}" maxlength="20">
                                    @error('nit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Dirección -->
                                <div class="mb-3">
                                    <label for="direccion" class="form-label">Dirección *</label>
                                    <input type="text" class="form-control @error('direccion') is-invalid @enderror" 
                                           id="direccion" name="direccion" value="{{ old('direccion', $veterinaria->direccion) }}" required maxlength="200">
                                    @error('direccion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Teléfono -->
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Teléfono *</label>
                                    <input type="text" class="form-control @error('telefono') is-invalid @enderror" 
                                           id="telefono" name="telefono" value="{{ old('telefono', $veterinaria->telefono) }}" required maxlength="15">
                                    @error('telefono')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email', $veterinaria->email) }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Columna derecha -->
                            <div class="col-md-6">
                                <!-- Horario Apertura -->
                                <div class="mb-3">
                                    <label for="horario_apertura" class="form-label">Horario de Apertura</label>
                                    <input type="time" class="form-control @error('horario_apertura') is-invalid @enderror" 
                                           id="horario_apertura" name="horario_apertura" 
                                           value="{{ old('horario_apertura', $veterinaria->horario_apertura ? substr($veterinaria->horario_apertura, 0, 5) : '') }}">
                                    @error('horario_apertura')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Horario Cierre -->
                                <div class="mb-3">
                                    <label for="horario_cierre" class="form-label">Horario de Cierre</label>
                                    <input type="time" class="form-control @error('horario_cierre') is-invalid @enderror" 
                                           id="horario_cierre" name="horario_cierre" 
                                           value="{{ old('horario_cierre', $veterinaria->horario_cierre ? substr($veterinaria->horario_cierre, 0, 5) : '') }}">
                                    @error('horario_cierre')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Activa -->
                                <div class="mb-3">
                                    <label for="activa" class="form-label">Estado *</label>
                                    <select class="form-select @error('activa') is-invalid @enderror" id="activa" name="activa" required>
                                        <option value="1" {{ old('activa', $veterinaria->activa) == 1 ? 'selected' : '' }}>Activa</option>
                                        <option value="0" {{ old('activa', $veterinaria->activa) == 0 ? 'selected' : '' }}>Inactiva</option>
                                    </select>
                                    @error('activa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Calificación Promedio -->
                                <div class="mb-3">
                                    <label for="calificacion_promedio" class="form-label">Calificación Promedio *</label>
                                    <input type="number" step="0.1" min="0" max="5" 
                                           class="form-control @error('calificacion_promedio') is-invalid @enderror" 
                                           id="calificacion_promedio" name="calificacion_promedio" 
                                           value="{{ old('calificacion_promedio', $veterinaria->calificacion_promedio) }}" required>
                                    @error('calificacion_promedio')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Usuario Admin (oculto) -->
                                <input type="hidden" name="id_usuario_admin" value="{{ old('id_usuario_admin', $veterinaria->id_usuario_admin) }}">
                            </div>

                            <!-- Campos de ancho completo -->
                            <div class="col-12">
                                <!-- Descripción -->
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                                              id="descripcion" name="descripcion" rows="3">{{ old('descripcion', $veterinaria->descripcion) }}</textarea>
                                    @error('descripcion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Política de Cancelación -->
                                <div class="mb-3">
                                    <label for="politica_cancelacion" class="form-label">Política de Cancelación</label>
                                    <textarea class="form-control @error('politica_cancelacion') is-invalid @enderror" 
                                              id="politica_cancelacion" name="politica_cancelacion" rows="3">{{ old('politica_cancelacion', $veterinaria->politica_cancelacion) }}</textarea>
                                    @error('politica_cancelacion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Coordenadas -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="latitud" class="form-label">Latitud</label>
                                        <input type="number" step="0.000001" class="form-control @error('latitud') is-invalid @enderror" 
                                               id="latitud" name="latitud" value="{{ old('latitud', $veterinaria->latitud) }}">
                                        @error('latitud')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="longitud" class="form-label">Longitud</label>
                                        <input type="number" step="0.000001" class="form-control @error('longitud') is-invalid @enderror" 
                                               id="longitud" name="longitud" value="{{ old('longitud', $veterinaria->longitud) }}">
                                        @error('longitud')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="mt-4 d-flex justify-content-between">
                            <a href="{{ route('veterinarias.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Actualizar Veterinaria</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>