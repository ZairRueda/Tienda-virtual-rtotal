<?php

require '../../includes/app.php';

use App\Articulo;
use App\Color;
use App\Talla;
use App\Tipo;

use Intervention\Image\ImageManagerStatic as Image;

estaAutenticado();

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

incluirTemplate('header');

?>

<main>
    <section class="section bd-container">

        <h1 class="form__titulo">Crear</h1>

        <a href="/admin" class="button"> Volver </a>


        <form class="formulario" method="POST" action="/admin/productos/crear.php" enctype="multipart/form-data">

            <?php include '../../includes/layout/formulario_articulos.php'; ?>

            <input type="submit" value="Crear Producto" class="button botton__form">

        </form>

    </section>

    



</main>

<?php incluirTemplate('footer') ?>