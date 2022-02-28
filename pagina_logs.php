<?php

include 'conexion.php';
 
/* **********************************
* TRAE EL USUARIO QUE INICIÓ SESIÓN *
*************************************/

session_start();
$_SESSION["usuario"];
$usuario = $_SESSION["usuario"];


/* ********************************************************************
* FUNCIÓN PARA TRAER EL NOMBRE COMPLETO DEL USUARIO QUE INICIÓ SESIÓN *
***********************************************************************/

function nombreCompleto($usuario){
    $data = [];

    $sql = "SELECT cedula FROM usuarios WHERE nombre_usuario = '$usuario'";
    $exec = pg_query($sql);
    $cedula = pg_fetch_result($exec,0);
    $sql1 = "SELECT nombre FROM personas WHERE cedula = '$cedula'";
    $exec1 = pg_query($sql1);
    $nombre = pg_fetch_result($exec1,0);
    $data['nombre'] = $nombre;
    $sql2 = "SELECT apellido FROM personas WHERE cedula = '$cedula'";
    $exec2 = pg_query($sql2);
    $apellido = pg_fetch_result($exec2,0);
    $data['apellido'] = $apellido;
    return $data['nombre']." ".$data['apellido'];
}
$nombre_completo = nombreCompleto($usuario);

/* *****************************************************
* FUNCIÓN PARA TRAER LA TABLA LOGS DE LA BASE DE DATOS *
********************************************************/

function tablaLogs(){
    $sql = "SELECT * FROM log_usuarios";
    $exec = pg_query($sql);
    $tabla_logs = pg_fetch_all($exec);
    $numero_filas = pg_num_rows($exec);

    for ($i=0; $i < $numero_filas ; $i++) {
        echo "
        <tr>
            <td>".$tabla_logs[$i]['consecutivo']."</td>
            <td>".$tabla_logs[$i]['cedula']."</td>
            <td>".$tabla_logs[$i]['nombre_log']."</td>
            <td>".$tabla_logs[$i]['fecha_log']."</td>
        </tr>";
    }
}

?>