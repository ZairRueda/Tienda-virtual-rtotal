<?php

// Llamada a las funciones
require 'funciones.php';

// Llamada a la base de datos
require 'config/database.php';

// Recorso del autoload
require __DIR__ . '/../vendor/autoload.php';

$db = conectarDB();

use App\ActiveRecord;

// Integracion de la BD a nuestro archivo ActiveRecord.php
ActiveRecord::setDB($db); 