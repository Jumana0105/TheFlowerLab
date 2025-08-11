<?php
session_start();
include 'conexion.php';

// Obtener datos del formulario
$nombre = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$password = $_POST['password'] ?? '';

// Validación básica en PHP (frontend)
if (empty($nombre) || empty($email) || empty($password)) {
    header("Location: registro.php?error=campos_requeridos");
    exit();
}

// Hash de la contraseña
$password_hash = password_hash($password, PASSWORD_DEFAULT);

try {
    // Llamar al procedimiento almacenado
    $sql = "BEGIN SP_REGISTRAR_USUARIO(:nombre, :email, :telefono, :password, :resultado, :mensaje, :id_usuario); END;";
    $stmt = oci_parse($conn, $sql);
    
    // Bind de parámetros
    oci_bind_by_name($stmt, ':nombre', $nombre);
    oci_bind_by_name($stmt, ':email', $email);
    oci_bind_by_name($stmt, ':telefono', $telefono);
    oci_bind_by_name($stmt, ':password', $password_hash);
    oci_bind_by_name($stmt, ':resultado', $resultado, 32); 
    oci_bind_by_name($stmt, ':mensaje', $mensaje, 200); 
    oci_bind_by_name($stmt, ':id_usuario', $id_usuario, 32); 
    
    if (!oci_execute($stmt)) {
        $e = oci_error($stmt);
        throw new Exception("Error en Oracle: " . $e['message']);
    }
    
    if ($resultado == 1) {
        // Registro exitoso
        $_SESSION['id_usuario'] = $id_usuario;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['email'] = $email;
        $_SESSION['tipo_usuario'] = 'cliente';
        
        header("Location: cuenta.php");
        exit();
    } else {
        // Error específico
        header("Location: registro.php?error=" . urlencode($mensaje));
        exit();
    }
} catch (Exception $e) {
    error_log("Error en registro: " . $e->getMessage());
    header("Location: registro.php?error=error_sistema");
    exit();
} finally {
    if (isset($stmt)) {
        oci_free_statement($stmt);
    }
}
?>