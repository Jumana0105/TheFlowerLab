<?php include_once "cliente_menu.php" ?>

<head>
    <title>Floristería</title>
</head>

<body>
    <!-- Carrusel -->
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/flor1.png" class="d-block w-100" alt="Flores 1">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Bienvenido a The Flower Lab</h3>
                    <p>Descubre nuestra colección de flores frescas y únicas.</p>
                    <a href="CatalogoProductos.php" class="btn btn-primary">Ver Catálogo</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/flor2.png" class="d-block w-100" alt="Flores 2">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Decoración para Eventos</h3>
                    <p>Transformamos tus eventos con diseños florales exclusivos.</p>
                    <a href="eventos.php" class="btn btn-primary">Más Información</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/flor3.png" class="d-block w-100" alt="Flores 3">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Diseño de Jardines</h3>
                    <p>Creamos jardines que inspiran y relajan.</p>
                    <a href="jardines.php" class="btn btn-primary">Conoce Más</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Productos más vendidos -->
    <section class="container my-5">
        <h2 class="text-center mb-4 text-black">Productos Más Vendidos</h2>
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card shadow">
                    <img src="img\RamoRosas.png" class="card-img-top" alt="Producto 1">
                    <div class="card-body">
                        <h5 class="card-title">Ramo de Rosas</h5>
                        <p class="card-text">Ramo de 12 rosas rojas frescas, ideales para cualquier ocasión especial.
                        </p>
                        <a href="CatalogoProductos.php" class="btn-ver-mas">Ver Más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card shadow">
                    <img src="img\RamoLirios.png" class="card-img-top" alt="Producto 2">
                    <div class="card-body">
                        <h5 class="card-title">Ramo de Lirios</h5>
                        <p class="card-text">Lirios blancos, elegantes y frescos para cualquier evento o regalo.</p>
                        <a href="CatalogoProductos.php" class="btn-ver-mas">Ver Más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card shadow">
                    <img src="img\Orquidea.png" class="card-img-top" alt="Producto 3">
                    <div class="card-body">
                        <h5 class="card-title">Planta de Orquídeas</h5>
                        <p class="card-text">Una hermosa planta de orquídeas en maceta, para decoración interior.</p>
                        <a href="CatalogoProductos.php" class="btn-ver-mas">Ver Más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card shadow">
                    <img src="img\Girasol.png" class="card-img-top" alt="Producto 4">
                    <div class="card-body">
                        <h5 class="card-title">Ramo de Girasoles</h5>
                        <p class="card-text">Un ramo alegre de girasoles frescos, para iluminar tu día.</p>
                        <a href="CatalogoProductos.php" class="btn-ver-mas">Ver Más</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Catálogo y Servicios -->
    <section class="container my-5">
        <h2 class="text-center mb-4 text-black">Catálogo y Servicios</h2>

        <!-- Servicios -->
        <div class="row">
            <div class="col-md-6 mb-4 text-center">
                <h4>Servicios</h4>
                <div class="list-group">
                    <!-- Decoración de Eventos -->
                    <a href="Eventos.php" class="list-group-item list-group-item-action">
                        <h5 class="mb-1">Decoración de Eventos</h5>
                        <p class="mb-1">Bodas, Cumpleaños, Graduaciones, Baby Showers</p>
                    </a>

                    <!-- Diseño de Jardines -->
                    <a href="jardines.php" class="list-group-item list-group-item-action">
                        <h5 class="mb-1">Diseño de Jardines</h5>
                        <p class="mb-1">Asesoría y Planificación, Instalación y Mantenimiento</p>
                    </a>

                    <!-- Arreglos Corporativos -->
                    <a href="Corporativos.php" class="list-group-item list-group-item-action">
                        <h5 class="mb-1">Arreglos Corporativos</h5>
                        <p class="mb-1">Oficinas y Espacios Comerciales, Contratos Empresariales</p>
                    </a>

                    <!-- Decoración de Interiores -->
                    <a href="Interiores.php" class="list-group-item list-group-item-action">
                        <h5 class="mb-1">Decoración de Interiores</h5>
                        <p class="mb-1">Centros de Mesa, Arreglos para el Hogar</p>
                    </a>
                </div>
            </div>

            <!-- Catálogo de productos (solo texto) -->
            <div class="col-md-6 mb-4 text-center">
                <h4>Catálogo de Productos</h4>
                <div class="list-group">
                    <!-- Ramos de Flores -->
                    <a href="CatalogoProductos.php" class="list-group-item list-group-item-action">
                        <h5 class="mb-1">Ramos de Flores</h5>
                        <p class="mb-1">Explora nuestros hermosos ramos de flores para cualquier ocasión.</p>
                    </a>

                    <!-- Lirios y Flores Blancas -->
                    <a href="CatalogoProductos.php" class="list-group-item list-group-item-action">
                        <h5 class="mb-1">Lirios y Flores Blancas</h5>
                        <p class="mb-1">Descubre nuestros lirios frescos y flores blancas perfectas para eventos.</p>
                    </a>

                    <!-- Plantas y Orquídeas -->
                    <a href="CatalogoProductos.php" class="list-group-item list-group-item-action">
                        <h5 class="mb-1">Plantas y Orquídeas</h5>
                        <p class="mb-1">Selecciona plantas ornamentales y orquídeas para tu hogar o jardín.</p>
                    </a>

                    <!-- Arreglos para el Hogar -->
                    <a href="CatalogoProductos.php" class="list-group-item list-group-item-action">
                        <h5 class="mb-1">Arreglos para el Hogar</h5>
                        <p class="mb-1">Explora arreglos decorativos para tu hogar, desde centros de mesa hasta detalles
                            únicos.</p>
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2025 Floristería Online. Todos los derechos reservados.</p>
            <p><a href="Privacidad.php" class="text-white">Política de Privacidad</a> | <a href="Terminos.php"
                    class="text-white">Términos y
                    Condiciones</a></p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>         
</body>

</html>