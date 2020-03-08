<?php
require_once "conexion.php";

$nada=$_POST['nada'];
$valor=$_POST['valor'];
$daniel = $_POST["daniel"];
$pablo = $_POST["pablo"];
$ricardo = $_POST["ricardo"];

$conexion = new mysqli($servidor, $usuario, $password,$baseDatos);
$conexion->set_charset("utf8");

$sql = " SELECT id,nombre,apellidos,email from usuarios WHERE "; 
$sql .= " (nombre like '%$valor%' or apellidos like '%$valor%' or email like '%$valor%') ";

if($nada != "" && $valor=""){
    $sql="SELECT id,nombre,apellidos,email from usuarios";
}

if($daniel != ""){
    $sql .= "AND  nombre = '$daniel'";
}

if($pablo != ""){
    $sql .= "AND nombre = '$pablo'";
}

if($ricardo != ""){
    $sql .= "AND nombre = '$ricardo'";
}

$resultado = $conexion->query($sql);
$usuarios = array();
if ($resultado->num_rows > 0) {
    while($usuario = $resultado->fetch_assoc()) {
        $usuarios[] = $usuario;
    }
    
}

echo json_encode(array("data"=>$usuarios));
?>