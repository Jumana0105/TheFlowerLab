<?php
session_start();
$usuario_logueado = isset($_SESSION['email']) ? $_SESSION['email'] : null;
?>

<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <link rel="icon" href="img/favicon.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Estilo para los botones de cantidad (vacío, más pequeño y borde redondeado) */
        .btn-primary {
            font-size: 1.2rem; /* Tamaño de íconos */
            width: 30px; /* Ancho más pequeño */
            height: 30px; /* Alto más pequeño */
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%; /* Borde redondeado */
            border: 1px solid #007bff; /* Borde azul */
            background-color: transparent; /* Fondo transparente */
            color: #007bff; /* Color azul para el ícono */
        }

        .btn-primary:hover {
            background-color: #007bff; /* Fondo azul cuando se pasa el ratón */
            color: white; /* Color blanco para el ícono cuando se pasa el ratón */
        }

        .btn-primary i {
            font-size: 1.2rem; /* Tamaño de íconos */
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1>Tu Carrito</h1>
        <div id="carrito-contenido" class="mt-4"></div>
        <a href="CatalogoProductos.php" class="btn btn-secondary mt-3">Seguir comprando</a>
        <!-- Formulario de pago directamente en la página -->
        <div class="mt-5">
            <h4>Finalizar Compra</h4>

            <h6 class="mt-3">Información de pago</h6>

            <div class="mb-3">
                <label for="correoInput" class="form-label">Correo electrónico:</label>
                <input type="email" class="form-control" id="correoInput" placeholder="ejemplo@correo.com"
                    value="<?= $usuario_logueado ?? '' ?>" <?= $usuario_logueado ? 'readonly' : '' ?>>
            </div>

            <div class="mb-3">
                <label for="nombreTarjeta" class="form-label">Nombre en la tarjeta:</label>
                <input type="text" class="form-control" id="nombreTarjeta" placeholder="Nombre completo">
            </div>

            <div class="mb-3">
                <label for="numeroTarjeta" class="form-label">Número de tarjeta:</label>
                <input type="text" class="form-control" id="numeroTarjeta" maxlength="19"
                    placeholder="XXXX XXXX XXXX XXXX">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="fechaExpiracion" class="form-label">Fecha de expiración:</label>
                    <input type="text" class="form-control" id="fechaExpiracion" maxlength="5" placeholder="MM/AA">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cvv" class="form-label">CVV:</label>
                    <input type="text" class="form-control" id="cvv" maxlength="3" placeholder="123">
                </div>
            </div>


            <button class="btn btn-dark" onclick="enviarCompraDesdeFormulario()">Pagar ahora</button>
        </div>

    </div>

    <!-- Contenedor Toast -->
    <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3">
        <div id="toastMensaje" class="toast bg-success text-white" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Notificación</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
            </div>
            <div class="toast-body" id="toastMensajeTexto"></div>
        </div>
    </div>

    <!-- Estilos personalizados para el toast -->
    <style>
        .toast-container {
            z-index: 9999;
            /* Asegúrate de que se vea por encima de otros elementos */
        }

        #toastMensaje {
            font-size: 1.0rem;
            /* Aumentar tamaño de letra */
        }

        .toast-body {
            color: white;
            /* Hacer el texto blanco */
            font-size: 1.5rem;
            /* Aumentar aún más el tamaño del texto */
        }

        /* Personalizar el fondo del toast */
        .toast.bg-success {
            background-color: #28a745 !important;
            /* Color de fondo verde */
        }

        .toast.bg-danger {
            background-color: #dc3545 !important;
            /* Color de fondo rojo */
        }

        /* Centrar el toast en la parte superior */
        .toast-container {
            top: 10px;
            /* Ajusta para que esté más cerca de la parte superior */
            left: 50%;
            /* Centrar horizontalmente */
            transform: translateX(-50%);
            /* Centrado horizontal */
        }
    </style>

    <script>
        function mostrarCarrito() {
            const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            const contenedor = document.getElementById('carrito-contenido');

            if (carrito.length === 0) {
                contenedor.innerHTML = '<p class="text-center">Tu carrito está vacío.</p>';
                return;
            }

            let html = `
            <table class="table table-hover table-striped table-bordered shadow-sm rounded text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
        `;

            let totalCarrito = 0;

            carrito.forEach((producto, index) => {
                const totalProducto = producto.precio * producto.cantidad;
                totalCarrito += totalProducto;

                html += `
                <tr class="align-middle">
                    <td>${producto.nombre}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <!-- Botón para restar cantidad (azul y redondeado) -->
                            <button class="btn btn-primary btn-sm rounded-circle me-2" onclick="cambiarCantidad(${index}, -1)">
                                <i class="bi bi-dash"></i>
                            </button>
                            ${producto.cantidad}
                            <!-- Botón para agregar cantidad (azul y redondeado) -->
                            <button class="btn btn-primary btn-sm rounded-circle ms-2" onclick="cambiarCantidad(${index}, 1)">
                                <i class="bi bi-plus"></i>
                            </button>
                        </div>
                    </td>
                    <td>₡${totalProducto.toLocaleString()}</td>
                    <td>
                        <button class="btn btn-sm btn-danger" onclick="eliminarDelCarrito(${index})">
                            <i class="bi bi-trash"></i> Eliminar
                        </button>
                    </td>
                </tr>
            `;
            });

            html += `
                </tbody>
                <tfoot class="table-light">
                    <tr>
                        <td colspan="2" class="text-end"><strong>Total Carrito</strong></td>
                        <td colspan="2" class="text-center"><strong>₡${totalCarrito.toLocaleString()}</strong></td>
                    </tr>
                </tfoot>
            </table>
        `;

            contenedor.innerHTML = html;
        }

        function cambiarCantidad(index, cambio) {
            const carrito = JSON.parse(localStorage.getItem('carrito')) || [];

            carrito[index].cantidad += cambio;

            // Validar que no baje de 1
            if (carrito[index].cantidad < 1) {
                carrito[index].cantidad = 1;
            }

            localStorage.setItem('carrito', JSON.stringify(carrito));
            mostrarCarrito();
        }

        function eliminarDelCarrito(index) {
            const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            carrito.splice(index, 1);
            localStorage.setItem('carrito', JSON.stringify(carrito));
            mostrarCarrito(); // Recargar la vista
        }

        function vaciarCarrito() {
            localStorage.removeItem('carrito');
            mostrarCarrito();
        }

        window.onload = mostrarCarrito;

        let carrito = JSON.parse(localStorage.getItem("carrito")) || [];

        function mostrarToast(mensaje, exito = true) {
            const toastEl = document.getElementById('toastMensaje');
            const toastTexto = document.getElementById('toastMensajeTexto');

            toastTexto.innerText = mensaje;
            toastEl.classList.remove('bg-success', 'bg-danger');
            toastEl.classList.add(exito ? 'bg-success' : 'bg-danger');

            const toast = new bootstrap.Toast(toastEl, { delay: 5000 });
            toast.show();
        }

        function finalizarCompra() {
            carrito = JSON.parse(localStorage.getItem("carrito")) || [];
            if (carrito.length === 0) {
                alert("El carrito está vacío.");
                return;
            }

            window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' }); // Baja hasta el formulario
        }


        function enviarCompra(email) {
            const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            const datosFactura = {
                carrito: carrito,
                email: email
            };

            fetch('procesar_compra.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(datosFactura)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Mostrar el toast con el número de orden
                        mostrarToast("Compra realizada exitosamente. Nº de orden: " + data.numero_orden, true);
                        localStorage.removeItem('carrito');
                        // Esperar un poco antes de recargar la página para que el toast se vea
                        setTimeout(() => {
                            location.reload();
                        }, 6000); // Espera 6 segundos antes de recargar la página
                    } else {
                        mostrarToast("Error al procesar la compra: " + data.error, false);
                    }
                })
                .catch(err => {
                    console.error("Error en la solicitud: ", err);
                    mostrarToast("Error al procesar la compra.", false);
                });
        }

        function enviarCompraDesdeFormulario() {
            const emailInput = document.getElementById('correoInput');
            const email = emailInput ? emailInput.value.trim() : "";

            if (!email) {
                alert("Por favor ingresa un correo válido.");
                return;
            }

            enviarCompra(email);
        }
    </script>


    <script>
        // Formatear número de tarjeta: XXXX XXXX XXXX XXXX
        document.getElementById('numeroTarjeta').addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '').slice(0, 16); // Solo números, máx 16
            e.target.value = value.replace(/(.{4})/g, '$1 ').trim(); // Cada 4 dígitos un espacio
        });

        // Formatear fecha: MM/AA con "/" automático
        document.getElementById('fechaExpiracion').addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '').slice(0, 4); // Solo números, máx 4
            if (value.length >= 3) {
                e.target.value = value.slice(0, 2) + '/' + value.slice(2);
            } else {
                e.target.value = value;
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>