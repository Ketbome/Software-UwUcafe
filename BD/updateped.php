<?php
include("conexion.php");

$mesa = $_POST['mesa'];
$type = $_POST['type'];
$sql2="DELETE FROM pedidos_productos WHERE mesa=$mesa;";
$query=mysqli_query($conexion,$sql2);

$producto1 = $_POST['producto1'];
$cantidad1 = $_POST['cantidad1'];
$producto2 = $_POST['producto2'];
$cantidad2 = $_POST['cantidad2'];
$orderstatus = $_POST['orderstatus'];

if($producto1 != 'none'){
    $sql2 = "INSERT INTO pedidos_productos(mesa, producto, cantidad) VALUES ('$mesa', '$producto1', $cantidad1)";
    $conexion->query($sql2);
}
if($producto2 != 'none'){
    $sql3 = "INSERT INTO pedidos_productos(mesa, producto, cantidad) VALUES ('$mesa', '$producto2', $cantidad2)";
    $conexion->query($sql3);
}
if($type == 'Admin'){
    header("location: ../admin/inicio.php");
}else{
    header("location: ../mesero/mesero.php");
}
$conexion->close();

?>