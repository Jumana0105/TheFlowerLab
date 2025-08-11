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
        // Consultar categorías activas desde la base de datos
        $queryCategorias = oci_parse($conn, "BEGIN SP_OBTENER_CATEGORIAS_ACTIVAS(:cursor); END;");
        $cursorCategorias = oci_new_cursor($conn);
        oci_bind_by_name($queryCategorias, ":cursor", $cursorCategorias, -1, OCI_B_CURSOR);
        oci_execute($queryCategorias);
        oci_execute($cursorCategorias);

        // Procesar cada categoría
        while ($categoria = oci_fetch_assoc($cursorCategorias)):
            $idCategoria = $categoria['IDCATEGORIAS'];
            $nombreCategoria = $categoria['NOMBRE'];
            
            // Consultar productos por categoría
            $queryProductos = oci_parse($conn, "BEGIN SP_LISTAR_PRODUCTOS_CATEGORIA(:id_categoria, :cursor); END;");
            oci_bind_by_name($queryProductos, ":id_categoria", $idCategoria);
            $cursorProductos = oci_new_cursor($conn);
            oci_bind_by_name($queryProductos, ":cursor", $cursorProductos, -1, OCI_B_CURSOR);
            oci_execute($queryProductos);
            oci_execute($cursorProductos);
            ?>
            <section class="my-5">
                <h3><?= htmlspecialchars($nombreCategoria) ?></h3>
                <div class="row">
                    <?php $hayProductos = false; ?>
                    <?php while ($producto = oci_fetch_assoc($cursorProductos)): ?>
                        <?php $hayProductos = true; ?>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <img src="img/<?= htmlspecialchars($producto['IMAGEN']) ?>" class="card-img-top"
                                    alt="<?= htmlspecialchars($producto['NOMBRE_PRODUCTO']) ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($producto['NOMBRE_PRODUCTO']) ?></h5>
                                    <p class="card-text"><?= htmlspecialchars($producto['DESCRIPCION']) ?></p>
                                    <p class="fw-bold">Precio: ₡<?= number_format($producto['PRECIO'], 0, '', ',') ?></p>
                                    <button class="btn btn-success" onclick="agregarAlCarrito(<?= $producto['ID_PRODUCTO'] ?>, 
                            '<?= htmlspecialchars($producto['NOMBRE_PRODUCTO']) ?>', <?= $producto['PRECIO'] ?>)">
                                        Agregar al carrito </button>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php if (!$hayProductos): ?>
                        <p class="text-muted">No hay productos disponibles en esta categoría.</p>
                    <?php endif; ?>
                </div>
            </section>
            
            <?php
            // Liberar recursos de productos
            oci_free_statement($queryProductos);
            oci_free_statement($cursorProductos);
        endwhile;
        
        // Liberar recursos de categorías
        oci_free_statement($queryCategorias);
        oci_free_statement($cursorCategorias);
        ?>
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