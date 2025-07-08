<?php
session_start();
include 'conexion.php';

// Evita espacios antes del header
ob_start();

try {
    if (
        isset($_POST['name']) &&
        isset($_POST['email']) &&
        isset($_POST['telefono']) &&
        isset($_POST['password'])
    ) {
        $nombre = trim($_POST['name']);
        $email = trim($_POST['email']);
        $telefono = trim($_POST['telefono']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nombre, email, telefono, password, tipo_usuario) VALUES (?, ?, ?, ?, 'cliente')";
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssss", $nombre, $email, $telefono, $password);

            if ($stmt->execute()) {
                $_SESSION['email'] = $email;
                $_SESSION['nombre'] = $nombre;
                $_SESSION['tipo_usuario'] = 'cliente';

                header("Location: cuenta.php?email=" . urlencode($email));
                exit();
            } else {
                // Error normal
                header("Location: registro.php?error=registroFallido");
                exit();
            }
        } else {
            header("Location: registro.php?error=stmt");
            exit();
        }
    } else {
        header("Location: registro.php?error=incompleto");
        exit();
    }
} catch (mysqli_sql_exception $e) {
    // Detecta error por entrada duplicada
    if (str_contains($e->getMessage(), "Duplicate entry")) {
        header("Location: registro.php?error=usuarioExiste");
    } else {
        header("Location: registro.php?error=desconocido");
    }
    exit();
}
ob_end_flush();
?>
