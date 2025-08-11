<?php 
// Incluye primero el menú de administración con las verificaciones
include_once "admin_menu.php";

// Ahora el contenido seguro solo para administradores
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - FlowerLab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .admin-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 10px;
            overflow: hidden;
            border: none;
        }
        .admin-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .card-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="display-4">Panel de Administración</h1>
            <p class="lead text-muted">Bienvenido, <?= htmlspecialchars($_SESSION['nombre'] ?? 'Administrador') ?></p>
        </div>

        <div class="row g-4">
            <!-- Gestión de Usuarios -->
            <div class="col-md-6">
                <div class="card admin-card h-100">
                    <div class="card-body text-center p-4">
                        <div class="card-icon">👥</div>
                        <h3>Gestión de Usuarios</h3>
                        <p class="text-muted">Administra todos los usuarios del sistema</p>
                        <a href="admin_usuarios.php" class="btn btn-dark">Acceder</a>
                    </div>
                </div>
            </div>

            <!-- Gestión de Productos -->
            <div class="col-md-6">
                <div class="card admin-card h-100">
                    <div class="card-body text-center p-4">
                        <div class="card-icon">🌺</div>
                        <h3>Gestión de Productos</h3>
                        <p class="text-muted">Administra el catálogo de productos</p>
                        <a href="admin_productos.php" class="btn btn-dark">Acceder</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>