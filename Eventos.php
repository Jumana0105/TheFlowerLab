<?php include_once "cliente_menu.php" ?>

<head>
    <title>Decoración de Eventos - Floristería</title>
</head>

<body>
    <div class="container mt-5">
        <div class="section-header d-flex align-items-center justify-content-center" style="background-image: url('img/Eventos1.png'); padding-top: 56px;">
            <div class="overlay"></div>
            <a href="servicios.php" class="btn btn-light position-absolute top-0 start-0 m-5">&larr; Volver</a>
            <div class="text-center position-relative z-index-2">
                <h1 class="text-white display-4">Decoración de Eventos</h1>
                <p class="text-white lead">Ofrecemos arreglos florales y decoraciones para bodas, cumpleaños, graduaciones y baby showers.</p>
            </div>
        </div>

        <!-- Decoraciones para Bodas -->
        <section class="my-5">
            <h3>Bodas</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/boda-arco.png" class="card-img-top" >
                        <div class="card-body">
                            <h5 class="card-title">Arco Floral</h5>
                            <p class="card-text">Arco decorado con flores naturales para ceremonias.</p>
                            <p class="fw-bold">Precio: ₡45,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Arco Floral', 45000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/boda-ramo.jpg" class="card-img-top" alt="Ramo de Novia">
                        <div class="card-body">
                            <h5 class="card-title">Ramo de Novia</h5>
                            <p class="card-text">Ramo personalizado con flores frescas y delicadas.</p>
                            <p class="fw-bold">Precio: ₡25,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Ramo de Novia', 25000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/boda-mesa.webp" class="card-img-top" alt="Arco Floral">
                        <div class="card-body">
                            <h5 class="card-title">Centro de Mesa Florales</h5>
                            <p class="card-text">Elegantes arreglos florales que embellecen las mesas.</p>
                            <p class="fw-bold">Precio: ₡20,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Centro de Mesa Florales', 20000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Decoraciones para Cumpleaños -->
        <section class="my-5">
            <h3>Cumpleaños</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/cumpleaños-mesa.jpg" class="card-img-top" alt="Centro de Mesa">
                        <div class="card-body">
                            <h5 class="card-title">Centro de Mesa</h5>
                            <p class="card-text">Decoración colorida con globos y flores naturales.</p>
                            <p class="fw-bold">Precio: ₡18,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Centro de Mesa Cumpleaños', 18000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/guirnalda-flores.jpg" class="card-img-top" alt="Guirnalda Floral">
                        <div class="card-body">
                            <h5 class="card-title">Guirnalda Floral</h5>
                            <p class="card-text">Guirnalda con flores frescas para la mesa de dulces.</p>
                            <p class="fw-bold">Precio: ₡22,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Guirnalda Floral de Cumpleaños', 22000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/arreglo-pastel.jpg" class="card-img-top" alt="Arreglo Floral para Pastel">
                        <div class="card-body">
                            <h5 class="card-title">Arreglo Floral para Pastel</h5>
                            <p class="card-text">Hermosos arreglos florales para decorar el pastel de cumpleaños.</p>
                            <p class="fw-bold">Precio: ₡15,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Arreglo Floral para Pastel', 15000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Decoraciones para Graduaciones -->
        <section class="my-5">
            <h3>Graduaciones</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/graduacion_ramo.png" class="card-img-top" alt="Ramo de Graduación">
                        <div class="card-body">
                            <h5 class="card-title">Ramo de Graduación</h5>
                            <p class="card-text">Un elegante ramo para celebrar este gran logro.</p>
                            <p class="fw-bold">Precio: ₡15,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Ramo de Graduación', 15000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/decoracion-graduacion.jpg" class="card-img-top" alt="Decoración de escenario">
                        <div class="card-body">
                            <h5 class="card-title">Decoración de Escenario</h5>
                            <p class="card-text">Arreglos florales para el fondo del escenario.</p>
                            <p class="fw-bold">Precio: ₡40,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Decoración de Escenario', 40000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/graduacion_ramo.png" class="card-img-top" alt="Ramo de Graduación">
                        <div class="card-body">
                            <h5 class="card-title">Corona Floral de Graduación</h5>
                            <p class="card-text">Elegante corona floral para la graduación, símbolo de éxito.</p>
                            <p class="fw-bold">Precio: ₡18,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Corona Floral de Graduación', 18000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        

        <!-- Decoraciones para Baby Showers -->
        <section class="my-5">
            <h3>Baby Showers</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/babyshower-mesa.jpg" class="card-img-top" alt="Centro de Mesa Baby Shower">
                        <div class="card-body">
                            <h5 class="card-title">Centro de Mesa</h5>
                            <p class="card-text">Decoración delicada y tierna para mesas de baby shower.</p>
                            <p class="fw-bold">Precio: ₡20,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Centro de Mesa Baby Shower', 20000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/guirnalda-babyshower.jpg" class="card-img-top" alt="Guirnalda de Baby Shower">
                        <div class="card-body">
                            <h5 class="card-title">Guirnalda Floral</h5>
                            <p class="card-text">Hermosa guirnalda de bienvenida para baby showers.</p>
                            <p class="fw-bold">Precio: ₡25,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Guirnalda de Baby Shower', 25000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/arreglo-sillas-babyshower.jpeg" class="card-img-top" alt="Arreglo Floral para Sillas">
                        <div class="card-body">
                            <h5 class="card-title">Arreglo Floral para Sillas</h5>
                            <p class="card-text">Arreglos florales decorativos para embellecer las sillas del evento.</p>
                            <p class="fw-bold">Precio: ₡15,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Arreglo Floral para Sillas', 15000)">Agregar al carrito</button>
                        </div>
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