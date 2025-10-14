<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
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
            max-width: 1200px;
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
        <h2 class="text-center mb-4">Listado de Usuarios</h2>
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
            <th>Nombre de Usuario</th>
            <th>Nombre Completo</th>
            <th>Rol</th>
            <th>Email</th>
            <th>Estado</th>
            <th>Acciones</th>  <!-- Nueva columna para botones -->
        </tr>
    </thead>
    <tbody>
        @forelse ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->nombre_usuario }}</td>
                <td>{{ $usuario->persona ? $usuario->persona->nombres . ' ' . $usuario->persona->apellidos : 'Sin persona asociada' }}</td>
                <td>{{ $usuario->rol ? $usuario->rol->rol : 'Sin rol' }}</td>
                <td>{{ $usuario->persona ? $usuario->persona->email : 'Sin email' }}</td>
                <td>{{ $usuario->estado == 1 ? 'Activo' : 'Inactivo' }}</td>
                <td>
                    <!-- Botón Editar (GET) -->
                    <a href="{{ route('editar_usuario', $usuario->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <!-- Formulario Eliminar (POST simulando DELETE) -->
                    <form action="{{ route('eliminar_usuario', $usuario->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">No hay usuarios registrados.</td>  <!-- Ajusta colspan a 7 -->
            </tr>
        @endforelse
    </tbody>
</table>
        <div class="mt-3">
            <a href="{{ route('crear_usuario') }}" class="btn btn-primary">Registrar Nuevo Usuario</a>
            <a href="{{ route('inicio_sesion') }}" class="btn btn-secondary">Volver al Inicio</a>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>