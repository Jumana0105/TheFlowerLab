<?php
include 'conexion.php';

// Logs de usuarios
$cursorUsuarios = oci_new_cursor($conn);
$stmtUsuarios = oci_parse($conn, "BEGIN :cur := pkg_logs.fn_logs_usuarios(); END;");
oci_bind_by_name($stmtUsuarios, ":cur", $cursorUsuarios, -1, OCI_B_CURSOR);
oci_execute($stmtUsuarios);
oci_execute($cursorUsuarios);

// Logs de productos
$cursorProductos = oci_new_cursor($conn);
$stmtProductos = oci_parse($conn, "BEGIN :cur := pkg_logs.fn_logs_productos(); END;");
oci_bind_by_name($stmtProductos, ":cur", $cursorProductos, -1, OCI_B_CURSOR);
oci_execute($stmtProductos);
oci_execute($cursorProductos);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logs de Usuarios y Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="admin.php" class="btn btn-outline-secondary">&larr; Volver</a>
        <h2 class="mb-0">Logs de Usuarios y Productos</h2>
    </div>
    <h2>Logs de Usuarios</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID Usuario</th>
                <th>Acción</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = oci_fetch_assoc($cursorUsuarios)): ?>
                <tr>
                    <td><?= htmlspecialchars($row['ID_USUARIO']) ?></td>
                    <td><?= htmlspecialchars($row['ACCION']) ?></td>
                    <td><?= htmlspecialchars($row['FECHA']) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <h2>Logs de Productos</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID Producto</th>
                <th>Acción</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = oci_fetch_assoc($cursorProductos)): ?>
                <tr>
                    <td><?= htmlspecialchars($row['ID_PRODUCTO']) ?></td>
                    <td><?= htmlspecialchars($row['ACCION']) ?></td>
                    <td><?= htmlspecialchars($row['FECHA']) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
