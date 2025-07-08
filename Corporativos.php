<?php include_once "cliente_menu.php" ?>
<head>
    <title>Arreglos Corporativos - Floristería</title>
</head>
<body>
    <div class="container mt-5">

        <div class="section-header d-flex align-items-center justify-content-center" style="background-image: url('img/Corporativo1.png'); padding-top: 56px;">
            <div class="overlay"></div>
            <a href="servicios.php" class="btn btn-light position-absolute top-0 start-0 m-5">&larr; Volver</a>
            <div class="text-center position-relative z-index-2">
                <h1 class="text-white display-4">Arreglos Corporativos</h1>
                <p class="text-white lead">Decoramos oficinas, espacios comerciales y ofrecemos contratos empresariales personalizados.</p>
            </div>
        </div>

        <!-- Decoración de Oficinas -->
        <section class="my-5">
            <h3>Decoración de Oficinas</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/arreglo_oficinas.jpg" class="card-img-top" alt="Arreglo Floral para Oficinas">
                        <div class="card-body">
                            <h5 class="card-title">Arreglo Floral para Oficinas</h5>
                            <p class="card-text">Diseños florales elegantes para recepción y áreas comunes.</p>
                            <p class="fw-bold">Precio: ₡35,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Arreglo Floral para Oficinas', 35000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/planta_oficinas.jpg" class="card-img-top" alt="Plantas para Oficina">
                        <div class="card-body">
                            <h5 class="card-title">Plantas para Oficina</h5>
                            <p class="card-text">Plantas de bajo mantenimiento ideales para mejorar el ambiente de trabajo.</p>
                            <p class="fw-bold">Precio: ₡28,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Plantas para Oficina', 28000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/muro_verde.webp" class="card-img-top" alt="Muros Verdes">
                        <div class="card-body">
                            <h5 class="card-title">Muros Verdes</h5>
                            <p class="card-text">Instalación de muros verdes para un ambiente fresco y moderno.</p>
                            <p class="fw-bold">Precio: Desde ₡150,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Muros Verdes', 150000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Espacios Comerciales -->
        <section class="my-5">
            <h3>Espacios Comerciales</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/vitrinas_florales.avif" class="card-img-top" alt="Vitrinas Florales">
                        <div class="card-body">
                            <h5 class="card-title">Vitrinas Florales</h5>
                            <p class="card-text">Decoración de vitrinas y escaparates con arreglos llamativos.</p>
                            <p class="fw-bold">Precio: Desde ₡45,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Vitrinas Florales', 45000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/restaurantes_florales.jpg" class="card-img-top" alt="Decoración para Restaurantes">
                        <div class="card-body">
                            <h5 class="card-title">Decoración para Restaurantes</h5>
                            <p class="card-text">Ambientes florales diseñados para realzar la experiencia de los clientes.</p>
                            <p class="fw-bold">Precio: Desde ₡50,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Decoración para Restaurantes', 50000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/centros_comerciales.jpg" class="card-img-top" alt="Áreas Verdes en Centros Comerciales">
                        <div class="card-body">
                            <h5 class="card-title">Áreas Verdes en Centros Comerciales</h5>
                            <p class="card-text">Diseño y mantenimiento de áreas verdes en espacios comerciales.</p>
                            <p class="fw-bold">Precio: Desde ₡100,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Áreas Verdes en Centros Comerciales', 100000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contratos Empresariales -->
        <section class="my-5">
            <h3>Contratos Empresariales</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/contrato_oficinas.jpg" class="card-img-top" alt="Contrato de Oficinas">
                        <div class="card-body">
                            <h5 class="card-title">Contrato de Oficinas</h5>
                            <p class="card-text">Servicio de arreglos florales recurrentes para oficinas.</p>
                            <p class="fw-bold">Desde ₡120,000 / mes</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Contrato de Oficinas', 120000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2025 Floristería Online. Todos los derechos reservados.</p>
            <p><a href="Privacidad.php" class="text-white">Política de Privacidad</a> | <a href="Terminos.php" class="text-white">Términos y
                    Condiciones</a></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Verifica si el carrito ya existe en localStorage, si no, lo crea
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    
        function agregarAlCarrito(nombre, precio) {
            // Buscar si ya existe el producto
            const productoExistente = carrito.find(p => p.nombre === nombre);
            
            if (productoExistente) {
                productoExistente.cantidad += 1;
            } else {
                carrito.push({ nombre, precio, cantidad: 1 });
            }
    
            // Guarda el carrito actualizado en localStorage
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
  <div id="toastMensaje" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" style="min-width: 300px;">
    <div class="d-flex">
      <div class="toast-body" id="toastMensajeTexto" style="font-size: 1.25rem; padding: 15px 20px;">
        Mensaje por defecto
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Cerrar"></button>
    </div>
  </div>
</div>
</body>
</html>
