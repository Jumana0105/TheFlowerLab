<?php
include 'conexion.php';
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: cuenta.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id_producto'])) {
    $id = $_POST['id_producto'];

    // Eliminar primero de inventario (por clave foránea)
    $conexion->query("DELETE FROM inventario WHERE id_producto = $id");

    // Eliminar el producto
    $conexion->query("DELETE FROM producto WHERE id_producto = $id");

    header("Location: admin_productos.php");
    exit();
} else {
    // Si intentan entrar sin post o sin id, redirigir
    header("Location: admin_productos.php");
    exit();
}
?>
