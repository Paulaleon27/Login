<?php

include 'conexion.php';

$cedula = $_REQUEST["cedula"];
$nombre = $_REQUEST["nombre"];
$apellido = $_REQUEST["apellido"];
$fecha_nacimiento = $_REQUEST["fecha_nacimiento"];
$usuario = $_REQUEST["usuario"];
$contrasena = $_REQUEST["contrasena"];
$encriptar = md5($contrasena);

if (md5($contrasena) == $encriptar) {
    $sql = "INSERT INTO personas VALUES ( $cedula, '$nombre', '$apellido','$fecha_nacimiento')";
    $exec = pg_query($sql);
    $sql1 = "INSERT INTO usuarios VALUES ( $cedula, '$usuario' , '$encriptar')";
    $exec = pg_query($sql1);
}else{
    echo 'La consulta falló: ' . pg_last_error();
}

if (pg_close($dbconn)) {
    header('Location: login.html');
}else{
    echo 'Error al cerrar la conexión ' . pg_last_error();
}







?>