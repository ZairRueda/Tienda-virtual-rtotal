<?php 

namespace Controllers;


use Model\Articulo;
use Model\Color;
use Model\Talla;
use Model\Tipo;

use MVC\Router;

class PagesController {
    public static function index( Router $router ) {
        
        // Proximanente

        $router->render('pages/index', [
            
        ]);

    }

    public static function productos( Router $router ) {
        
        $articulos = Articulo::all();

        $gorras = Articulo::findType(1);
        $tenis = Articulo::findType(2);
        $playeras = Articulo::findType(3);
        $pantalones = Articulo::findType(4);
        $accesorios = Articulo::findType(5);

        $router->render('pages/productos', [
            'articulos' => $articulos,
            'gorras' => $gorras,
            'tenis' => $tenis,
            'playeras' => $playeras,
            'pantalones' => $pantalones,
            'accesorios' => $accesorios 
        ]);

    }

    public static function producto( Router $router ) {
        
        // Proximanente

        $router->render('pages/producto', [
            
        ]);

    }

    public static function carrito( Router $router ) {
        
        // Proximanente

        $router->render('pages/carrito', [
            
        ]);

    }

}