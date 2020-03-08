<?php
require_once "conexion.php";
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate');

$conexion = new mysqli($servidor, $usuario, $password,$baseDatos);
$conexion->set_charset("utf8");
$sql = " SELECT id,id_usuarios,direccion,importe from pedidos";
$resultado = $conexion->query($sql);
$pedidos = array();
if ($resultado->num_rows > 0) {
    while($pedido = $resultado->fetch_assoc()) {
        $pedidos[] = $pedido;
    }
    
}

echo json_encode(array("data"=>$pedidos));
?>