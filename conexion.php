<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conexion = new mysqli("localhost", "floristeria", "123", "floristeria");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>