<?php

$servidor = "localhost";
$user = "root";
$password = "";
$basedatos = "clientedb";

$conexion = new mysqli($servidor,$user, $password, $basedatos);

if ( $conexion -> connect_errno){
    die("error: ".$conexion -> connect_errno);
  /*   echo "Conexion fallida";
    exit(); */
}



?>