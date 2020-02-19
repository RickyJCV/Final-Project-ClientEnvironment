<?php
require_once "conexion.php";


$email=$_POST["email"];
$usuarios=$_POST["usuario"];


// Creamos la conexion
$conexion = new mysqli($servidor, $usuario, $password,$baseDatos);
$conexion->set_charset("utf8");
$sql = " UPDATE usuarios SET email='$email' WHERE id=$usuarios";
$conexion->query($sql);
?>