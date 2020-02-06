<?php

function validarnombre($nombre){
    $errores = array();
    if(!preg_match("/^[A-ZÑa-zñ]*$/", $nombre) || empty($nombre)) {
    $errores[] = "Solo se admiten letras, introduce un nombre válidao.";
    }
    return $errores;
}

function validarapellidos($apellidos){
    $errores = array();
    if(!preg_match("/^[A-ZÑa-zñ]*$/", $apellidos) || empty($apellidos)) {
    $errores[] = "Solo se admiten letras, introduce un apellido válido.";
    }
    return $errores;
}

function validarpassword($password){
    $errores = array();
    if(!preg_match("/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/", $password) || empty($password)) {
    $errores[] = "Contraseña incorrecta";
    }
    return $errores;
}

function validaremail($email){
    $errores = array();
    $exp="/^[a-z0-9!#$%&'*+\=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/";
    if(!preg_match($exp, $email) || empty($email)) {
    $errores[] = "Introduzca un email válido";
    }
    return $errores;
}
