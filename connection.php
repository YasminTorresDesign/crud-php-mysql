<?php

function connection(){
    $host = "localhost";
    $user = "root";
    $pass = "123456";
    $port = 3308;
    $bd = "registro-producto";
    
    // Conexión a la base de datos
    $connect = mysqli_connect($host, $user, $pass, $bd, $port);

    // Verifica si la conexión fue exitosa
    if (!$connect) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Verifica si se seleccionó la base de datos correctamente
    if (!mysqli_select_db($connect, $bd)) {
        die("Error al seleccionar la base de datos: " . mysqli_error($connect));
    }

    return $connect;
}

?>