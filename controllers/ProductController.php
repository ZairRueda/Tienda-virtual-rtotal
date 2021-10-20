<?php 

namespace Controllers;

use Model\Articulo;
use Model\Color;
use Model\Talla;
use Model\Tipo;
use Intervention\Image\ImageManagerStatic as Image;
use MVC\Router;

class ProductController {

    public static function index( Router $router ) {
        
          
        $articulos = Articulo::all();

        $resultado = $_GET['resultado'] ?? null;

        $router->render('product/admin', [
            'articulos' => $articulos,
            'resultado' => $resultado
        ]);

    }

    public static function crear( Router $router ) {
        
                
        $articulo = new Articulo;

        // debuguear($articulo);

        $colores = Color::all();
        $tallas = Talla::all();
        $tipos = Tipo::all();

        $errores = Articulo::getErrores();

        // debuguear($_FILES);

        if ($_SERVER["REQUEST_METHOD"] === 'POST') {

            $articulo = new Articulo($_POST['articulo']);

            $carpetaImagenes = '../../imagenes/';

            $nombreImagen = md5(uniqid(rand(), true)) . ".jpeg";
            $nombreImagenDos = md5(uniqid(rand(), true)) . ".jpeg";
            $nombreImagenTres = md5(uniqid(rand(), true)) . ".jpeg";
            $nombreImagenCuatro = md5(uniqid(rand(), true)) . ".jpeg";

            // $columna = $_FILES['articulo']['tmp_name'];

            // debuguear($columna);

            // FIXME Este codigo deve ser modificado para acortarlo y que se envie un arreglo
            if ($_FILES['articulo']['tmp_name']['imagen'] && $_FILES['articulo']['tmp_name']['imagen_dos'] && $_FILES['articulo']['tmp_name']['imagen_tres'] && $_FILES['articulo']['tmp_name']['imagen_cuatro']) {

                $image = Image::make($_FILES['articulo']['tmp_name']['imagen']);
                $imageDos = Image::make($_FILES['articulo']['tmp_name']['imagen_dos']);
                $imageTres = Image::make($_FILES['articulo']['tmp_name']['imagen_tres']);
                $imageCuatro = Image::make($_FILES['articulo']['tmp_name']['imagen_cuatro']);
        
                // $image->fit(800, 600);
                // $imageDos->fit(800, 600);
                // $imageTres->fit(800, 600);
        
                $articulo->setImagen($nombreImagen, $nombreImagenDos, $nombreImagenTres, $nombreImagenCuatro);
            }

            // foreach ($columna as $key => $value) {

                // echo $key;

            //     return $key;
            // }

            // $imagen = $_FILES['articulo']['tmp_name']['imagen'];

            // recivirImagen($key, $articulo, $nombreImagen);

            // debuguear($_FILES);

            // debuguear($articulo);

            $errores = $articulo->validar();

            // debuguear($articulo);

            if (empty($errores)) {

                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                };

                //   debuguear($errores);

                $image->save(CARPETA_IMAGENES . $nombreImagen);
                $imageDos->save(CARPETA_IMAGENES . $nombreImagenDos);
                $imageTres->save(CARPETA_IMAGENES . $nombreImagenTres);
                $imageCuatro->save(CARPETA_IMAGENES . $nombreImagenCuatro);


                // debuguear($articulo);

                $articulo->guardar();

            }
        }
        

        $router->render('product/crear', [
            'articulo' => $articulo,
            'colores' => $colores ,
            'tallas' => $tallas ,
            'tipos' => $tipos,
            'errores' => $errores
        ]);

    }

    public static function actualizar( Router $router ) {
        
        
        $id = validarORedireccionar('/admin');

        $articulo = Articulo::find($id);

        $colores = Color::all();
        $tallas = Talla::all();
        $tipos = Tipo::all();

        $errores = Articulo::getErrores();

        if ($_SERVER["REQUEST_METHOD"] === 'POST') {

            $args = $_POST['articulo'];

            $articulo->sincronizar($args);

            $errores = $articulo->validar();

            // Genera nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpeg";
            $nombreImagenDos = md5(uniqid(rand(), true)) . ".jpeg";
            $nombreImagenTres = md5(uniqid(rand(), true)) . ".jpeg";
            $nombreImagenCuatro = md5(uniqid(rand(), true)) . ".jpeg";

            // Validacion subida de archivos
            if ($_FILES['articulo']['tmp_name']['imagen'] && $_FILES['articulo']['tmp_name']['imagen_dos'] && $_FILES['articulo']['tmp_name']['imagen_tres'] && $_FILES['articulo']['tmp_name']['imagen_cuatro']) {

                $image = Image::make($_FILES['articulo']['tmp_name']['imagen']);
                $imageDos = Image::make($_FILES['articulo']['tmp_name']['imagen_dos']);
                $imageTres = Image::make($_FILES['articulo']['tmp_name']['imagen_tres']);
                $imageCuatro = Image::make($_FILES['articulo']['tmp_name']['imagen_cuatro']);

                // $image->fit(800, 600);
                // $imageDos->fit(800, 600);
                // $imageTres->fit(800, 600);

                $articulo->setImagen($nombreImagen, $nombreImagenDos, $nombreImagenTres, $nombreImagenCuatro);
            }

            if (empty($errores)) {

                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                };
                
                // Almacenar la imagen 
                if ($_FILES['articulo']['tmp_name']['imagen'] && $_FILES['articulo']['tmp_name']['imagen_dos'] && $_FILES['articulo']['tmp_name']['imagen_tres'] && $_FILES['articulo']['tmp_name']['imagen_cuatro'] ) {
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                    $imageDos->save(CARPETA_IMAGENES . $nombreImagenDos);
                    $imageTres->save(CARPETA_IMAGENES . $nombreImagenTres);
                    $imageCuatro->save(CARPETA_IMAGENES . $nombreImagenCuatro);
                }

                $articulo->guardar();

                // debuguear($resultado);

                // la redireccion estara directamente en el metodo de actualizar
            }
        }

        $router->render('product/actualizar', [
            'articulo' => $articulo,
            'colores' => $colores ,
            'tallas' => $tallas ,
            'tipos' => $tipos,
            'errores' => $errores
        ]);

    }

    public static function eliminar( Router $router ) {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            
            $id = filter_var($id, FILTER_VALIDATE_INT);
        
            if ($id) {

                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    $articulo = Articulo::find($id);
        
                    $articulo->eliminar();
                }
        
               
            }
        }
        

    }

}