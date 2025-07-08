<?php
include 'conexion.php';
session_start();

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$sql = "SELECT id, nombre, password, tipo_usuario FROM usuarios WHERE email = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    if (password_verify($password, $row['password'])) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['tipo_usuario'] = $row['tipo_usuario'];
        $_SESSION['email'] = $email;

        if ($row['tipo_usuario'] === 'admin') {
            header("Location: admin.php?login=success");
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        header("Location: cuenta.php?error=credenciales");
        exit();
    }
} else {
    header("Location: cuenta.php?error=credenciales");
    exit();
}
?>