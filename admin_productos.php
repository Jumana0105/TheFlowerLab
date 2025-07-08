<?php include_once "admin_menu.php" ?>
<?php
include 'conexion.php';
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: cuenta.php");
    exit();
}

$consulta = "SELECT 
                p.id_producto,
                p.nombre_producto,
                p.descripcion,
                p.precio,
                p.disponibilidad,
                p.imagen,
                c.nombre_categoria,
                i.cantidad_disponible
            FROM producto p
            LEFT JOIN categoria c ON p.id_categoria = c.id_categoria
            LEFT JOIN inventario i ON p.id_producto = i.id_producto";

$resultado = $conexion->query($consulta);
$listaProductos = [];
foreach ($resultado as $fila) {
    $listaProductos[] = (object) $fila;
}
?>


<head>
    <title>Administrar Productos</title>
</head>

<body>
    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center mb-4 position-relative">
            <a href="admin.php" class="btn btn-outline-secondary position-absolute start-0">Volver</a>
            <h2 class="fw-bold display-6 text-dark mx-auto">Administración de Productos</h2>
        </div>
        <a href="agregar_producto.php" class="btn btn-success mb-3">Agregar Producto</a>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Disponible</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaProductos as $producto): ?>
                    <tr>
                        <td><img src="img/<?= htmlspecialchars($producto->imagen) ?>" alt="imagen" width="80"></td>
                        <td><?= htmlspecialchars($producto->nombre_producto) ?></td>
                        <td><?= htmlspecialchars($producto->nombre_categoria ?? 'Sin categoría') ?></td>
                        <td><?= htmlspecialchars($producto->descripcion) ?></td>
                        <td>₡<?= number_format($producto->precio, 2) ?></td>
                        <td><?= $producto->disponibilidad ? 'Sí' : 'No' ?></td>
                        <td><?= $producto->cantidad_disponible ?? 0 ?></td>
                        <td>
                            <a href="modificar_producto.php?id=<?= $producto->id_producto ?>"
                                class="btn btn-primary btn-sm">Editar</a>
                            <form action="eliminar_producto.php" method="post" class="d-inline">
                                <input type="hidden" name="id_producto" value="<?= $producto->id_producto ?>">
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Deseas eliminar este producto?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2025 Floristería Online. Todos los derechos reservados.</p>
            <p><a href="Privacidad.php" class="text-white">Política de Privacidad</a> | <a href="Terminos.php"
                    class="text-white">Términos y
                    Condiciones</a></p>
        </div>
    </footer>
</body>

</html>