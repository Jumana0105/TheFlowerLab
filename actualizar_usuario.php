<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['id_usuario'])) {
    header("Location: cuenta.php");
    exit();
}

// Obtener datos del formulario
$nuevo_nombre = $_POST['nuevo_nombre'] ?? '';
$nuevo_email = $_POST['nuevo_email'] ?? '';
$nuevo_telefono = $_POST['nuevo_telefono'] ?? '';

try {
    // Llamar al procedimiento almacenado
    $sql = "BEGIN SP_ACTUALIZAR_USUARIO(:id_usuario, :nombre, :telefono, :email, 'Sí', :resultado, :mensaje); END;";
    $stmt = oci_parse($conn, $sql);
    
    oci_bind_by_name($stmt, ':id_usuario', $_SESSION['id_usuario']);
    oci_bind_by_name($stmt, ':nombre', $nuevo_nombre);
    oci_bind_by_name($stmt, ':telefono', $nuevo_telefono);
    oci_bind_by_name($stmt, ':email', $nuevo_email);
    oci_bind_by_name($stmt, ':resultado', $resultado, 32);
    oci_bind_by_name($stmt, ':mensaje', $mensaje, 200);
    
    if (!oci_execute($stmt)) {
        $e = oci_error($stmt);
        throw new Exception("Error en Oracle: " . $e['message']);
    }
    
    if ($resultado == 1) {
        // Actualizar datos en sesión
        $_SESSION['nombre'] = $nuevo_nombre;
        $_SESSION['email'] = $nuevo_email;
        
        header("Location: cuenta.php?actualizado=1");
        exit();
    } else {
        header("Location: cuenta.php?error=" . urlencode($mensaje));
        exit();
    }
} catch (Exception $e) {
    error_log("Error al actualizar usuario: " . $e->getMessage());
    header("Location: cuenta.php?error=Error en el sistema");
    exit();
} finally {
    if (isset($stmt)) {
        oci_free_statement($stmt);
    }
}
?>