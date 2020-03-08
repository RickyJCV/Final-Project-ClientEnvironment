<?php
require_once "conexion.php";



// Creamos la conexion
$conexion = new mysqli($servidor, $usuario, $password,$baseDatos);
$conexion->set_charset("utf8");
$sql = "DELETE FROM pedidos where id=".$_POST["id"];

$sql2 = "DELETE FROM pedido_cachimbas where id_pedido=".$_POST["id"];
$conexion->query($sql2);
$conexion->query($sql);
?>