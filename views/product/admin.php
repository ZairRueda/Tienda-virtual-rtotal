<main>

    <section class="section bd-container">

        <h1>Administrador de Productos</h1>

        <?php if (intval($resultado) === 1) { ?>
            <div class='alerta'>
                <p class="exito texto">Creado Correctamente</p>
            </div>
        <?php } elseif (intval($resultado) === 2) { ?>
            <div class='alerta'>
                <p class="exito texto">Actualizado Correctamente</p>
            </div>
        <?php } elseif (intval($resultado) === 3) { ?>
            <div class='alerta'>
                <p class="error texto">Se Borro Correctamente</p>
            </div>
        <?php } ?>

        <a href="/admin/productos/crear" class="button"> Nuevo Producto </a>

    </section>

</main>

<table class="bd-container propiedades">

    
    <!-- Foreach es especial para iterar sobre arreglos -->
    <?php
    // $colores = Color::find($articulos->color_id);
    // $tallas = Talla::find();
    // $tipos = Tipo::find();
    
    foreach ($articulos as $articulo) : ?>
        
            <thead>
                <tr>

                    <th>ID</th>
                    <th>Marca</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Color</th>
                    <th>Talla</th>
                    <th>Tipo</th>
                    <!-- <th>Imagen</th>
                <th>Imagen 2</th>
                <th>Imagen 3</th>
                <th>Codigo</th>
                <th>Modelo</th>
                <th>Accion</th> -->

                </tr>

            </thead>

            <tbody>
                <?php
                $colores = Color::find($articulo->color_id);

                $tallas = Talla::find($articulo->talla_id);

                $tipos = Tipo::find($articulo->tipo_id);
                ?>
                <tr>
                    <td><?php echo $articulo->id; ?></td>
                    <td><?php echo $articulo->marca; ?></td>
                    <td><?php echo $articulo->descripcion; ?></td>
                    <td>$ <?php echo $articulo->precio; ?></td>
                    <td><?php
                        echo $colores->colores;

                        ?></td>
                    <td><?php
                        echo $tallas->talla;

                        ?></td>
                    <td><?php
                        echo $tipos->tipos;

                        ?>
                    </td>

                </tr>
            </tbody>

            <thead>
                <tr>

                    <th>Imagen</th>
                    <th>Imagen 2</th>
                    <th>Imagen 3</th>
                    <th>Imagen 4</th>
                    <th>Codigo</th>
                    <th>Modelo</th>
                    <th>Accion</th>

                </tr>

            </thead>

            <tbody>

                <tr>
                    <td><img class="imagen-tabla" src="/imagenes/<?php echo $articulo->imagen; ?>"></td>
                    <td><img class="imagen-tabla" src="/imagenes/<?php echo $articulo->imagen_dos; ?>"></td>
                    <td><img class="imagen-tabla" src="/imagenes/<?php echo $articulo->imagen_tres; ?>"></td>
                    <td><img class="imagen-tabla" src="/imagenes/<?php echo $articulo->imagen_cuatro; ?>"></td>

                    <td><?php echo $articulo->codigo; ?></td>
                    <td><?php echo $articulo->modelo; ?></td>

                    <td>
                        <form method="POST" action="/product/eliminar" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $articulo->id; ?>">
                            <input type="hidden" name="tipo" value="product">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <!-- Pasaremos el Id para que el get toma el Id de la propiedad -->
                        <a href="/admin/productos/actualizar?id=<?php echo $articulo->id; ?>" class="boton-amarillo-block actualizar">Actualizar</a>
                    </td>
                </tr>

            </tbody>

        
    <?php endforeach; ?>
</table>