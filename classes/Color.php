<?php 

namespace App;

class Color extends ActiveRecord {

    protected static $tabla = 'colores';

    protected static $columnasDB = ['id', 'colores'];

    public $id;
    public $colores;

    public function __construct($argc = []) {
        
        $this->id = $argc['id'] ?? null;
        $this->colores = $argc['colores'] ?? '';
    }

    public function validar(){

        if (!$this->colores) {

            self::$errores['colores'] = "Debes añadir un color valido";

        }

        return self::$errores;
    }

}