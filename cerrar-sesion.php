<?php 

session_start();
// Existen multiples variables para cerrar la sesion pero utilizaremos una forma muy facil

// comvertiremos el arreglo de session a un arreglo basio
$_SESSION = [];

header('Location: /');