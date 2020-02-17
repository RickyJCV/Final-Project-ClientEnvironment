<?php
require_once "conexion.php";




// Creamos la conexion



$conexion = new mysqli($servidor, $usuario, $password,$baseDatos);
$conexion->set_charset("utf8");
$sql = " SELECT id ,modelo from cachimbas group by modelo";

$modelo = $conexion->query($sql);
?>