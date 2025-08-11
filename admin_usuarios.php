<?php 
include_once "admin_menu.php";
// Incluir conexión antes de cualquier salida
include 'conexion.php';

// Procesar inserción de usuario
if (isset($_POST['insertar_usuario'])) {
    $nuevoNombre = $_POST['nuevo_nombre'];
    $nuevoEmail = $_POST['nuevo_email'];
    $nuevoTelefono = $_POST['nuevo_telefono'];
    $nuevoPassword = password_hash($_POST['nuevo_password'], PASSWORD_DEFAULT);
    $nuevoTipo = isset($_POST['es_admin']) ? 'administrador' : 'cliente';
    $resultado = 0;

    $stmt = oci_parse($conn, "BEGIN SP_INSERTAR_USUARIO(:nombre, :email, :telefono, :password, :tipo, :resultado); END;");
    oci_bind_by_name($stmt, ":nombre", $nuevoNombre);
    oci_bind_by_name($stmt, ":email", $nuevoEmail);
    oci_bind_by_name($stmt, ":telefono", $nuevoTelefono);
    oci_bind_by_name($stmt, ":password", $nuevoPassword);
    oci_bind_by_name($stmt, ":tipo", $nuevoTipo);
    oci_bind_by_name($stmt, ":resultado", $resultado, -1, SQLT_INT);
    
    if (oci_execute($stmt)) {
        if ($resultado == 1) {
            header("Location: admin_usuarios.php");
            exit();
        } else {
            $error = "Error al insertar el usuario (probablemente correo duplicado)";
        }
    } else {
        $error = oci_error($conn)['message'];
    }
}

// Procesar eliminación de usuario
if (isset($_GET['eliminar'])) {
    $idEliminar = intval($_GET['eliminar']);
    $resultado = 0;
    
    $stmt = oci_parse($conn, "BEGIN SP_ELIMINAR_USUARIO(:idUsuario, :resultado); END;");
    oci_bind_by_name($stmt, ":idUsuario", $idEliminar);
    oci_bind_by_name($stmt, ":resultado", $resultado, -1, SQLT_INT);
    
    if (oci_execute($stmt)) {
        if ($resultado == 1) {
            header("Location: admin_usuarios.php");
            exit();
        } else {
            $error = "No se pudo eliminar el usuario";
        }
    } else {
        $error = oci_error($conn)['message'];
    }
}

// Obtener lista de usuarios
$cursor = null;
$stmt = oci_parse($conn, "BEGIN SP_LISTAR_USUARIOS(:cursor); END;");
$cursor = oci_new_cursor($conn);
oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);

if (!oci_execute($stmt)) {
    $error = oci_error($conn)['message'];
    die("Error al obtener usuarios: " . $error);
}

if (!oci_execute($cursor)) {
    $error = oci_error($conn)['message'];
    die("Error al ejecutar cursor: " . $error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrar Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4 position-relative">
            <a href="admin.php" class="btn btn-outline-secondary position-absolute start-0">Volver</a>
            <h2 class="fw-bold display-6 text-dark mx-auto">Administración de Usuarios</h2>
        </div>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($usuario = oci_fetch_assoc($cursor)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($usuario['ID']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['NOMBRE']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['EMAIL']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['TELEFONO']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['TIPO_USUARIO']); ?></td>
                            <td>
                                <a href="admin_editar_usuario.php?id=<?php echo htmlspecialchars($usuario['ID']); ?>" class="btn btn-sm btn-warning">Editar</a>
                                <a href="?eliminar=<?php echo htmlspecialchars($usuario['ID']); ?>" 
                                   class="btn btn-sm btn-danger" 
                                   onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">
                                   Eliminar
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <hr class="my-5">
        <h3>Agregar nuevo usuario</h3>

        <form action="admin_usuarios.php" method="POST" class="row g-3">
            <div class="col-md-4">
                <label for="nuevo_nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nuevo_nombre" name="nuevo_nombre" required>
            </div>
            <div class="col-md-4">
                <label for="nuevo_email" class="form-label">Correo</label>
                <input type="email" class="form-control" id="nuevo_email" name="nuevo_email" required>
            </div>
            <div class="col-md-4">
                <label for="nuevo_telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="nuevo_telefono" name="nuevo_telefono" required>
            </div>
            <div class="col-md-6">
                <label for="nuevo_password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="nuevo_password" name="nuevo_password" required>
            </div>
            <div class="col-md-6 d-flex align-items-end">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="es_admin" name="es_admin">
                    <label class="form-check-label" for="es_admin">¿Es administrador?</label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" name="insertar_usuario" class="btn btn-primary w-100">Agregar Usuario</button>
            </div>
        </form>
    </div>

    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2025 Floristería Online. Todos los derechos reservados.</p>
            <p><a href="Privacidad.php" class="text-white">Política de Privacidad</a> | 
               <a href="Terminos.php" class="text-white">Términos y Condiciones</a></p>
        </div>
    </footer>
</body>
</html>