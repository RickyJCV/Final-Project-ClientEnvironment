<?php
require_once "conexion.php";



// Creamos la conexion
$conexion = new mysqli($servidor, $usuario, $password,$baseDatos);
$conexion->set_charset("utf8");
$sql = "DELETE FROM usuarios where id=".$_POST["id"];

$sql2 = "DELETE FROM pedidos where id_usuarios=".$_POST["id"];
$conexion->query($sql2);
$conexion->query($sql);
?>