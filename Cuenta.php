<?php include_once "cliente_menu.php" ?>
<?php
session_start();
include 'conexion.php';

$idUsuario = $_SESSION['id'] ?? null;
$datosUsuario = [];

if ($idUsuario) {
    $sql = "SELECT nombre, email, telefono FROM usuarios WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idUsuario);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $datosUsuario = $resultado->fetch_assoc();
}

// Variables seguras para el formulario
$nombreUsuario = $datosUsuario['nombre'] ?? null;
$emailUsuario = $datosUsuario['email'] ?? null;
$telefonoUsuario = $datosUsuario['telefono'] ?? null;
?>
<head>
    <title>Cuenta - Floristería</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body id="pagina-cuenta">
<main class="container">
    <header class="text-center py-5">
        <h1>Mi Cuenta</h1>
        <p>Gestiona tu perfil, pedidos y configuración de cuenta.</p>
    </header>

    <div class="col-md-6 mx-auto">

        <?php if ($nombreUsuario): ?>
            <div class="text-center mb-4">
                <h3>Bienvenido, <?php echo htmlspecialchars($nombreUsuario); ?></h3>
                <div class="d-flex flex-column align-items-center">
                <a href="logout.php" class="btn btn-danger mb-2">Cerrar sesión</a>

                <?php if ($_SESSION['tipo_usuario'] === 'admin'): ?>
                    <a href="admin.php" class="btn btn-outline-dark">Volver al panel administrador</a>
                <?php endif; ?>
            </div>

            </div>

            <?php if (isset($_GET['actualizado'])): ?>
                <div class="alert alert-success text-center">Datos actualizados correctamente.</div>
            <?php endif; ?>

            <hr class="my-4">
            <h4 class="text-center mb-3">Actualizar datos de cuenta</h4>
            <form action="actualizar_usuario.php" method="POST">
                <div class="mb-3">
                    <label for="nuevo_nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nuevo_nombre" name="nuevo_nombre"
                           value="<?php echo htmlspecialchars($nombreUsuario); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nuevo_telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="nuevo_telefono" name="nuevo_telefono"
                           value="<?php echo htmlspecialchars($telefonoUsuario); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nuevo_email" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="nuevo_email" name="nuevo_email"
                           value="<?php echo htmlspecialchars($emailUsuario); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Guardar cambios</button>
            </form>

        <?php else: ?>
            <!-- Formulario de login si no ha iniciado sesión -->
            <form id="form-sesion" action="login.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-dark w-100">Iniciar Sesión</button>
            </form>
            <p class="text-center">¿No tienes cuenta? <a href="Registro.php">Regístrate aquí</a></p>
        <?php endif; ?>
    </div>
</main>

<!-- Footer -->
<footer class="bg-dark text-white py-4 mt-5">
    <div class="container text-center">
        <p>&copy; 2025 Floristería Online. Todos los derechos reservados.</p>
        <p><a href="#" class="text-white">Política de Privacidad</a> | <a href="#" class="text-white">Términos y Condiciones</a></p>
    </div>
</footer>

<!-- Modal de error de login -->
<div class="modal fade" id="loginErrorModal" tabindex="-1" aria-labelledby="loginErrorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="loginErrorModalLabel">Error de inicio de sesión</h5>
      </div>
      <div class="modal-body">
        <p>El correo o la contraseña que ingresaste no son válidos.</p>
        <p>Por favor, intenta de nuevo.</p>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.get("email")) {
        const emailInput = document.getElementById("email");
        if (emailInput) emailInput.value = urlParams.get("email");
    }

    if (urlParams.get("error") === "credenciales") {
        const modal = new bootstrap.Modal(document.getElementById('loginErrorModal'));
        modal.show();
    }
});
</script>

</body>
</html>
