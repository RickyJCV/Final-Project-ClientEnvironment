<?php

function validarDireccion($direccion){
    $errores = array();
    if( empty($direccion)) {
    $errores[] = "Introduzca la dirección";
    }
    return $errores;
}

function validaraPrecio($precio){
    $errores = array();
    if(!preg_match("/([0-9.])/", $precio) || empty($precio)) {
    $errores[] = "Introduzca un importe valido";
    }
    return $errores;
}

function validarId_usuarios($id_usuarios){
    $errores = array();
    if(!preg_match("/([0-9])/", $id_usuarios) || empty($id_usuarios)) {
    $errores[] = "Id del usuario incorrecto";
    }
    return $errores;
}

