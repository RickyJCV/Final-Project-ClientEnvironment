<?php
require_once "conexion.php";




// Creamos la conexion



$conexion = new mysqli($servidor, $usuario, $password,$baseDatos);
$conexion->set_charset("utf8");
$sql = " SELECT id ,nombre ,apellidos from usuarios";

$id_usuarios = $conexion->query($sql);
?>