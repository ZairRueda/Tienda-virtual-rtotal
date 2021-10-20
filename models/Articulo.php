<?php 

namespace Model;

class Articulo extends ActiveRecord {

    protected static $tabla = 'articulo';

    protected static $columnasDB = ['id', 'marca', 'descripcion', 'precio', 'color_id', 'talla_id', 'tipo_id' , 'imagen', 'imagen_dos', 'imagen_tres', 'imagen_cuatro', 'codigo', 'modelo','creado', 'stock'];

    public $id;
    public $marca;
    public $descripcion;
    public $precio;
    public $color_id;
    public $talla_id;
    public $tipo_id;
    public $imagen;
    public $imagen_dos;
    public $imagen_tres;
    public $imagen_cuatro;
    public $codigo;
    public $modelo;
    public $creado;
    public $stock;

    public function __construct($argc = []) {
        
        $this->id = $argc['id'] ?? null;
        $this->marca = $argc['marca'] ?? '';
        $this->descripcion = $argc['descripcion'] ?? '';
        $this->precio = $argc['precio'] ?? '';
        $this->color_id = $argc['color_id'] ?? '';
        $this->talla_id = $argc['talla_id'] ?? '';
        $this->tipo_id = $argc['tipo_id'] ?? '';
        $this->imagen = $argc['imagen'] ?? '';
        $this->imagen_dos = $argc['imagen_dos'] ?? '';
        $this->imagen_tres = $argc['imagen_tres'] ?? '';
        $this->imagen_cuatro = $argc['imagen_cuatro'] ?? '';
        $this->codigo = $argc['codigo'] ?? '';
        $this->modelo = $argc['modelo'] ?? '';
        $this->creado = date('Y/m/d');
        $this->stock = $argc['stock'] ?? '';
    }

    public function validar(){

        if (!$this->marca) {
            self::$errores['marca'] = "Debes añadir una marca";
        }

        if (!$this->descripcion) {
            self::$errores['descripcion'] = "Debes añadir una descripcion";
        }
    
        if (!$this->precio) {
            self::$errores['precio'] = "Debes añadir un precio";
        }
    
        if (!$this->color_id) {
            self::$errores['color'] = "Debes añadir un color";
        }
    
        if (!$this->talla_id) {
            self::$errores['talla'] = "Debes añadir una talla";
        }

        if (!$this->tipo_id) {
            self::$errores['tipo'] = "Debes añadir un tipo";
        }
    
        if (!$this->imagen) {
            self::$errores['imagen'] = "Debes añadir una imagen";
        }

        if (!$this->codigo) {
            self::$errores['codigo'] = "Debes añadir un codigo de barras";
        }

        if (!$this->stock) {
            self::$errores['stock'] = "Debes añadir un stock disponible";
        }

        return self::$errores;
    }

}

