<?php
require_once "conexion.php";
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate');

$conexion = new mysqli($servidor, $usuario, $password,$baseDatos);
$conexion->set_charset("utf8");
$sql = " SELECT id,marca, modelo,precio,color,stock from cachimbas";
$resultado = $conexion->query($sql);
$cachimbas = array();
if ($resultado->num_rows > 0) {
    while($cachimba = $resultado->fetch_assoc()) {
        $cachimbas[] = $cachimba;
    }
    
}

echo json_encode(array("data"=>$cachimbas));
?>