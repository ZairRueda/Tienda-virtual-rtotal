<?php 

// Se esta utilizando Mysqli para lamar a la base de datos
function conectarDB() : mysqli{
    $db = mysqli_connect('localhost', 'root', 'root', 'r_total');

    if (!$db) {
        echo 'Error al intentar conectar';
        exit;
    }

    return $db;
}