<?php
require_once "conexion.php";


$valor=$_POST['valor'];


$conexion = new mysqli($servidor, $usuario, $password,$baseDatos);
$conexion->set_charset("utf8");

$sql = " SELECT id,id_usuarios,direccion,importe from pedidos WHERE "; 
$sql .= " (id_usuarios like '%$valor%' or direccion like '%$valor%' or importe like '%$valor%') ";

$resultado = $conexion->query($sql);
$usuarios = array();
if ($resultado->num_rows > 0) {
    while($usuario = $resultado->fetch_assoc()) {
        $usuarios[] = $usuario;
    }
    
}

echo json_encode(array("data"=>$usuarios));
?>