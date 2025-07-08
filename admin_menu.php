<?php
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <script src="scripts/script.js"></script>
</head>
<body id="pagina-ayuda">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="Index.php">
                <img src="img/favicon.png" alt="Logo de The Flower Lab" width="40" height="40" class="d-inline-block align-text-top me-2">
                <span class="align-middle">The Flower Lab</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="admin.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin_usuarios.php">Usuarios</a></li>
                    <li class="nav-item"><a class="nav-link active" href="admin_productos.php">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="cuenta.php">Vista de cliente</a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link px-3 py-2 ms-2" style="background-color: #dc3545; color: white; border-radius: 6px; border: 1px solid #dc3545; font-size: 1.2rem;"> Cerrar Sesión </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    