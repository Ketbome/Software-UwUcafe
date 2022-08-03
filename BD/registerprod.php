<?php
require 'conexion.php';
session_start();

$prod_name = $_POST['prod_name'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];

$sql = "INSERT INTO productos (prod_name, cantidad, precio,mejor,maspedido) VALUES ('$prod_name', '$cantidad', $precio, 0, 0)";

if ($conexion->query($sql) === TRUE) {
    header("location: ../admin/productos.php");
}
$conexion->close();
?>