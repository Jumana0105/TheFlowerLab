<?php
include_once "admin_menu.php";
include 'conexion.php'; // Asegúrate que define $conn



// Obtener ID de usuario a editar
$idUsuario = $_GET['id'] ?? null;
if (!$idUsuario || !is_numeric($idUsuario)) {
    header("Location: admin_usuarios.php");
    exit();
}

// Obtener datos del usuario usando función SQL
$sql_datos = "SELECT FN_OBTENER_USUARIO(:id_usuario) FROM DUAL";
$stmt = oci_parse($conn, $sql_datos);
oci_bind_by_name($stmt, ":id_usuario", $idUsuario);
oci_execute($stmt);

$row = oci_fetch_array($stmt, OCI_NUM);
$cursor = $row[0];
oci_execute($cursor);
$usuario = oci_fetch_assoc($cursor);

if (!$usuario) {
    die("Usuario no encontrado");
}

// Procesar actualización
if (isset($_POST['actualizar_usuario'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $tipo = $_POST['tipo_usuario'];
    $resultado = 0;

    $sql_actualizar = "BEGIN SP_ACTUALIZAR_USUARIO(:id, :nombre, :email, :telefono, :tipo, :resultado); END;";
    $stmt = oci_parse($conn, $sql_actualizar);
    
    oci_bind_by_name($stmt, ":id", $idUsuario);
    oci_bind_by_name($stmt, ":nombre", $nombre);
    oci_bind_by_name($stmt, ":email", $email);
    oci_bind_by_name($stmt, ":telefono", $telefono);
    oci_bind_by_name($stmt, ":tipo", $tipo);
    oci_bind_by_name($stmt, ":resultado", $resultado, -1, SQLT_INT);
    
    if (oci_execute($stmt)) {
        if ($resultado > 0) {
            header("Location: admin_usuarios.php");
            exit();
        } else {
            $error = "No se pudo actualizar el usuario";
        }
    } else {
        $error = oci_error($conn)['message'];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-6">
    <a href="admin_usuarios.php" class="btn btn-outline-secondary mb-4">&larr; Volver</a>

    <h2 class="mb-4">Editar Usuario</h2>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form action="" method="POST" class="row g-3">
        <div class="col-md-4">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" 
                   value="<?= htmlspecialchars($usuario['NOMBRE']) ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Correo</label>
            <input type="email" name="email" class="form-control" 
                   value="<?= htmlspecialchars($usuario['EMAIL']) ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" 
                   value="<?= htmlspecialchars($usuario['TELEFONO']) ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Tipo de Usuario</label>
            <select name="tipo_usuario" class="form-select" required>
                <option value="cliente" <?= $usuario['TIPO_USUARIO'] === 'cliente' ? 'selected' : '' ?>>Cliente</option>
                <option value="administrador" <?= $usuario['TIPO_USUARIO'] === 'administrador' ? 'selected' : '' ?>>Administrador</option>
            </select>
        </div>
        <div class="col-12">
            <button type="submit" name="actualizar_usuario" class="btn btn-success">Guardar Cambios</button>
        </div>
    </form>
</body>
</html>