<?php
session_start();
header('Content-Type: application/json');
ini_set('display_errors', 1);
error_reporting(E_ALL);

$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode(['success' => false, 'error' => 'Datos no recibidos correctamente']);
    exit();
}

$carrito = $data['carrito'];
$email = isset($_SESSION['email']) ? $_SESSION['email'] : $data['email'];

if (empty($carrito)) {
    echo json_encode(['success' => false, 'error' => 'El carrito está vacío']);
    exit();
}

include_once 'conexion.php';

$conexion->begin_transaction();

try {
    // Calcular el total de la compra
    $total = 0;
    foreach ($carrito as $item) {
        $total += $item['precio'] * $item['cantidad'];
    }

    // Insertar la orden en la base de datos
    $stmt = $conexion->prepare("INSERT INTO orden (email, total) VALUES (?, ?)");
    $stmt->bind_param("sd", $email, $total);
    $stmt->execute();
    $id_orden = $stmt->insert_id;
    $stmt->close();

    // Insertar los detalles de la orden en la base de datos
    $stmtDetalle = $conexion->prepare("INSERT INTO detalle_orden (id_orden, id_producto, cantidad, precio_unitario) VALUES (?, ?, ?, ?)");
    foreach ($carrito as $item) {
        $stmtDetalle->bind_param("iiid", $id_orden, $item['id'], $item['cantidad'], $item['precio']);
        $stmtDetalle->execute();
    }
    $stmtDetalle->close();

    // Confirmar la transacción
    $conexion->commit();

    // Responder con éxito y el número de orden generado
    echo json_encode(['success' => true, 'numero_orden' => $id_orden]);
} catch (Exception $e) {
    // Si ocurre un error, revertir la transacción
    $conexion->rollback();
    error_log($e->getMessage(), 3, 'errores.log');
    echo json_encode(['success' => false, 'error' => 'Ocurrió un error en el procesamiento de la compra']);
}
?>