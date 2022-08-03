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

$sql = "SELECT cantidad FROM productos WHERE prod_name = '$producto1';";
$query1 = mysqli_query($conexion,$sql);
$row = mysqli_fetch_array($query1);
if($producto1 == 'none'){
	$producto1 = 'none';
}
elseif($row['cantidad'] - $cantidad1 < 0){
    header("location: ../mesero/mesero.php");
}
$sql = "SELECT cantidad FROM productos WHERE prod_name = '$producto2';";
$query2 = mysqli_query($conexion,$sql);
$row = mysqli_fetch_array($query2);
if($producto2 == 'none'){
	$producto2 = 'none';
}
elseif($row['cantidad'] - $cantidad2 < 0){
    header("location: ../mesero/mesero.php");
}

$sql = "SELECT mesa FROM pedidos WHERE mesa = $mesa;";
$query = mysqli_query($conexion,$sql);
$row3 = mysqli_fetch_array($query);

if(!isset($row3['mesa'])){
    $sql = "INSERT INTO pedidos(mesa, orderstatus) VALUES ('$mesa', '$orderstatus');";
    $query = mysqli_query($conexion,$sql);
}

if($producto1 != 'none'){
    $sql2 = "INSERT INTO pedidos_productos(mesa, producto, cantidad) VALUES ('$mesa', '$producto1', $cantidad1)";
    $conexion->query($sql2);
    $sql2 = "UPDATE productos SET cantidad = cantidad - $cantidad1 WHERE prod_name = '$producto1';";#eliminar la cantidad de productos
    $query2=mysqli_query($conexion,$sql2);
}
if($producto2 != 'none'){
    $sql3 = "INSERT INTO pedidos_productos(mesa, producto, cantidad) VALUES ('$mesa', '$producto2', $cantidad2)";
    $conexion->query($sql3);
    $sql2 = "UPDATE productos SET cantidad = cantidad - $cantidad2 WHERE prod_name = '$producto2';";#eliminar la cantidad de productos
    $query2=mysqli_query($conexion,$sql2);
}

    if($type == 'Mesero'){
        header("location: ../mesero/mesero.php");
    }else{
        header("location: ../admin/inicio.php");
    }
$conexion->close();
?>