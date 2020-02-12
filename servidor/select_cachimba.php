<?php
require_once "conexion.php";

$conexion = new mysqli($servidor, $usuario, $password,$baseDatos);
$conexion->set_charset("utf8");
$sql = " SELECT id ,marca, modelo,color from cachimbas";

$cachimbas = $conexion->query($sql);
?>