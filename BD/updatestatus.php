<?php
include("conexion.php");

$mesa=$_GET['id'];

$sql="UPDATE pedidos SET orderstatus='Preparado' WHERE mesa=$mesa";

$query=mysqli_query($conexion,$sql);

    if($query){
        Header("Location: ../chef/chef.php");
    }
?>