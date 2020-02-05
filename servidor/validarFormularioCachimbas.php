<?php
require_once "funcionesValidacionCachimbas.php";
sleep(1);

$errores = array();
$errores["marca"] = array();
$errores["modelo"] = array();
$errores["color"] = array();
$errores["precio"] = array();
$errores["stock"] = array();

if(isset($_POST["marca"])){
    $errores["marca"] = validarmarca(trim($_POST["marca"]));
}

if(isset($_POST["modelo"])){
    $errores["modelo"] = validarmodelo(trim($_POST["modelo"]));
}

if(isset($_POST["color"])){
    $errores["color"] = validarcolor(trim($_POST["color"]));
}

if(isset($_POST["precio"])){
    $errores["precio"] = validarprecio(trim($_POST["precio"]));
}

if(isset($_POST["stock"])){
    $errores["stock"] = validarstock(trim($_POST["stock"]));
}


echo json_encode($errores);