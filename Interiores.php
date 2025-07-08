<?php include_once "cliente_menu.php" ?>
<head>
    <title>Decoración de Interiores - Floristería</title>
</head>
<body>
    <div class="container mt-5">

        <div class="section-header d-flex align-items-center justify-content-center" style="background-image: url('img/Interiores1.png'); padding-top: 56px;">
            <div class="overlay"></div>
            <a href="servicios.php" class="btn btn-light position-absolute top-0 start-0 m-5">&larr; Volver</a>
            <div class="text-center position-relative z-index-2">
                <h1 class="text-white display-4">Decoración de Interiores</h1>
                <p class="text-white lead">Transforma tu hogar con centros de mesa, arreglos florales y plantas decorativas.</p>
            </div>
        </div>

        <!-- Centros de Mesa -->
        <section class="my-5">
            <h3>Centros de Mesa</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/centro_mesa_rustico.jpeg" class="card-img-top" alt="Centro de Mesa Rústico">
                        <div class="card-body">
                            <h5 class="card-title">Centro de Mesa Rústico</h5>
                            <p class="card-text">Arreglo con flores silvestres y base de madera.</p>
                            <p class="fw-bold">Precio: ₡25,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Centro de Mesa Rústico', 25000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/centro_mesa_moderno.jpg" class="card-img-top" alt="Centro de Mesa Moderno">
                        <div class="card-body">
                            <h5 class="card-title">Centro de Mesa Moderno</h5>
                            <p class="card-text">Diseño minimalista con flores blancas y follaje verde.</p>
                            <p class="fw-bold">Precio: ₡30,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Centro de Mesa Moderno', 30000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/centro_mesa_velas.jpg" class="card-img-top" alt="Centro de Mesa con Velas">
                        <div class="card-body">
                            <h5 class="card-title">Centro de Mesa con Velas</h5>
                            <p class="card-text">Decoración elegante con velas aromáticas y flores frescas.</p>
                            <p class="fw-bold">Precio: ₡27,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Centro de Mesa con Velas', 27000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Arreglos Florales para el Hogar -->
        <section class="my-5">
            <h3>Arreglos Florales para el Hogar</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/arreglo_romantico.jpg" class="card-img-top" alt="Arreglo Romántico">
                        <div class="card-body">
                            <h5 class="card-title">Arreglo Romántico</h5>
                            <p class="card-text">Rosas rojas y blancas en un elegante florero.</p>
                            <p class="fw-bold">Precio: ₡40,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Arreglo Romántico', 40000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/arreglo_exotico.jpg" class="card-img-top" alt="Arreglo Exótico">
                        <div class="card-body">
                            <h5 class="card-title">Arreglo Exótico</h5>
                            <p class="card-text">Combinación de flores tropicales y follaje exuberante.</p>
                            <p class="fw-bold">Precio: ₡45,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Arreglo Exótico', 45000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/arreglo_colgante.avif" class="card-img-top" alt="Arreglo Colgante">
                        <div class="card-body">
                            <h5 class="card-title">Arreglo Colgante</h5>
                            <p class="card-text">Flores en macetas colgantes para espacios acogedores.</p>
                            <p class="fw-bold">Precio: ₡35,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Arreglo Colgante', 35000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Plantas Decorativas -->
        <section class="my-5">
            <h3>Plantas Decorativas</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/suculentas.webp" class="card-img-top" alt="Suculentas en Maceta">
                        <div class="card-body">
                            <h5 class="card-title">Suculentas en Maceta</h5>
                            <p class="card-text">Conjunto de suculentas en elegante maceta de cerámica.</p>
                            <p class="fw-bold">Precio: ₡15,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Suculentas en Maceta', 15000)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="img/bambu_suerte.avif" class="card-img-top" alt="Bambú de la Suerte">
                        <div class="card-body">
                            <h5 class="card-title">Bambú de la Suerte</h5>
                            <p class="card-text">Símbolo de prosperidad y armonía para el hogar.</p>
                            <p class="fw-bold">Precio: ₡18,000</p>
                            <button class="btn btn-success" onclick="agregarAlCarrito('Bambú de la Suerte', 18000)">Agregar al carrito</button>
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
