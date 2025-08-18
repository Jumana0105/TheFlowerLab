<?php
include_once "admin_menu.php";
include 'conexion.php';

$mensaje = "";
$listaCategorias = [];

$stidCat = oci_parse($conn, "BEGIN SP_OBTENER_CATEGORIAS_ACTIVAS(:cursor); END;");
$cursorCat = oci_new_cursor($conn);
oci_bind_by_name($stidCat, ":cursor", $cursorCat, -1, OCI_B_CURSOR);
oci_execute($stidCat);
oci_execute($cursorCat);

while (($row = oci_fetch_assoc($cursorCat)) !== false) {
    $listaCategorias[] = $row;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $disponible = ($_POST['disponibilidad'] == '1') ? 'Sí' : 'No'; 
    $categoria = $_POST['categoria'];
    $cantidad = $_POST['cantidad'];

    $nombreImagen = $_FILES['imagen']['name'];
    $tmp = $_FILES['imagen']['tmp_name'];
    $rutaDestino = "img/" . $nombreImagen;

    move_uploaded_file($tmp, $rutaDestino);

    $stidAdd = oci_parse($conn, "
        BEGIN
            PKG_CRUD_PRODUCTOS.SP_AGREGAR_PRODUCTO(
                :p_nombre,
                :p_cantidad,
                :p_descripcion,
                :p_precio,
                :p_activo,
                :p_id_categoria,
                :p_imagen,
                :p_resultado,
                :p_id_generado
            );
        END;
    ");

    oci_bind_by_name($stidAdd, ':p_nombre', $nombre);
    oci_bind_by_name($stidAdd, ':p_cantidad', $cantidad, -1, SQLT_INT);
    oci_bind_by_name($stidAdd, ':p_descripcion', $descripcion);
    oci_bind_by_name($stidAdd, ':p_precio', $precio);
    oci_bind_by_name($stidAdd, ':p_activo', $disponible);
    oci_bind_by_name($stidAdd, ':p_id_categoria', $categoria, -1, SQLT_INT);
    oci_bind_by_name($stidAdd, ':p_imagen', $nombreImagen);
    oci_bind_by_name($stidAdd, ':p_resultado', $resultado, 32);
    oci_bind_by_name($stidAdd, ':p_id_generado', $idGenerado, 32);

    oci_execute($stidAdd);

    if ($resultado == 1) {
        $mensaje = "Producto agregado correctamente con ID: $idGenerado";
    } else {
        $mensaje = "Error al agregar producto.";
    }
}
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4 position-relative">
        <a href="admin_productos.php" class="btn btn-outline-secondary position-absolute start-0">Volver</a>
        <h2 class="fw-bold display-6 text-dark mx-auto">Agregar Producto</h2>
    </div>
    <?php if ($mensaje): ?>
        <div class="alert alert-info"><?= $mensaje ?></div>
    <?php endif; ?>
    <form method="POST" enctype="multipart/form-data" class="row g-3">
        <div class="col-md-6">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label>Cantidad en stock:</label>
            <input type="number" name="cantidad" class="form-control" required>
        </div>
        <div class="col-12">
            <label>Descripción:</label>
            <textarea name="descripcion" class="form-control" required></textarea>
        </div>
        <div class="col-md-4">
            <label>Precio:</label>
            <input type="number" step="0.01" name="precio" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label>¿Disponible?</label>
            <select name="disponibilidad" class="form-select" required>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="col-md-4">
            <label>Categoría:</label>
            <select name="categoria" class="form-select" required>
                <?php foreach ($listaCategorias as $categoria): ?>
                    <option value="<?= $categoria['IDCATEGORIAS'] ?>">
                        <?= htmlspecialchars($categoria['NOMBRE']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-6">
            <label>Imagen:</label>
            <input type="file" name="imagen" class="form-control" accept="image/*" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="admin_productos.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
