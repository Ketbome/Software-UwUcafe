<?php
include("conexion.php");

$trans=$_GET['id'];

$sql="DELETE FROM transacciones WHERE n_trans='$trans'";
$query=mysqli_query($conexion,$sql);

    if($query){
        Header("Location: ../admin/transacciones.php");
    }
?>