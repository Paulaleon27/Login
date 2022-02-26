<?php

include 'conexion.php';

function buscar($usuario, $contrasena){
    $sql = "SELECT cedula FROM usuarios WHERE nombre_usuario='$usuario' AND contrasena='$contrasena';";
    $exec = pg_query($sql);

    if ($exec) {
        $numero_filas = pg_num_rows($exec);
        $cedula = pg_fetch_result($exec,0);
        echo $numero_filas;
        if ($numero_filas == 1) {
            $sql = "INSERT INTO log_usuarios (cedula,nombre_log,fecha_log) VALUES ($cedula, 'Inicio sesion', current_date);";
            $exec = pg_query($sql);
            header('Location: dashboard.html');
        }else{
            header('Location: login.html');
        }
        
    }else{
        echo 'La consulta falló: ' . pg_last_error();
    }
    
}

$usuario = $_REQUEST["usuario"];
$contrasena = $_REQUEST["contrasena"];
$encriptar = md5($contrasena);
    
buscar($usuario, $encriptar);

?>