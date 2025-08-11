<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id_producto'])) {
    $id = $_POST['id_producto'];

    $stmt = oci_parse($conn, "
        BEGIN
            :resultado := PKG_CRUD_PRODUCTOS.FN_ELIMINAR_PRODUCTO(:id_producto);
        END;
    ");
    oci_bind_by_name($stmt, ":resultado", $resultado, 32);
    oci_bind_by_name($stmt, ":id_producto", $id);
    oci_execute($stmt);

    if ($resultado > 0) {
        header("Location: admin_productos.php");
        exit();
    } else {
        echo "Error al desactivar producto.";
    }
} else {
    header("Location: admin_productos.php");
    exit();
}
?>
