<?php 

namespace Controllers;

use Model\Articulo;
use Model\Color;
use Model\Talla;
use Model\Tipo;
use MVC\Router;

class ProductController {

    public static function crear( Router $router ) {
        
        

        $router->render('datos/crear', [
            
        ]);

    }

    public static function actualizar( Router $router ) {
        
        

        $router->render('datos/actualizar', [
            
        ]);

    }
    
    public static function eliminar( Router $router ) {
        
          
        

        $router->render('datos/eliminar', [
            
        ]);

    }
}

?>