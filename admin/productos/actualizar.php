<?php

// Este call se realizara automaticamente si tenemos intalado PHP namespase resolver
use App\Articulo;
use App\Color;
use App\Talla;
use App\Tipo;

use Intervention\Image\ImageManagerStatic as Image;

require '../../includes/app.php';

estaAutenticado();

$id = $_GET['id'];

$id = filter_var($id, FILTER_VALIDATE_INT);

$articulo = Articulo::find($id);

$colores = Color::all();
$tallas = Talla::all();
$tipos = Tipo::all();

$consulta = "SELECT * FROM vendedores";

$resultado = mysqli_query($db, $consulta);

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

incluirTemplate('header');

?>

<main>
    <section class="section bd-container">

        <h1>Actualizar</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <form class="formulario" method="POST" enctype="multipart/form-data">

            <?php
            include '../../includes/layout/formulario_articulos.php'; 
            ?>

            <input type="submit" value="Actualizar Articulo" class="boton boton-verde">

        </form>

    </section>
</main>

<?php incluirTemplate('footer') ?>