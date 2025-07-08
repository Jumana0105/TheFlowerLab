<?php include_once "cliente_menu.php" ?>

<head>
    <title>Recuperar Contraseña - Floristería</title>
</head>

<body id="pagina-contraseña">
    <div class="container mt-5 position-relative">
        <a href="cuenta.php" class="btn btn-outline-dark position-absolute top-0 start-0 mt-3 ms-3">&larr; Volver</a>
        <h2 class="text-center">Recuperar Contraseña</h2>
        <p class="text-center">Ingresa tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.
        </p>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" placeholder="Ingresa tu correo" required>
                    </div>
                    <button type="submit" class="btn btn-dark w-100">Enviar Enlace</button>
                </form>
            </div>
        </div>
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
</body>

</html>