<?php

require 'includes/app.php';

if (isset($_SESSION['login'])) {
    $auth = estaAutenticado();
}

if (!isset($_SESSION)) {
    session_start();
}

incluirTemplate('header');
?>

<main class="producto__index productos_index">
    <section>
        <div class="home__container">
            <div class="product__home">
                <h1 class="home__title"> Carrito </h1>
            </div>
        </div>
    </section>


    <section class="seccion__carrito">
        <div class="contenido__carrito">
            <h3>Contenido</h3>
            <!-- Contenido -->
            <div class="caja__carrito">
                <p>Productos</p>

                <table>
                    <thead class="thead__carrito">
                        <th>Cantidad</th>
                        <th>Imagen</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>

                        <td>
                            <select name="carrito[cantidad]" id="cantidad">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3" selected>3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </td>
                        <td>
                            <img class="imagen-tabla" src="imagenes/4d68706d39f7437e7cfd17667c23bd06.jpeg" alt="imagen de la tabla">
                        </td>
                        <td>Gorra Adidas Black</td>
                        <td>$470</td>
                        <td>
                        <button>
                        Actualizar Compra
                        </button>
                        </td>

                    </tbody>
                </table>
            </div>
        
        </div>
        <div class="cobro__carrito">
            <h3>Paguar</h3>
            <div class="arreglo__pagar">
                <p>Cuenta Total</p>

                
            </div>
        </div>
    </section>

</main>


<?php incluirTemplate('footer'); ?>