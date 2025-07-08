<?php include_once "admin_menu.php" ?>
<?php
session_start();

// Redirigir si no es admin
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$nombre = $_SESSION['nombre'];
?>

<head>
    <title>Panel de Administración</title>
    <style>
        body {
            background-color: #f4f6f9;
        }
        .admin-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #222;
        }
        .admin-subtitle {
            font-size: 1.3rem;
            color: #666;
        }
        .admin-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            border: none;
            border-radius: 12px;
        }
        .admin-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        .admin-card h5 {
            font-weight: 600;
            font-size: 1.3rem;
        }
        .admin-card p {
            font-size: 0.95rem;
            color: #555;
        }
        .btn-admin {
            font-weight: 600;
            padding: 10px 18px;
            border-radius: 8px;
        }
    </style>
</head>
<body class="container my-5">

    <main>
        <header class="mb-5 text-center">
            <h1 class="fw-bold">Bienvenido(a), <?php echo htmlspecialchars($nombre); ?></h1>
            <h2 class="text-muted">Panel de Administración</h2>
        </header>

        <section class="row justify-content-center g-4">
            <!-- Usuarios -->
            <div class="col-md-5 col-lg-4">
                <div class="card admin-card h-100 text-center p-4 bg-white shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Gestión de Usuarios</h5>
                        <p class="card-text">Edita, bloquea o elimina cuentas de usuarios registrados.</p>
                        <a href="admin_usuarios.php" class="btn btn-dark w-100 btn-admin">Ir a Usuarios</a>
                    </div>
                </div>
            </div>

            <!-- Productos -->
            <div class="col-md-5 col-lg-4">
                <div class="card admin-card h-100 text-center p-4 bg-white shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Gestión de Productos</h5>
                        <p class="card-text">Administra el catálogo de productos fácilmente.</p>
                        <a href="admin_productos.php" class="btn btn-dark w-100 btn-admin">Ir a Productos</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

</body>
</html>
