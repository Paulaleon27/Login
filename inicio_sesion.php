<?php

include 'conexion.php';

/* *********************************************************************
* FUNCIÓN PARA VALIDAR QUE EL USUARIO Y LA CONTRASEÑA EXISTAN EN LA BD *
************************************************************************/

function buscar($usuario, $contrasena){
    $sql = "SELECT cedula FROM usuarios WHERE nombre_usuario='$usuario' AND contrasena='$contrasena';";
    $exec = pg_query($sql);

    if ($exec) {
        $numero_filas = pg_num_rows($exec);
        $cedula = pg_fetch_result($exec,0);
        echo "Numero de filas= " . $numero_filas;
        if ($numero_filas == 1) {
            $sql = "INSERT INTO log_usuarios (cedula,nombre_log,fecha_log) VALUES ($cedula, 'Inicio sesion', current_date);";
            $exec = pg_query($sql);
            session_start();
            $_SESSION["usuario"]=$usuario;
            header('Location: dashboard.php');
        }else{
            $sql = "INSERT INTO log_usuarios (cedula,nombre_log,fecha_log) VALUES (404, 'Login Fail', current_date);";
            $exec = pg_query($sql);
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