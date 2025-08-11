<?php
session_start();
include 'conexion.php';

// Obtener datos del formulario
$email = substr(trim($_POST['email'] ?? ''), 0, 150);
$password = $_POST['password'] ?? '';

try {
    // 1. Obtener usuario por email
    $sql = "BEGIN SP_OBTENER_USUARIO_POR_EMAIL(:email, :cursor); END;";
    $stmt = oci_parse($conn, $sql);
    $cursor = oci_new_cursor($conn);
    
    oci_bind_by_name($stmt, ':email', $email);
    oci_bind_by_name($stmt, ':cursor', $cursor, -1, OCI_B_CURSOR);
    
    if (!oci_execute($stmt)) {
        throw new Exception("Error al ejecutar procedimiento");
    }
    if (!oci_execute($cursor)) {
        throw new Exception("Error al ejecutar cursor");
    }
    
    $usuario = oci_fetch_assoc($cursor);
    
    if (!$usuario) {
        header("Location: cuenta.php?error=Usuario no encontrado");
        exit();
    }
    
    // 2. Verificar cuenta activa
    if ($usuario['ACTIVO'] != 'Sí') {
        header("Location: cuenta.php?error=Cuenta inactiva");
        exit();
    }
    
    // 3. Verificar contraseña
    if (password_verify($password, $usuario['PASSWORD'])) {
        // Autenticación exitosa - configurar sesión
        $_SESSION['id_usuario'] = $usuario['IDUSUARIO'];
        $_SESSION['nombre'] = $usuario['NOMBRE'];
        $_SESSION['tipo_usuario'] = $usuario['TIPO_USUARIO'];
        $_SESSION['email'] = $usuario['EMAIL'];
        
        // 4. Redirección según tipo de usuario
        if (strtoupper(trim($usuario['TIPO_USUARIO'])) === 'ADMINISTRADOR') {
            header("Location: admin.php");
        } else {
            header("Location: cuenta.php");
        }
        exit();
    } else {
        header("Location: cuenta.php?error=Credenciales incorrectas");
        exit();
    }
    
} catch (Exception $e) {
    error_log("Error en login: " . $e->getMessage());
    header("Location: cuenta.php?error=Error en el sistema");
    exit();
} finally {
    if (isset($stmt)) oci_free_statement($stmt);
    if (isset($cursor)) oci_free_statement($cursor);
}
?>