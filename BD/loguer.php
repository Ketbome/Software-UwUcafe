<?php

require 'conexion.php';
session_start();

$username = $_POST['nombre'];
$password = $_POST['password'];

$q = "SELECT type  FROM usuarios WHERE username = '$username' AND password = '$password'";
$consulta = mysqli_query($conexion,$q);
$type = mysqli_fetch_array($consulta);

if(!isset($type[0])){
    echo("Error logueo");
}else if($type[0] == 'Admin'){
	$_SESSION['nombre'] = $username;
	$_SESSION['type'] = $type[0];
    header("location: ../admin/inicio.php");
}else if($type[0] == 'Chef'){
	$_SESSION['nombre'] = $username;
	$_SESSION['type'] = $type[0];
    header("location: ../chef/chef.php");
}else if($type[0] == 'Mesero'){
	$_SESSION['nombre'] = $username;
	$_SESSION['type'] = $type[0];
    header("location: ../mesero/mesero.php");
}else{
    echo("Error logueo");
}

?>