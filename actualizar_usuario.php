<?php
include 'conexion.php';
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: cuenta.php");
    exit();
}

$id = $_SESSION['id'];
$nombre = $_POST['nuevo_nombre'] ?? '';
$telefono = $_POST['nuevo_telefono'] ?? '';
$email = $_POST['nuevo_email'] ?? '';

$sql = "UPDATE usuarios SET nombre = ?, telefono = ?, email = ? WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("sssi", $nombre, $telefono, $email, $id);

if ($stmt->execute()) {
    $_SESSION['nombre'] = $nombre;
    $_SESSION['email'] = $email;
    header("Location: cuenta.php?actualizado=1");
} else {
    echo "Error al actualizar datos: " . $stmt->error;
}
?>
