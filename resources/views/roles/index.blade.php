<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Roles</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Personalizado -->
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 2rem;
        }
        .table-container {
            background: #fff;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        .table thead {
            background-color: #28a745;
            color: #fff;
        }
        .table tbody tr:hover {
            background-color: #f8f9fa;
        }
        .btn-primary {
            background-color: #28a745;
            border: none;
        }
        .btn-primary:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="table-container">
        <h2 class="text-center mb-4">Listado de Roles</h2>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Rol</th>
                    <th>Creado</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $rol)
                    <tr>
                        <td>{{ $rol->id }}</td>
                        <td>{{ $rol->rol }}</td>
                        <td>{{ $rol->created_at ? $rol->created_at->format('d/m/Y H:i') : 'No disponible' }}</td> <!-- Manejo de null -->
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No hay roles registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-3">
            <a href="{{ route('crear_rol') }}" class="btn btn-primary">Registrar Nuevo Rol</a>
            <a href="{{ route('inicio_sesion') }}" class="btn btn-secondary">Volver al Inicio</a>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>