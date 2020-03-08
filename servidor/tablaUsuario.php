<?php
require_once "conexion.php";
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate');

$conexion = new mysqli($servidor, $usuario, $password,$baseDatos);
$conexion->set_charset("utf8");
$sql = " SELECT id,nombre,apellidos,email from usuarios";
$resultado = $conexion->query($sql);
$usuarios = array();
if ($resultado->num_rows > 0) {
    while($usuario = $resultado->fetch_assoc()) {
        $usuarios[] = $usuario;
    }
    
}

echo json_encode(array("data"=>$usuarios));
?>