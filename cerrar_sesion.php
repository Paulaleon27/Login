<?php

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
    header('Location: Login.html');
}else{
    echo "Error al cerrar sesión: ". pg_last_error();
}

session_destroy();

/*$cerrar_sesion = session_abort(); 

function cerrarSesion($cerrar_sesion){
    echo $cerrar_sesion;
    if ($cerrar_sesion = true){
        header('Location: Login.html');
    }else{
        echo "Error al cerrar sesión: ". pg_last_error();
    }
}*/


?>
