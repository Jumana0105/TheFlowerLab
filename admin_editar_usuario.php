<?php
session_start();
include 'conexion.php';

// Verificar sesión y permisos
if (!isset($_SESSION['id']) || $_SESSION['tipo_usuario'] !== 'admin') {
    header("Location: cuenta.php");
    exit();
}

// Obtener el ID del usuario a editar
$idUsuario = $_GET['id'] ?? null;

if (!$idUsuario || !is_numeric($idUsuario)) {
    header("Location: admin_usuarios.php");
    exit();
}

// Obtener datos del usuario
$stmt = $conexion->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $idUsuario);
$stmt->execute();
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

if (!$usuario) {
    echo "Usuario no encontrado.";
    exit();
}

// Actualizar datos si se envió el formulario
if (isset($_POST['actualizar_usuario'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $tipo = $_POST['tipo_usuario'];

    $stmt = $conexion->prepare("UPDATE usuarios SET nombre = ?, email = ?, telefono = ?, tipo_usuario = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $nombre, $email, $telefono, $tipo, $idUsuario);
    $stmt->execute();

    header("Location: admin_usuarios.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <a href="admin_usuarios.php" class="btn btn-outline-secondary mb-4">&larr; Volver</a>

    <h2 class="mb-4">Editar Usuario</h2>

    <form action="" method="POST" class="row g-3">
        <div class="col-md-4">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Correo</label>
            <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="<?php echo htmlspecialchars($usuario['telefono']); ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Tipo de Usuario</label>
            <select name="tipo_usuario" class="form-select" required>
                <option value="cliente" <?php if ($usuario['tipo_usuario'] === 'cliente') echo 'selected'; ?>>Cliente</option>
                <option value="admin" <?php if ($usuario['tipo_usuario'] === 'admin') echo 'selected'; ?>>Administrador</option>
            </select>
        </div>
        <div class="col-12">
            <button type="submit" name="actualizar_usuario" class="btn btn-success">Guardar Cambios</button>
        </div>
    </form>
</body>
</html>
