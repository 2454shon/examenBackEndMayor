<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Personalizado (mismo que en registro) -->
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .edit-container {
            background: #fff;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        .form-control:focus, .form-select:focus {
            border-color: #28a745;
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
        }
        .btn-success {
            background-color: #28a745;
            border: none;
            transition: background-color 0.3s;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
    </style>
</head>
<body>
    <div class="edit-container">
        <h2 class="text-center mb-4">Editar Usuario</h2>
        <form method="POST" action="{{ route('actualizar_usuario', $usuario->id) }}">
            @csrf
            @method('PUT')  <!-- Método para actualización -->
            <!-- Campo persona_id -->
            <div class="mb-3">
                <label for="persona_id" class="form-label">Persona</label>
                <select class="form-select @error('persona_id') is-invalid @enderror" id="persona_id" name="persona_id" required>
                    <option value="" selected disabled>Selecciona una persona</option>
                    @foreach ($personas as $persona)
                        <option value="{{ $persona->id }}" {{ old('persona_id', $usuario->persona_id) == $persona->id ? 'selected' : '' }}>
                            {{ $persona->nombres . ' ' . $persona->apellidos }}
                        </option>
                    @endforeach
                </select>
                @error('persona_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <!-- Campo rol_id -->
            <div class="mb-3">
                <label for="rol_id" class="form-label">Rol</label>
                <select class="form-select @error('rol_id') is-invalid @enderror" id="rol_id" name="rol_id" required>
                    <option value="" selected disabled>Selecciona un rol</option>
                    @foreach ($roles as $rol)
                        <option value="{{ $rol->id }}" {{ old('rol_id', $usuario->rol_id) == $rol->id ? 'selected' : '' }}>
                            {{ $rol->rol }}
                        </option>
                    @endforeach
                </select>
                @error('rol_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <!-- Campo nombre_usuario -->
            <div class="mb-3">
                <label for="nombre_usuario" class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control @error('nombre_usuario') is-invalid @enderror" id="nombre_usuario" name="nombre_usuario" value="{{ old('nombre_usuario', $usuario->nombre_usuario) }}" required>
                @error('nombre_usuario')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <!-- Campo contrasena (opcional) -->
            <div class="mb-3">
                <label for="contrasena" class="form-label">Nueva Contraseña (opcional)</label>
                <input type="password" class="form-control @error('contrasena') is-invalid @enderror" id="contrasena" name="contrasena">
                @error('contrasena')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <!-- Campo estado -->
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-select @error('estado') is-invalid @enderror" id="estado" name="estado" required>
                    <option value="" selected disabled>Selecciona un estado</option>
                    <option value="1" {{ old('estado', $usuario->estado) == '1' ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ old('estado', $usuario->estado) == '0' ? 'selected' : '' }}>Inactivo</option>
                </select>
                @error('estado')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <!-- Botones -->
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-success">Actualizar Usuario</button>
                <a href="{{ route('auth.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>