<?php
require_once "funcionesValidacionUsuarios.php";
sleep(1);

$errores = array();
$errores["nombre"] = array();
$errores["apellidos"] = array();
$errores["email"] = array();
$errores["password"] = array();
$errores["stock"] = array();

if(isset($_POST["nombre"])){
    $errores["nombre"] = validarnombre(trim($_POST["nombre"]));
}

if(isset($_POST["apellidos"])){
    $errores["apellidos"] = validarapellidos(trim($_POST["apellidos"]));
}

if(isset($_POST["email"])){
    $errores["email"] = validaremail(trim($_POST["email"]));
}

if(isset($_POST["password"])){
    $errores["password"] = validarpassword(trim($_POST["password"]));
}

if(isset($_POST["stock"])){
    $errores["stock"] = validarstock(trim($_POST["stock"]));
}


echo json_encode($errores);