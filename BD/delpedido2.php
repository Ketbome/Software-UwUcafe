<?php
include("conexion.php");

$mesa=$_GET['id'];
$preciototal = 0;

$sql="DELETE FROM pedidos WHERE mesa=$mesa;";
$sql2="DELETE FROM pedidos_productos WHERE mesa=$mesa;";

$query=mysqli_query($conexion,$sql);
$query=mysqli_query($conexion,$sql2);

if($query){
    Header("Location: ../mesero/mesero.php");
}
?>