<?php include_once "cliente_menu.php" ?>

<head>
    <title>Diseño de Jardines - Floristería</title>
</head>

<body>
    <div class="container mt-5">

        <div class="section-header d-flex align-items-center justify-content-center" style="background-image: url('img/flor3.png'); padding-top: 56px;">
            <div class="overlay"></div>
            <a href="servicios.php" class="btn btn-light position-absolute top-0 start-0 m-5">&larr; Volver</a>
            <div class="text-center position-relative z-index-2">
                <h1 class="text-white display-4">Diseño de Jardines</h1>
                <p class="text-white lead">Ofrecemos asesoría, planificación, instalación y mantenimiento de jardines.</p>
            </div>
        </div>

        <!-- Asesoría de Jardines -->
        <section class="my-5">
            <h3>Asesoría</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/asesoria_jardines.jpg" class="card-img-top" alt="Asesoría de Jardines">
                        <div class="card-body">
                            <h5 class="card-title">Asesoría Personalizada</h5>
                            <p class="card-text">Consulta con nuestros expertos para diseñar tu jardín ideal.</p>
                            <p class="fw-bold">Precio: ₡30,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Asesoría Personalizada', 30000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/asesoria_virtual.jpg" class="card-img-top" alt="Asesoría Virtual">
                        <div class="card-body">
                            <h5 class="card-title">Asesoría Virtual</h5>
                            <p class="card-text">Reunión en línea con expertos en diseño de jardines.</p>
                            <p class="fw-bold">Precio: ₡20,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Asesoría Virtual', 20000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/asesoria_express.webp" class="card-img-top" alt="Asesoría Express">
                        <div class="card-body">
                            <h5 class="card-title">Asesoría Express</h5>
                            <p class="card-text">Evaluación rápida y recomendaciones básicas.</p>
                            <p class="fw-bold">Precio: ₡15,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Asesoría Express', 15000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Planificación de Jardines -->
        <section class="my-5">
            <h3>Planificación</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/planificacion_jardines.jpg" class="card-img-top" alt="Planificación de Espacios">
                        <div class="card-body">
                            <h5 class="card-title">Planificación de Espacios</h5>
                            <p class="card-text">Diseño detallado para maximizar la belleza y funcionalidad.</p>
                            <p class="fw-bold">Precio: ₡50,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Planificación de Espacios', 50000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/diseño_3d.jpg" class="card-img-top" alt="Diseño 3D">
                        <div class="card-body">
                            <h5 class="card-title">Diseño 3D</h5>
                            <p class="card-text">Visualización en 3D antes de la instalación.</p>
                            <p class="fw-bold">Precio: ₡75,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Diseño 3D', 75000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/diseño_sostenible.jpg" class="card-img-top" alt="Diseño Sostenible">
                        <div class="card-body">
                            <h5 class="card-title">Diseño Sostenible</h5>
                            <p class="card-text">Creación de jardines con bajo consumo de agua y mantenimiento.</p>
                            <p class="fw-bold">Precio: ₡60,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Diseño Sostenible', 60000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Instalación de Jardines -->
        <section class="my-5">
            <h3>Instalación</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/instalacion_completa.webp" class="card-img-top" alt="Instalación Completa">
                        <div class="card-body">
                            <h5 class="card-title">Instalación Completa</h5>
                            <p class="card-text">Implementamos el diseño con plantas, flores y estructuras.</p>
                            <p class="fw-bold">Precio: Desde ₡100,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Instalación Completa', 100000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/instalacion_cesped.jpg" class="card-img-top" alt="Césped y Jardineras">
                        <div class="card-body">
                            <h5 class="card-title">Césped y Jardineras</h5>
                            <p class="card-text">Colocación de césped natural o artificial y jardineras decorativas.</p>
                            <p class="fw-bold">Precio: Desde ₡70,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Césped y Jardineras', 70000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/instalacion_riego.jpg" class="card-img-top" alt="Sistemas de Riego">
                        <div class="card-body">
                            <h5 class="card-title">Sistemas de Riego</h5>
                            <p class="card-text">Instalación de sistemas de riego automáticos y personalizados.</p>
                            <p class="fw-bold">Precio: Desde ₡80,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Sistemas de Riego', 80000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mantenimiento de Jardines -->
        <section class="my-5">
            <h3>Mantenimiento</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/poda_y_corta.avif" class="card-img-top" alt="Poda y Corte de Césped">
                        <div class="card-body">
                            <h5 class="card-title">Poda y Corte de Césped</h5>
                            <p class="card-text">Servicio de poda profesional y corte de césped para mantener tu jardín
                                impecable.</p>
                            <p class="fw-bold">Precio: Desde ₡25,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Poda y Corte de Césped', 25000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/fertilizacion.jpg" class="card-img-top" alt="Fertilización y Abono">
                        <div class="card-body">
                            <h5 class="card-title">Fertilización y Abono</h5>
                            <p class="card-text">Aplicación de fertilizantes orgánicos y químicos para fortalecer el
                                crecimiento.</p>
                            <p class="fw-bold">Precio: Desde ₡30,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Fertilización y Abono', 30000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/control_plagas.jpg" class="card-img-top" alt="Control de Plagas y Enfermedades">
                        <div class="card-body">
                            <h5 class="card-title">Control de Plagas y Enfermedades</h5>
                            <p class="card-text">Tratamientos especializados para proteger las plantas contra plagas y
                                enfermedades.</p>
                            <p class="fw-bold">Precio: Desde ₡40,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Control de Plagas y Enfermedades', 40000)">Agregar al carrito</button>
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