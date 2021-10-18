<?php

use App\Articulo;


require 'includes/app.php';

if (isset($_SESSION['login'])) {
    $auth = estaAutenticado();
}

if (!isset($_SESSION)) {
    session_start();
}

$articulos = Articulo::all();

$gorras = Articulo::findType(1);
$tenis = Articulo::findType(2);
$playeras = Articulo::findType(3);
$pantalones = Articulo::findType(4);
$accesorios = Articulo::findType(5);


incluirTemplate('header');
?>
<main class="producto__index productos_index">
    <section>
        <div class="home__container">
            <div class="product__home">
                <h1 class="home__title"> Productos </h1>
                <form class="form__buscar" method="GET">
                    <input class="buscador" type="text" name="buscar" placeholder="busqueda">
                    <input class="button boton__buscar" type="submit" name="buscador" value="Buscar">
                </form>


            </div>
        </div>
    </section>

    <section class="product total__grid">
        <div class="product__list">
            <nav class="product__div product__grid">
                <bottom class="product__item">
                    <a id="#gorras" data-paso="1" class="nav__link" class="article__one">
                        Gorras
                    </a>
                </bottom>

                <bottom class="product__item">
                    <a id="#tenis" data-paso="2" class="nav__link" class="article__two">
                        Tenis
                    </a>
                </bottom>

                <bottom class="product__item">
                    <a id="#camizas" data-paso="3" class="nav__link" class="article__three">
                        Playeras
                    </a>
                </bottom>

                <bottom class="product__item">
                    <a id="#pantalones" data-paso="4" class="nav__link" class="article__four">
                        Pantalones
                    </a>
                </bottom>

                <bottom class="product__item">
                    <a id="#pantalones" data-paso="5" class="nav__link" class="article__four">
                        Accesorios
                    </a>
                </bottom>
            </nav>

        </div>

        <!-- Gorras -->
        <div class="seccion_ocultar" id="paso-1">
            <div class="accessory__form">
                <form action="" method="GET">
                    <h3>Filtrar Por</h3>
                </form>
            </div>

            <div class="accessory__container accessory__items__grid">

                <!-- Aqui ira el Foreach -->
                <?php
                $tipo = tipoActual($gorras);
                include './includes/layout/articulosTipos.php'; 
                ?>
                


            </div>
        </div><!-- Fin -->

        <!-- Tenis -->
        <div class="accessory seccion_ocultar" id="paso-2">
            <div class="accessory__form">
                <form action="" method="GET">
                    <h3>Filtrar Por</h3>

                </form>
            </div>

            <div class="accessory__container accessory__items__grid">

                <?php 
                $tipo = tipoActual($tenis);
                include './includes/layout/articulosTipos.php'; 
                ?>
                

            </div>
        </div><!-- Fin -->

        <!-- Playeras -->
        <div class="accessory seccion_ocultar" id="paso-3">
            <div class="accessory__form">
                <form action="" method="GET">
                    <h3>Filtrar Por</h3>

                </form>
            </div>

            <div class="accessory__container accessory__items__grid">

                <?php 
                $tipo = tipoActual($playeras);
                include './includes/layout/articulosTipos.php'; 
                ?>

            </div>
        </div> <!-- Fin -->

        <!-- Pantalones -->
        <div class="accessory seccion_ocultar" id="paso-4">
            <div class="accessory__form">
                <form action="" method="GET">
                    <h3>Filtrar Por</h3>

                </form>
            </div>

            <div class="accessory__container accessory__items__grid">

                <?php 
                $tipo = tipoActual($pantalones);
                include './includes/layout/articulosTipos.php'; 
                ?>

            </div>
        </div>

        <!-- Pantalones -->
        <div class="accessory seccion_ocultar" id="paso-5">
            <div class="accessory__form">
                <form action="" method="GET">
                    <h3>Filtrar Por</h3>

                </form>
            </div>

            <div class="accessory__container accessory__items__grid">

                <?php 
                $tipo = tipoActual($accesorios);
                include './includes/layout/articulosTipos.php'; 
                ?>

            </div>
        </div>

    </section>
</main>


<?php incluirTemplate('footer'); ?>