<?php
require_once "conexion.php";
header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate');     



// Creamos la conexion

$direccion=$_POST["direccion"];
$importe=$_POST["importe"];
$id_usuarios=$_POST["id_usuarios"];
$id_cachimbas=$_POST["cachimba"];


$conexion = new mysqli($servidor, $usuario, $password,$baseDatos);
$conexion->set_charset("utf8");
$sql = " INSERT INTO `pedidos`(`id_usuarios`,`direccion`,`importe`) VALUES ($id_usuarios,'$direccion',$importe)";
$sql2 = " INSERT INTO `pedido_cachimbas`(`id_pedido`, `id_cachimba`,`cantidad`) VALUES (SELECT TOP 1 id FROM 'pedidos' ORDER BY id DESC ,$id_cachimbas,1)";

$conexion->query($sql);
$conexion->query($sql2);
