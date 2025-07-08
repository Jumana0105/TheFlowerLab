<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
    <script src="scripts/script.js"></script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="Index.php">
                <img src="img/favicon.png" alt="Logo de The Flower Lab" width="40" height="40" class="d-inline-block align-text-top me-2">
                <span class="align-middle">The Flower Lab</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Inicio</a></li>
                    <!-- Dropdown para Servicios -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="servicios.php" id="navbarDropdown">
                            Servicios
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="CatalogoProductos.php">Catálogo de Productos</a></li>
                            <li><a class="dropdown-item" href="eventos.php">Decoración de Eventos</a></li>
                            <li><a class="dropdown-item" href="jardines.php">Diseño de Jardines</a></li>
                            <li><a class="dropdown-item" href="corporativos.php">Arreglos Corporativos</a></li>
                            <li><a class="dropdown-item" href="interiores.php">Decoración de Interiores</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="Nosotros.php">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="Ayuda.php">Ayuda</a></li>
                    <li class="nav-item"><a class="nav-link" href="Facturacion.php">Facturación</a></li>
                    <li class="nav-item"><a class="nav-link " href="cuenta.php">Cuenta</a></li>
                    <li class="nav-item"><a class="nav-link" href="carrito.php"><i class="bi bi-cart"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>