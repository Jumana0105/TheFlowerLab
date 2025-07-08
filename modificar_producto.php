<?php include_once "admin_menu.php" ?>
<?php
include 'conexion.php';
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: cuenta.php");
    exit();
}

$idProducto = $_GET['id'];
$mensaje = "";

// Obtener datos del producto
$consultaProducto = "SELECT * FROM producto WHERE id_producto = $idProducto";
$resultadoProducto = $conexion->query($consultaProducto);
$producto = $resultadoProducto->fetch_object();

// Obtener stock actual
$consultaCantidad = "SELECT cantidad_disponible FROM inventario WHERE id_producto = $idProducto";
$inventario = $conexion->query($consultaCantidad)->fetch_object()->cantidad_disponible ?? 0;

// Obtener categorías
$listaCategorias = [];
$resultadoCategorias = $conexion->query("SELECT * FROM categoria");
foreach ($resultadoCategorias as $fila) {
    $listaCategorias[] = (object) $fila;
}

// Procesar edición
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $disponible = $_POST['disponibilidad'];
    $categoria = $_POST['categoria'];
    $cantidad = $_POST['cantidad'];
    $imagenActual = $_POST['imagen_actual'];

    // Imagen
    if ($_FILES['imagen']['name']) {
        $nuevaImagen = $_FILES['imagen']['name'];
        $tmp = $_FILES['imagen']['tmp_name'];
        $ruta = "img/" . $nuevaImagen;
        move_uploaded_file($tmp, $ruta);
    } else {
        $nuevaImagen = $imagenActual; // conservar imagen anterior
    }

    // Actualizar producto
    $actualizarProducto = "UPDATE producto SET 
        nombre_producto = '$nombre',
        descripcion = '$descripcion',
        precio = $precio,
        disponibilidad = $disponible,
        id_categoria = $categoria,
        imagen = '$nuevaImagen'
        WHERE id_producto = $idProducto";

    // Actualizar inventario
    $actualizarInvenatario = "UPDATE inventario SET cantidad_disponible = $cantidad WHERE id_producto = $idProducto";

    if ($conexion->query($actualizarProducto) && $conexion->query($actualizarInvenatario)) {
        $mensaje = "Producto actualizado correctamente.";
        // Recargar datos actualizados
        $producto = $conexion->query($consultaProducto)->fetch_object();
        $stock = $cantidad;
    } else {
        $mensaje = "Error al actualizar: " . $conexion->error;
    }
}
?>

<head>
    <title>Editar Producto</title>
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4 position-relative">
        <a href="admin_productos.php" class="btn btn-outline-secondary position-absolute start-0">Volver</a>
        <h2 class="fw-bold display-6 text-dark mx-auto">Editar Producto</h2>
    </div>

    <?php if ($mensaje): ?>
        <div class="alert alert-info"><?= $mensaje ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?= htmlspecialchars($producto->nombre_producto) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Descripción:</label>
            <textarea name="descripcion" class="form-control" required><?= htmlspecialchars($producto->descripcion) ?></textarea>
        </div>
        <div class="mb-3">
            <label>Precio:</label>
            <input type="number" step="0.01" name="precio" value="<?= $producto->precio ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>¿Disponible?</label>
            <select name="disponibilidad" class="form-control">
                <option value="1" <?= $producto->disponibilidad ? 'selected' : '' ?>>Sí</option>
                <option value="0" <?= !$producto->disponibilidad ? 'selected' : '' ?>>No</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Categoría:</label>
            <select name="categoria" class="form-control">
                <?php foreach ($listaCategorias as $categoria): ?>
                    <option value="<?= $categoria->id_categoria ?>" <?= $producto->id_categoria == $categoria->id_categoria ? 'selected' : '' ?>>
                        <?= htmlspecialchars($categoria->nombre_categoria) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Imagen actual:</label><br>
            <img src="img/<?= $producto->imagen ?>" alt="imagen" width="100"><br>
            <input type="hidden" name="imagen_actual" value="<?= $producto->imagen ?>">
            <label class="mt-2">Cambiar imagen:</label>
            <input type="file" name="imagen" class="form-control" accept="image/*">
        </div>
        <div class="mb-3">
            <label>Cantidad en stock:</label>
            <input type="number" name="cantidad" value="<?= $stock ?>" class="form-control" required>
        </div>
        <div class="mb-5">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="admin_productos.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
</body>
</html>
