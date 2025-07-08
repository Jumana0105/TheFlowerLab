<?php include_once "admin_menu.php" ?>
<?php
include 'conexion.php';
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: cuenta.php");
    exit();
}

$mensaje = "";
$listaCategorias = [];

// Obtener categorías
$consultaCategorias = $conexion->query("SELECT * FROM categoria");
foreach ($consultaCategorias as $fila) {
    $listaCategorias[] = (object) $fila;
}

// Procesar formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $disponible = $_POST['disponibilidad'];
    $categoria = $_POST['categoria'];
    $cantidad = $_POST['cantidad'];

    // Imagen
    $nombreImagen = $_FILES['imagen']['name'];
    $tmp = $_FILES['imagen']['tmp_name'];
    $rutaDestino = "img/" . $nombreImagen;

    move_uploaded_file($tmp, $rutaDestino); // Guarda la imagen en carpeta img/

    // Insertar en producto
    $insertar = "INSERT INTO producto (nombre_producto, descripcion, precio, disponibilidad, id_categoria, imagen)
                 VALUES ('$nombre', '$descripcion', $precio, $disponible, $categoria, '$nombreImagen')";

    if ($conexion->query($insertar)) {
        $idProducto = $conexion->insert_id;

        $conexion->query("INSERT INTO inventario (id_producto, cantidad_disponible) VALUES ($idProducto, $cantidad)");

        $mensaje = "Producto agregado correctamente.";
    } else {
        $mensaje = "Error: " . $conexion->error;
    }
}
?>
<head>
    <title>Agregar Producto</title>
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4 position-relative">
        <a href="admin_productos.php" class="btn btn-outline-secondary position-absolute start-0">Volver</a>
        <h2 class="fw-bold display-6 text-dark mx-auto">Agregar Producto</h2>
    </div>
    <?php if ($mensaje): ?>
        <div class="alert alert-info"><?= $mensaje ?></div>
    <?php endif; ?>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Descripción:</label>
            <textarea name="descripcion" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Precio:</label>
            <input type="number" step="0.01" name="precio" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>¿Disponible?</label>
            <select name="disponibilidad" class="form-control">
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Categoría:</label>
            <select name="categoria" class="form-control">
                <?php foreach ($listaCategorias as $categoria): ?>
                    <option value="<?= $categoria->id_categoria ?>">
                        <?= htmlspecialchars($categoria->nombre_categoria) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Imagen:</label>
            <input type="file" name="imagen" class="form-control" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label>Cantidad en stock:</label>
            <input type="number" name="cantidad" class="form-control" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="admin_productos.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
<!-- Footer -->
<footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2025 Floristería Online. Todos los derechos reservados.</p>
            <p><a href="Privacidad.php" class="text-white">Política de Privacidad</a> | <a href="Terminos.php" class="text-white">Términos y
                    Condiciones</a></p>
        </div>
    </footer>
</body>
</html>
