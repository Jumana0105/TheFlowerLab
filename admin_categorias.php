<?php 
include_once "admin_menu.php";
include 'conexion.php';

// Insertar categoría
if (isset($_POST['insertar_categoria'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $activo = $_POST['activo'];
    $resultado = 0;

    $stmt = oci_parse($conn, "BEGIN PKG_CATEGORIAS.SP_INSERTAR_CATEGORIA(:nombre, :descripcion, :activo, :resultado); END;");
    oci_bind_by_name($stmt, ":nombre", $nombre);
    oci_bind_by_name($stmt, ":descripcion", $descripcion);
    oci_bind_by_name($stmt, ":activo", $activo);
    oci_bind_by_name($stmt, ":resultado", $resultado, -1, SQLT_INT);
    
    if (oci_execute($stmt) && $resultado == 1) {
        header("Location: admin_categorias.php");
        exit();
    } else {
        $error = "Error al insertar la categoría";
    }
}

// Eliminar categoría
if (isset($_GET['eliminar'])) {
    $idEliminar = intval($_GET['eliminar']);
    $resultado = 0;

    $stmt = oci_parse($conn, "BEGIN PKG_CATEGORIAS.SP_ELIMINAR_CATEGORIA(:id, :resultado); END;");
    oci_bind_by_name($stmt, ":id", $idEliminar);
    oci_bind_by_name($stmt, ":resultado", $resultado, -1, SQLT_INT);

    if (oci_execute($stmt) && $resultado == 1) {
        header("Location: admin_categorias.php");
        exit();
    } else {
        $error = "No se pudo eliminar la categoría";
    }
}

// Listar categorías
$cursor = oci_new_cursor($conn);
$stmt = oci_parse($conn, "BEGIN PKG_CATEGORIAS.SP_LISTAR_CATEGORIAS(:cursor); END;");
oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);

oci_execute($stmt);
oci_execute($cursor);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrar Categorías</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
     <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="admin.php" class="btn btn-outline-secondary">&larr; Volver</a>
        <h2 class="mb-0">Administración de Categorías</h2>
      </a>
    </div>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($cat = oci_fetch_assoc($cursor)): ?>
            <tr>
                <td><?= htmlspecialchars($cat['IDCATEGORIAS']) ?></td>
                <td><?= htmlspecialchars($cat['NOMBRE']) ?></td>
                <td><?= htmlspecialchars($cat['DESCRIPCION']) ?></td>
                <td><?= htmlspecialchars($cat['ACTIVO']) ?></td>
                <td>
                    <a href="?eliminar=<?= htmlspecialchars($cat['IDCATEGORIAS']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar categoría?')">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <h3>Agregar Categoría</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Descripción</label>
            <input type="text" name="descripcion" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Activo</label>
            <select name="activo" class="form-control" required>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>
        <button type="submit" name="insertar_categoria" class="btn btn-primary">Guardar</button>
    </form>
</div>
</body>
</html>
