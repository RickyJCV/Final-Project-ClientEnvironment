<?php
require_once "conexion.php";

// Creamos la conexion
$conexion = new mysqli($servidor, $usuario, $password,$baseDatos);
$conexion->set_charset("utf8");
$sql = " SELECT usuarios.nombre ,usuarios.apellidos ,pedidos.id_usuarios FROM `pedidos` INNER JOIN usuarios ON pedidos.id_usuarios = usuarios.id GROUP BY pedidos.id_usuarios";
$id_pedidos=$conexion->query($sql);
?>