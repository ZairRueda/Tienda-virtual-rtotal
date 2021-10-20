<?php

// use Intervention\Image\ImageManagerStatic as Image;
// Funciones integrantes

define('TEMPLATES_URL', __DIR__ . '/templates');

define('FUNCIONES_URL', __DIR__ . '/funciones.php');

define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');

function incluirTemplate( string $nombre, bool $inicio = false, bool $h1 = false) {

    include TEMPLATES_URL . "/${nombre}.php";

}

// Para no repetir codigo a la hora de estar autenticado el usuario
function estaAutenticado() {

    session_start();

    if (!$_SESSION['login'] || $_SESSION["usuario"] !== 'moi@moi.gmail') {
        header('Location: /');
    }

}

// Revicionar codigo
function debuguear($variable)
{

    echo '<pre>';
    var_dump($variable);
    echo '</pre>';

    exit;
}

// Limpiesa o Sanitizacion
function s($html) : string{
    $s = htmlspecialchars($html);

    return $s;
}

function tipoActual($tipo) {

    return $tipo;

}

function validarTipoContenido($tipo)
{
    $tipos = ['product', 'datos'];

    return in_array($tipo, $tipos);
}

function validarORedireccionar(string $url)
{
    $id = $_GET['id'];

    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header("Location: ${url}");
    }

    return $id;
}