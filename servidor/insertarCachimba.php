<?php
require_once "conexion.php";
header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate');     



// Creamos la conexion

$marca=$_POST["marca"];
$modelo=$_POST["modelo"];
$color=$_POST["color"];
$precio=$_POST["precio"];
$stock=$_POST["stock"];


$conexion = new mysqli($servidor, $usuario, $password,$baseDatos);
$conexion->set_charset("utf8");
$sql = " INSERT INTO `cachimbas`(`marca`, `modelo`, `color`, `precio`, `stock`) VALUES ('$marca','$modelo','$color',$precio,$stock)";
$cachimbas = $conexion->query($sql);
