<?php
require_once "conexion.php";


$precio=$_POST["precio"];
$modelo=$_POST["modelo"];



// Creamos la conexion
$conexion = new mysqli($servidor, $usuario, $password,$baseDatos);
$conexion->set_charset("utf8");
$sql = " UPDATE `cachimbas` SET `precio`=$precio WHERE modelo=$modelo";
$conexion->query($sql);
?>