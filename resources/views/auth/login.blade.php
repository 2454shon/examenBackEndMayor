<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Personalizado -->
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            background: #fff;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .form-check-label {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="text-center mb-4">Iniciar Sesión</h2>
        <form method="POST" action="{{ route('inicio_sesion') }}">
            @csrf
            <!-- Campo de usuario -->
            <div class="mb-3">
                <label for="nombre_usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control @error('nombre_usuario') is-invalid @enderror" id="nombre_usuario" name="nombre_usuario" value="{{ old('nombre_usuario') }}" required>
                @error('nombre_usuario')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <!-- Campo de contraseña -->
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <input type="password" class="form-control @error('contrasena') is-invalid @enderror" id="contrasena" name="contrasena" required>
                @error('contrasena')
                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                @enderror
            </div>
            <!-- Checkbox Recuérdame -->
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Recuérdame</label>
            </div>
            <!-- Botón de iniciar sesión -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </div>
        </form>
        
    </div>

    <!-- Bootstrap 5 JS (opcional, para componentes interactivos) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>