<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Rol</title>
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
        .register-container {
            background: #fff;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        .form-control:focus {
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
    </style>
</head>
<body>
    <div class="register-container">
        <h2 class="text-center mb-4">Registrar Rol</h2>
        <form method="POST" action="{{ route('guardar_rol') }}">
            @csrf
            <!-- Rol -->
            <div class="mb-3">
                <label for="rol" class="form-label">Nombre del Rol</label>
                <input type="text" class="form-control @error('rol') is-invalid @enderror" id="rol" name="rol" value="{{ old('rol') }}" required>
                @error('rol')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <!-- Botón de envío -->
            <div class="d-grid">
                <button type="submit" class="btn btn-success">Registrar Rol</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>