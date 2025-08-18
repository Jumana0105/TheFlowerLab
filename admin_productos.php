<?php
include_once "admin_menu.php";
include 'conexion.php';

// Preparar la llamada al cursor
$stmt = oci_parse($conn, "BEGIN :cur := PKG_CRUD_PRODUCTOS.FN_OBTENER_PRODUCTOS(); END;");

// Crear el cursor de Oracle
$cursor = oci_new_cursor($conn);

// Asociar el cursor al parámetro de salida
oci_bind_by_name($stmt, ":cur", $cursor, -1, OCI_B_CURSOR);

// Ejecutar la llamada a la función
if (!oci_execute($stmt)) {
    $error = oci_error($stmt);
    die("Error al obtener productos: " . $error['message']);
}

// Ejecutar el cursor para traer los datos
oci_execute($cursor);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrar Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="admin.php" class="btn btn-outline-secondary">&larr; Volver</a>
        <h2 class="mb-0">Administración de Productos</h2>
        <a href="agregar_producto.php" class="btn btn-success"> + Agregar Producto</a>
        <a href="aumentar_precio.php" class="btn btn-warning"
           onclick="return confirm('¿Deseas aumentar en 5% el precio de todos los productos?')">
           Aumentar precio 5%
        </a>
    </div>
        
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Imagen</th>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Activo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($producto = oci_fetch_assoc($cursor)): ?>
                    <tr>
                        <td class="text-center">
                            <img src="img/<?= htmlspecialchars($producto['IMAGEN']) ?>"
                                 class="img-fluid rounded"
                                 style="max-height: 60px; object-fit: contain;">
                        </td>
                        <td><?= htmlspecialchars($producto['IDPRODUCTOS']) ?></td>
                        <td><?= htmlspecialchars($producto['NOMBRE']) ?></td>
                        <td><?= htmlspecialchars($producto['NOMBRE_CATEGORIA']) ?></td>
                        <td><?= htmlspecialchars($producto['DESCRIPCION']) ?></td>
                        <td>₡<?= number_format($producto['PRECIO'], 2) ?></td>
                        <td><?= htmlspecialchars($producto['CANTIDAD']) ?></td>
                        <td><?= htmlspecialchars($producto['ACTIVO']) ?></td>
                        <td>
                            <a href="modificar_producto.php?id=<?= $producto['IDPRODUCTOS'] ?>" 
                               class="btn btn-primary btn-sm">Editar</a>
                            <form action="eliminar_producto.php" method="post" class="d-inline">
                                <input type="hidden" name="id_producto" value="<?= $producto['IDPRODUCTOS'] ?>">
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Deseas desactivar este producto?')">
                                    Desactivar
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>

<?php
// Liberar recursos
oci_free_statement($cursor);
oci_free_statement($stmt);
oci_close($conn);
?>
