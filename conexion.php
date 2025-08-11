<?php
$usuario = 'FLOWERLAB_USER';
$clave   = 'Flab2025$';
$cadena  = '//localhost:1521/ORCL';  // 
$conn = oci_connect($usuario, $clave, $cadena, 'AL32UTF8');

if (!$conn) {
    $e = oci_error();
    die("Conexión fallida: " . $e['message']);
}

?>
