<?php
include("conexion.php");

$mesa=$_GET['id'];
$type=$_GET['type'];

$sql="DELETE FROM pedidos WHERE mesa=$mesa;";
$sql2="DELETE FROM pedidos_productos WHERE mesa=$mesa;";

$query=mysqli_query($conexion,$sql);
$query=mysqli_query($conexion,$sql2);

if($query){
    Header("Location: ../admin/inicio.php");
}
?>