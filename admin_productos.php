<?php
include_once "admin_menu.php";
include 'conexion.php';


// Obtener lista de productos usando la función
$sql = "SELECT PKG_CRUD_PRODUCTOS.FN_OBTENER_PRODUCTOS() FROM DUAL";
$stmt = oci_parse($conn, $sql);

if (!oci_execute($stmt)) {
    $error = oci_error($conn);
    die("Error al obtener productos: " . $error['message']);
}

$row = oci_fetch_array($stmt, OCI_NUM);
$cursor = $row[0];
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
        
    <div class="mb-3 text-end">
      <a href="agregar_producto.php" class="btn btn-success">
        + Agregar Producto
      </a>
    </div>
        
        <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>Imagen</th>
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

</body>
</html>