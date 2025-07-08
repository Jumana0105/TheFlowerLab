<?php include_once "cliente_menu.php" ?>

<head>
    <title>Facturación - Floristería</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="pagina-facturacion">

    <header class="text-center py-5">
        <h1 class="text-center">Facturación</h1>
        <p class="text-center">Aquí puedes gestionar tu facturación y consultar los detalles de tus compras.</p>
    </header>

    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6 mx-auto">
                <form onsubmit="consultarFactura(event)">
                    <div class="mb-3">
                        <label for="invoiceNumber" class="form-label">Número de Factura</label>
                        <input type="text" class="form-control" id="invoiceNumber"
                            placeholder="Ingresa el número de factura" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" placeholder="Ingresa tu correo electrónico"
                            required>
                    </div>
                    <button type="submit" class="btn btn-dark w-100">Consultar Factura</button>
                </form>

                <div id="resultadoFactura" class="mt-4">
                    <!-- Aquí se mostrará la factura -->
                </div>
            </div>
        </div>
    </div>

    <script>
        function consultarFactura(event) {
            event.preventDefault();

            const numero = document.getElementById('invoiceNumber').value;
            const email = document.getElementById('email').value;

            fetch('consultar_factura.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ numero, email })
            })
                .then(res => res.json())
                .then(data => {
                    const resultado = document.getElementById('resultadoFactura');
                    if (!data.success) {
                        resultado.innerHTML = `<div class="alert alert-danger">No se encontró la factura.</div>`;
                        return;
                    }

                    let html = `
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title mb-4">Factura #${data.orden.id_orden}</h3>
                            <p><strong>Correo:</strong> ${data.orden.email}</p>
                            <p><strong>Fecha:</strong> ${data.orden.fecha}</p>
                            <div class="mt-4">
                                <h5>Detalles de la compra:</h5>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                `;

                    data.detalles.forEach(producto => {
                        html += `
                        <tr>
                            <td>${producto.nombre_producto}</td>
                            <td>x${producto.cantidad}</td>
                            <td>₡${(producto.precio_unitario * producto.cantidad).toLocaleString()}</td>
                        </tr>
                    `;
                    });

                    html += `
                                    </tbody>
                                </table>
                                <h4 class="mt-4">Total: ₡${parseFloat(data.orden.total).toLocaleString()}</h4>
                            </div>
                        </div>
                    </div>
                `;

                    // Mostrar la factura debajo del formulario
                    resultado.innerHTML = html;
                });
        }
    </script>

    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2025 Floristería Online. Todos los derechos reservados.</p>
            <p><a href="Privacidad.php" class="text-white">Política de Privacidad</a> | <a href="Terminos.php"
                    class="text-white">Términos y Condiciones</a></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>