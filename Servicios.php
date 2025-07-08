<?php include_once "cliente_menu.php" ?>

<head>
    <title>Servicios - Floristería</title>
</head>

<body>
    <!-- Sección de Servicios -->
    <section class="container my-5 pt-5">
        <div class="section-header d-flex align-items-center justify-content-center" style="background-image: url('img/Servicios.png')">
            <div class="overlay"></div>
            <h1 class="text-white display-4">Nuestros Servicios</h1>
        </div>

        <div class="row justify-content-center" style="padding-top:20px;">
            <!-- Catálogo de Productos -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow h-100 text-center p-3">
                    <div class="card-body">
                        <h4 class="card-title">Catálogo de Productos</h4>
                        <p class="card-text">Explora nuestras categorías, precios y reseñas de productos.</p>
                        <div class="d-flex justify-content-center my-3">
                            <img src="img/Productos.png" class="img-fluid" alt="Catálogo de Productos"
                             style="width: 100%; height: 250px;">
                        </div>
                        <a href="CatalogoProductos.php" class="btn-servicios">Ver Más</a>
                    </div>
                </div>
            </div>

            <!-- Decoración de Eventos -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow h-100 text-center p-3">
                    <div class="card-body">
                        <h4 class="card-title">Decoración de Eventos</h4>
                        <p class="card-text">Bodas, cumpleaños, graduaciones y baby showers con los mejores arreglos.
                        </p>
                        <div class="d-flex justify-content-center my-3">
                            <img src="img/Eventos.png" class="img-fluid" alt="Eventos"
                            style="width: 100%; height: 250px;">
                        </div>
                        <a href="eventos.php" class="btn-servicios">Ver Más</a>
                    </div>
                </div>
            </div>

            <!-- Diseño de Jardines -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow h-100 text-center p-3">
                    <div class="card-body">
                        <h4 class="card-title">Diseño de Jardines</h4>
                        <p class="card-text">Asesoría, planificación, instalación y mantenimiento de jardines.</p>
                        <div class="d-flex justify-content-center my-3">
                            <img src="img/Jardines.png" class="img-fluid" alt="Jardines"
                            style="width: 100%; height: 250px;">
                        </div>
                        <a href="jardines.php" class="btn-servicios">Ver Más</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Últimos 2 cards centrados -->
        <div class="row justify-content-center">
            <!-- Arreglos Corporativos -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow h-100 text-center p-3">
                    <div class="card-body">
                        <h4 class="card-title">Arreglos Corporativos</h4>
                        <p class="card-text">Decoramos oficinas, espacios comerciales y ofrecemos contratos
                            empresariales.</p>
                        <div class="d-flex justify-content-center my-3">
                            <img src="img/Corporativo.png" class="img-fluid" alt="Corporativos"
                            style="width: 100%; height: 250px;">
                        </div>
                        <a href="corporativos.php" class="btn-servicios">Ver Más</a>
                    </div>
                </div>
            </div>

            <!-- Decoración de Interiores -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow h-100 text-center p-3">
                    <div class="card-body">
                        <h4 class="card-title">Decoración de Interiores</h4>
                        <p class="card-text">Centros de mesa y arreglos florales para el hogar.</p>
                        <div class="d-flex justify-content-center my-3">
                            <img src="img/Interiores.png" class="img-fluid" alt="Interiores"
                            style="width: 100%; height: 250px;">
                        </div>
                        <a href="interiores.php" class="btn-servicios">Ver Más</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2025 Floristería Online. Todos los derechos reservados.</p>
            <p><a href="Privacidad.php" class="text-white">Política de Privacidad</a> | <a href="Terminos.php" class="text-white">Términos y
                    Condiciones</a></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>