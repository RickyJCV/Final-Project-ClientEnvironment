<?php
require_once "conexion.php";


$direccion=$_POST["direccion"];
$usuarios=$_POST["usuario"];


// Creamos la conexion
$conexion = new mysqli($servidor, $usuario, $password,$baseDatos);
$conexion->set_charset("utf8");
$sql = " UPDATE pedidos SET direccion='$direccion' WHERE id_usuarios=$usuarios";
$conexion->query($sql);
?>