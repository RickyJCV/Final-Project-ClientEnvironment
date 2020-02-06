<?php
require_once "conexion.php";
header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate');     



// Creamos la conexion

$direccion=$_POST["direccion"];
$importe=$_POST["importe"];
$id_usuarios=$_POST["id_usuarios"];



$conexion = new mysqli($servidor, $usuario, $password,$baseDatos);
$conexion->set_charset("utf8");
$sql = " INSERT INTO `usuarios`(`nombre`, `apellidos`,`email`, `password`) VALUES ('$nombre','$apellidos','$email','$clave')";
$cachimbas = $conexion->query($sql);
