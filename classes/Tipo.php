<?php 

namespace App;

class Tipo extends ActiveRecord {

    protected static $tabla = 'tipo_articulo';

    protected static $columnasDB = ['id', 'tipos'];

    public $id;
    public $tipos;

    public function __construct($argc = []) {
        
        $this->id = $argc['id'] ?? null;
        $this->tipos = $argc['tipos'] ?? '';
    }

    public function validar(){

        if (!$this->tipos) {

            self::$errores['tipos'] = "Debes añadir tipo";

        }

        return self::$errores;
    }

}