<?php
include_once "admin_menu.php";
include 'conexion.php';

$idProducto = $_GET['id'] ?? null;
if (!$idProducto) {
    die("ID de producto no especificado.");
}

$mensaje = "";

// Obtener producto
$stid = oci_parse($conn, "BEGIN :cursor := PKG_CRUD_PRODUCTOS.FN_OBTENER_PRODUCTO(:id); END;");
$cursorProducto = oci_new_cursor($conn);
oci_bind_by_name($stid, ":cursor", $cursorProducto, -1, OCI_B_CURSOR);
oci_bind_by_name($stid, ":id", $idProducto, -1, SQLT_INT);
oci_execute($stid);
oci_execute($cursorProducto);

$producto = oci_fetch_assoc($cursorProducto);
if (!$producto) {
    die("Producto no encontrado.");
}

// Obtener categorías activas
$stidCat = oci_parse($conn, "BEGIN SP_OBTENER_CATEGORIAS_ACTIVAS(:cursor); END;");
$cursorCategorias = oci_new_cursor($conn);
oci_bind_by_name($stidCat, ":cursor", $cursorCategorias, -1, OCI_B_CURSOR);
oci_execute($stidCat);
oci_execute($cursorCategorias);

$listaCategorias = [];
while ($row = oci_fetch_assoc($cursorCategorias)) {
    $listaCategorias[] = $row;
}

// Procesar actualización
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombreNuevo = $_POST['nombre'];
    $descripcionNueva = $_POST['descripcion'];
    $precioNuevo = $_POST['precio'];
    $activoNuevo = $_POST['disponibilidad'];
    $categoriaNueva = $_POST['categoria'];
    $cantidadNueva = $_POST['cantidad'];
    $imagenActual = $_POST['imagen_actual'];

    // Manejar imagen
    if (!empty($_FILES['imagen']['name'])) {
        $nuevaImagen = $_FILES['imagen']['name'];
        move_uploaded_file($_FILES['imagen']['tmp_name'], "img/" . $nuevaImagen);
    } else {
        $nuevaImagen = $imagenActual;
    }

    $stmt = oci_parse($conn, "BEGIN 
        :resultado := PKG_CRUD_PRODUCTOS.FN_ACTUALIZAR_PRODUCTO(
            :id, :nombre, :cantidad, :descripcion, :precio, :activo, :categoria, :imagen
        ); 
    END;");

    oci_bind_by_name($stmt, ":resultado", $resultado, 32, SQLT_INT);
    oci_bind_by_name($stmt, ":id", $idProducto, -1, SQLT_INT);
    oci_bind_by_name($stmt, ":nombre", $nombreNuevo);
    oci_bind_by_name($stmt, ":cantidad", $cantidadNueva, -1, SQLT_INT);
    oci_bind_by_name($stmt, ":descripcion", $descripcionNueva);
    oci_bind_by_name($stmt, ":precio", $precioNuevo);
    oci_bind_by_name($stmt, ":activo", $activoNuevo);
    oci_bind_by_name($stmt, ":categoria", $categoriaNueva, -1, SQLT_INT);
    oci_bind_by_name($stmt, ":imagen", $nuevaImagen);

    if (oci_execute($stmt)) {
        if ($resultado > 0) {
            $mensaje = "Producto actualizado correctamente.";
        } else {
            $mensaje = "No se actualizó ningún producto.";
        }
    } else {
        $mensaje = "Error en la actualización.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Modificar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-5">
    <a href="admin_productos.php" class="btn btn-outline-secondary mb-3">Volver</a>
    <h2 class="mb-4">Editar Producto</h2>

    <?php if ($mensaje): ?>
        <div class="alert alert-info"><?= htmlspecialchars($mensaje) ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?= htmlspecialchars($producto['NOMBRE']) ?>" class="form-control" required />
        </div>
        <div class="mb-3">
            <label>Descripción:</label>
            <textarea name="descripcion" class="form-control" required><?= htmlspecialchars($producto['DESCRIPCION']) ?></textarea>
        </div>
        <div class="mb-3">
            <label>Precio:</label>
            <input type="number" step="0.01" name="precio" value="<?= htmlspecialchars($producto['PRECIO']) ?>" class="form-control" required />
        </div>
        <div class="mb-3">
            <label>¿Disponible?</label>
            <select name="disponibilidad" class="form-control" required>
                <option value="Sí" <?= $producto['ACTIVO'] === 'Sí' ? 'selected' : '' ?>>Sí</option>
                <option value="No" <?= $producto['ACTIVO'] === 'No' ? 'selected' : '' ?>>No</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Categoría:</label>
            <select name="categoria" class="form-control" required>
                <?php foreach ($listaCategorias as $categoria): ?>
                    <option value="<?= $categoria['IDCATEGORIAS'] ?>" <?= $producto['IDCATEGORIAS'] == $categoria['IDCATEGORIAS'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($categoria['NOMBRE']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Imagen actual:</label><br />
            <img src="img/<?= htmlspecialchars($producto['IMAGEN']) ?>" width="100" alt="Imagen producto" /><br />
            <input type="hidden" name="imagen_actual" value="<?= htmlspecialchars($producto['IMAGEN']) ?>" />
            <label class="mt-2">Cambiar imagen:</label>
            <input type="file" name="imagen" class="form-control" accept="image/*" />
        </div>
        <div class="mb-3">
            <label>Cantidad:</label>
            <input type="number" name="cantidad" value="<?= htmlspecialchars($producto['CANTIDAD']) ?>" class="form-control" required />
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
</body>
</html>
