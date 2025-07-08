<?php include_once "admin_menu.php"; ?>
<?php
include 'conexion.php';
session_start();

//Solo acceden admins
if (!isset($_SESSION['id']) || $_SESSION['tipo_usuario'] !== 'admin') {
    header("Location: cuenta.php");
    exit();
}

//Agregar usuario
if (isset($_POST['insertar_usuario'])) {
    $nuevoNombre   = $_POST['nuevo_nombre'];
    $nuevoEmail    = $_POST['nuevo_email'];
    $nuevoTelefono = $_POST['nuevo_telefono'];
    $nuevoPassword = password_hash($_POST['nuevo_password'], PASSWORD_DEFAULT);
    $nuevoTipo     = isset($_POST['es_admin']) ? 'admin' : 'cliente';

    $stmtInsert = $conexion->prepare(
        "INSERT INTO usuarios (nombre, email, telefono, password, tipo_usuario) VALUES (?, ?, ?, ?, ?)"
    );
    $stmtInsert->bind_param("sssss", $nuevoNombre, $nuevoEmail, $nuevoTelefono, $nuevoPassword, $nuevoTipo);

    if ($stmtInsert->execute()) {
        header("Location: admin_usuarios.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Error al insertar el usuario: " . htmlspecialchars($stmtInsert->error) . "</div>";
    }
}

//Eliminar usuarios
if (isset($_GET['eliminar'])) {
    $idEliminar = intval($_GET['eliminar']);
    $stmt = $conexion->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $idEliminar);
    $stmt->execute();
    header("Location: admin_usuarios.php");
    exit();
}

//Obtener usuarios de la DB
$usuarios = $conexion->query("SELECT id, nombre, email, telefono, tipo_usuario FROM usuarios ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrar Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4 position-relative">
            <a href="admin.php" class="btn btn-outline-secondary position-absolute start-0">Volver</a>
            <h2 class="fw-bold display-6 text-dark mx-auto">Administración de Usuarios</h2>
        </div>

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($usuario = $usuarios->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $usuario['id']; ?></td>
                        <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['telefono']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['tipo_usuario']); ?></td>
                        <td>
                            <a href="admin_editar_usuario.php?id=<?php echo $usuario['id']; ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="?eliminar=<?php echo $usuario['id']; ?>" 
                               class="btn btn-sm btn-danger" 
                               onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">
                               Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <hr class="my-5">
        <h3>Agregar nuevo usuario</h3>

        <form action="admin_usuarios.php" method="POST" class="row g-3">
            <div class="col-md-4">
                <label for="nuevo_nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nuevo_nombre" name="nuevo_nombre" required>
            </div>
            <div class="col-md-4">
                <label for="nuevo_email" class="form-label">Correo</label>
                <input type="email" class="form-control" id="nuevo_email" name="nuevo_email" required>
            </div>
            <div class="col-md-4">
                <label for="nuevo_telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="nuevo_telefono" name="nuevo_telefono" required>
            </div>
            <div class="col-md-6">
                <label for="nuevo_password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="nuevo_password" name="nuevo_password" required>
            </div>
            <div class="col-md-6 d-flex align-items-end">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="es_admin" name="es_admin">
                    <label class="form-check-label" for="es_admin">¿Es administrador?</label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" name="insertar_usuario" class="btn btn-primary w-100">Agregar Usuario</button>
            </div>
        </form>
    </div>

    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2025 Floristería Online. Todos los derechos reservados.</p>
            <p><a href="Privacidad.php" class="text-white">Política de Privacidad</a> | 
               <a href="Terminos.php" class="text-white">Términos y Condiciones</a></p>
        </div>
    </footer>
</body>
</html>
