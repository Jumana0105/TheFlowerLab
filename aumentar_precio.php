<?php
include 'conexion.php';
$sql = "BEGIN SP_AUMENTAR_PRECIO_PRODUCTOS; END;";
$stmt = oci_parse($conn, $sql);
oci_execute($stmt);
header("Location: admin_productos.php?precio_actualizado=1");
exit();
?>
