<?php
require_once "conexion.php";


$valor=$_POST['valor'];


$conexion = new mysqli($servidor, $usuario, $password,$baseDatos);
$conexion->set_charset("utf8");

$sql = " SELECT id ,marca, modelo,color,precio,stock from cachimbas WHERE  marca like '%$valor%' or modelo like '%$valor%' or color like '%$valor%' or precio like '%$valor%' or stock like '%$valor%'";

$resultado = $conexion->query($sql);
$cachimbas = array();
if ($resultado->num_rows > 0) {
    while($cachimba = $resultado->fetch_assoc()) {
        $cachimbas[] = $cachimba;
    }
    
}

echo json_encode(array("data"=>$cachimbas));
?>