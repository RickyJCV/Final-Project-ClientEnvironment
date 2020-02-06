<?php
require_once "funcionesValidacionPedido.php";
sleep(1);

$errores = array();
$errores["direccion"] = array();
$errores["importe"] = array();
$errores["id_usuarios"] = array();


if(isset($_POST["direccion"])){
    $errores["direccion"] = validardireccion(trim($_POST["direccion"]));
}

if(isset($_POST["importe"])){
    $errores["importe"] = validarapellidos(trim($_POST["importe"]));
}

if(isset($_POST["id_usuarios"])){
    $errores["id_usuarios"] = validaremail(trim($_POST["id_usuarios"]));
}

echo json_encode($errores);