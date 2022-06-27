<?php
require 'conexion.php';
session_start();

$type = $_POST['type'];
$producto1 = $_POST['producto1'];
$cantidad1 = $_POST['cantidad1'];
$producto2 = $_POST['producto2'];
$cantidad2 = $_POST['cantidad2'];
$mesa = $_POST['mesa'];
$orderstatus = $_POST['orderstatus'];

$sql = "INSERT INTO pedidos(mesa, orderstatus) VALUES ('$mesa', '$orderstatus')";

if($producto1 != 'none'){
    $sql2 = "INSERT INTO pedidos_productos(mesa, producto, cantidad) VALUES ('$mesa', '$producto1', $cantidad1)";
    $conexion->query($sql2);
}
if($producto2 != 'none'){
    $sql3 = "INSERT INTO pedidos_productos(mesa, producto, cantidad) VALUES ('$mesa', '$producto2', $cantidad2)";
    $conexion->query($sql3);
}

if ($conexion->query($sql) === TRUE) {
    if($type == 'Mesero'){
        header("location: ../mesero/mesero.php");
    }else{
        header("location: ../admin/inicio.php");
    }
}
$conexion->close();
?>