<?php
include("conexion.php");

$mesa=$_GET['id'];
$preciototal = 0;

#buscar producto y cantidad para las transacciones
$sql = "SELECT producto, cantidad FROM pedidos_productos WHERE mesa = $mesa;";
$query = mysqli_query($conexion,$sql);

#Sacar el precio total
while($row=mysqli_fetch_array($query)){
    $prod = $row['producto'];
    $sql = "SELECT precio FROM productos WHERE prod_name='$prod';";#buscar el precio del producto
    $query2 = mysqli_query($conexion,$sql);
    $row2=mysqli_fetch_array($query2);
    $preciototal = $preciototal + ($row2['precio'] * $row['cantidad']);#sacar el total
}

$sql = "INSERT INTO transacciones(precio) VALUES ($preciototal);";
$query=mysqli_query($conexion,$sql);

$sql="DELETE FROM pedidos WHERE mesa=$mesa;";
$sql2="DELETE FROM pedidos_productos WHERE mesa=$mesa;";

$query=mysqli_query($conexion,$sql);
$query=mysqli_query($conexion,$sql2);

if($query){
    Header("Location: ../mesero/mesero.php");
}
?>