<?php

function validarmarca($marca){
    $errores = array();
    if(!preg_match("/^[A-ZÑa-zñ]*$/", $marca) || empty($marca)) {
    $errores[] = "Solo se admiten letras, introduce una marca válida.";
    }
    return $errores;
}

function validarmodelo($modelo){
    $errores = array();
    if(!preg_match("/^[A-ZÑa-zñ0-9]*$/", $modelo) || empty($modelo)) {
    $errores[] = "Solo se admiten letras, introduce un modelo válido.";
    }
    return $errores;
}

function validarcolor($color){
    $errores = array();
    if(!preg_match("/^[A-ZÑa-zñ]*$/", $color) || empty($color)) {
    $errores[] = "Solo se admiten letras, introduce un color válido.";
    }
    return $errores;
}

function validarprecio($precio){
    $errores = array();
    if(!preg_match("/^([0-9,]+(.[0-9]{2})?)$/", $precio) || empty($precio)) {
    $errores[] = "Introduce un precio válido.(Dos decimales o ninguno)";
    }
    return $errores;
}

function validarstock($stock){
    $errores = array();
    if(!preg_match("/^[0-9,]+$/", $stock) || empty($stock)) {
    $errores[] = "Solo se aceptan números";
    }
    return $errores;
}