<?php include_once "cliente_menu.php" ?>
<?php include 'conexion.php'; ?>

<head>
    <title>Catálogo de Productos - Floristería</title>
</head>

<body>
    <!-- Banner -->
    <div class="container mt-5">
        <div class="section-header d-flex align-items-center justify-content-center"
            style="background-image: url('img/Catalogo.png'); padding-top: 56px;">
            <div class="overlay"></div>
            <a href="servicios.php" class="btn btn-light position-absolute top-0 start-0 m-5">&larr; Volver</a>
            <h1 class="text-white display-4 position-relative">Catálogo de Productos</h1>
        </div>

        <?php
        // IDs de las categorías a mostrar
        $categorias = [
            1 => "Plantas Medicinales",
            2 => "Ramos de Flores",
            3 => "Plantas de Interior"
        ];

        foreach ($categorias as $idCategoria => $nombreCategoria):
            $query = $conexion->prepare("
            SELECT p.*
            FROM producto p
            WHERE p.disponibilidad = 1 AND p.id_categoria = ?
        ");
            $query->bind_param("i", $idCategoria);
            $query->execute();
            $resultado = $query->get_result();
            ?>
            <section class="my-5">
                <h3><?= $nombreCategoria ?></h3>
                <div class="row">
                    <?php if ($resultado->num_rows > 0): ?>
                        <?php while ($producto = $resultado->fetch_assoc()): ?>
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <img src="img/<?= htmlspecialchars($producto['imagen']) ?>" class="card-img-top"
                                        alt="<?= htmlspecialchars($producto['nombre_producto']) ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= htmlspecialchars($producto['nombre_producto']) ?></h5>
                                        <p class="card-text"><?= htmlspecialchars($producto['descripcion']) ?></p>
                                        <p class="fw-bold">Precio: ₡<?= number_format($producto['precio'], 0, '', ',') ?></p>
                                        <button class="btn btn-success" onclick="agregarAlCarrito(<?= $producto['id_producto'] ?>, 
                                '<?= htmlspecialchars($producto['nombre_producto']) ?>', <?= $producto['precio'] ?>)">
                                            Agregar al carrito </button>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p class="text-muted">No hay productos disponibles en esta categoría.</p>
                    <?php endif; ?>
                </div>
            </section>
        <?php endforeach; ?>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2025 Floristería Online. Todos los derechos reservados.</p>
            <p><a href="Privacidad.php" class="text-white">Política de Privacidad</a> | <a href="Terminos.php"
                    class="text-white">Términos y Condiciones</a></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Verifica si el carrito ya existe en localStorage, si no, lo crea
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

        function agregarAlCarrito(id, nombre, precio) {
            let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

            // Verificar si ya existe el producto
            let item = carrito.find(p => p.id === id);

            if (item) {
                item.cantidad += 1;
            } else {
                carrito.push({ id, nombre, precio, cantidad: 1 });
            }

            localStorage.setItem('carrito', JSON.stringify(carrito));
            mostrarToast(`${nombre} agregado al carrito.`);
        }

        // Función para mostrar el toast
        function mostrarToast(mensaje, exito = true) {
            const toastEl = document.getElementById('toastMensaje');
            const toastTexto = document.getElementById('toastMensajeTexto');

            toastTexto.innerText = mensaje;
            toastEl.classList.remove('bg-success', 'bg-danger');
            toastEl.classList.add(exito ? 'bg-success' : 'bg-danger');

            new bootstrap.Toast(toastEl).show();
        }

    </script>

    <!-- Toast para mostrar mensajes bonitos -->
    <div class="position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 9999;">
        <div id="toastMensaje" class="toast align-items-center text-white bg-success border-0" role="alert"
            aria-live="assertive" aria-atomic="true" style="min-width: 300px;">
            <div class="d-flex">
                <div class="toast-body" id="toastMensajeTexto" style="font-size: 1.25rem; padding: 15px 20px;">
                    Mensaje por defecto
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Cerrar"></button>
            </div>
        </div>
    </div>

</body>

</html>