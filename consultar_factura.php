<?php
include_once 'conexion.php'; // Usa $conexion de mysqli

header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"), true);

$id_orden = intval($data['numero']);
$email = $data['email'];

// Consultar la orden
$stmt = $conexion->prepare("SELECT * FROM orden WHERE id_orden = ? AND email = ?");
$stmt->bind_param("is", $id_orden, $email);
$stmt->execute();
$result = $stmt->get_result();
$orden = $result->fetch_assoc();
$stmt->close();

if (!$orden) {
    echo json_encode(['success' => false]);
    exit;
}

// Consultar los detalles de la orden
$stmt = $conexion->prepare("
    SELECT d.*, p.nombre_producto 
    FROM detalle_orden d
    JOIN producto p ON d.id_producto = p.id_producto
    WHERE d.id_orden = ?
");
$stmt->bind_param("i", $id_orden);
$stmt->execute();
$result = $stmt->get_result();

$detalles = [];
while ($row = $result->fetch_assoc()) {
    $detalles[] = $row;
}
$stmt->close();

echo json_encode([
    'success' => true,
    'orden' => $orden,
    'detalles' => $detalles
]);
