<?php 

namespace App;

class Talla extends ActiveRecord {

    protected static $tabla = 'tallas';

    protected static $columnasDB = ['id', 'talla'];

    public $id;
    public $talla;

    public function __construct($argc = []) {
        
        $this->id = $argc['id'] ?? null;
        $this->talla = $argc['tallas'] ?? '';
    }

    public function validar(){

        if (!$this->talla) {

            self::$errores['tallas'] = "Debes añadir una talla valida";

        }

        return self::$errores;
    }

}