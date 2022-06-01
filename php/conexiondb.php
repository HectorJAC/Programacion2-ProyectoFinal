<?php

    include_once("configuracion.php");

    //Crear sesiones
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    };


    //Crear el objeto de conexion a la base de datos
    $link = new mysqli(host, user, password, database);

    if (mysqli_connect_errno()) {
        //echo(mysqli_connect_errno() . " - ". mysqli_connect_error()); 
        $_SESSION['mensajeTexto'] = "El sistema esta en mantenimiento, intente mas tarde";
        $_SESSION['mensajeTipo'] = "is-info";
    } else {
        mysqli_set_charset($link, 'utf8');
    }