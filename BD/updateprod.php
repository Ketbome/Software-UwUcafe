<?php
include("conexion.php");

$id=$_POST['id'];
$prod_name=$_POST['prod_name'];
$cantidad=$_POST['cantidad'];
$precio=$_POST['precio'];

$sql="UPDATE productos SET prod_name='$prod_name', cantidad=$cantidad, precio=$precio WHERE id=$id";
$query=mysqli_query($conexion,$sql);
    if($query){
        Header("Location: ../admin/productos.php");
    }
?>