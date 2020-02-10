<?php

function validardireccion($direccion){
    $errores = array();
    if( empty($direccion)) {
    $errores[] = "Introduzca la dirección";
    }
    return $errores;
}

function validarimporte($importe){
    $errores = array();
    if(!preg_match("/([0-9.])/", $importe) || empty($importe)) {
    $errores[] = "Introduzca un importe valido";
    }
    return $errores;
}

function validarid_usuarios($id_usuarios){
    $errores = array();
    if(!preg_match("/([0-9])/", $id_usuarios) || empty($id_usuarios)) {
    $errores[] = "Id del usuario incorrecto";
    }
    return $errores;
}