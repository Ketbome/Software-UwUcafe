<?php
require 'conexion.php';
session_start();

$username = $_POST['nombre'];
$password = $_POST['password'];
$type = $_POST['type'];

$sql = "INSERT INTO usuarios (username, password, type) VALUES ('$username', '$password', '$type')";

if ($conexion->query($sql) === TRUE) {
    header("location: ../admin/usuarios.php");
}
$conexion->close();
?>