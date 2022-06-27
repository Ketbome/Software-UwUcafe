<?php
include("conexion.php");

$username=$_POST['username'];
$password=$_POST['password'];
if($username == 'admin'){
    $type = 1;
}else{
    $type = $_POST['type'];
}

$sql="UPDATE usuarios SET password='$password', type = '$type' WHERE username='$username'";
$query=mysqli_query($conexion,$sql);
    if($query){
        Header("Location: ../admin/usuarios.php");
    }
?>