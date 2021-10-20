<fieldset>
    <legend>Informacion General</legend>

    <?php if (isset($errores['tipo'])) { ?>
        <div class="alerta">
            <i class='bx bx-error-circle'></i>
            <div class="texto">
                <?php echo $errores['tipo']; ?>
            </div>
        </div>
    <?php }; ?>

    <!-- TIPO -->
    <label for="tipo">Tipo: </label>
    <select name="articulo[tipo_id]">
        <option value="">-- Seleccione --</option>

        <?php foreach ($tipos as $tipo) { ?>
            <!-- Inicia el bucle -->

            <option <?php echo s($articulo->tipo_id) === s($tipo->id) ? 'selected' : ''; ?> value="<?php echo s($tipo->id); ?>">

            <?php echo s($tipo->tipos); ?> </option>

        <?php }; ?>
        <!-- Fin del bucle -->

    </select>

    <!-- Marca-->

    <?php if (isset($errores['marca'])) { ?>
        <div class="alerta">
            <i class='bx bx-error-circle'></i>
            <div class="texto">
                <?php echo $errores['marca']; ?>
            </div>
        </div>
    <?php }; ?>

    <label for="marca">Marca: </label>
    <input type="text" id="marca" name="articulo[marca]" placeholder="Marca" value="<?php echo s($articulo->marca) ?>">

    <!-- Descripcion -->

    <?php if (isset($errores['descripcion'])) { ?>
        <div class="alerta">
            <i class='bx bx-error-circle'></i>
            <div class="texto">
                <?php echo $errores['descripcion']; ?>
            </div>
        </div>
    <?php }; ?>

    <label for="descripcion">Descripcion: </label>
    <input type="text" id="descripcion" name="articulo[descripcion]" placeholder="descripcion" value="<?php echo s($articulo->descripcion) ?>">

    <!-- Precio -->

    <?php if (isset($errores['precio'])) { ?>
        <div class="alerta">
            <i class='bx bx-error-circle'></i>
            <div class="texto">
                <?php echo $errores['precio']; ?>
            </div>
        </div>
    <?php }; ?>

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="articulo[precio]" placeholder="Precio Producto" value="<?php echo s($articulo->precio) ?>">

    <!-- Imagen -->

    <?php if (isset($errores['imagen'])) { ?>
        <div class="alerta">
            <i class='bx bx-error-circle'></i>
            <div class="texto">
                <?php echo $errores['imagen']; ?>
            </div>
        </div>
    <?php }; ?>

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" name="articulo[imagen]" accept="image/jpeg, image/png" value="<?php echo $articulo->imagen; ?>">
    <?php if ($articulo->imagen) { ?>
        <img src="/imagenes/<?php echo $articulo->imagen ?>" class="imagen-small">
    <?php } ?>

    <!-- Imagen Dos -->

    <label for="imagen_dos">Imagen Dos:</label>
    <input type="file" id="imagen_dos" name="articulo[imagen_dos]" accept="image/jpeg, image/png" value="<?php echo $articulo->imagen_dos; ?>">
    <?php if ($articulo->imagen_dos) { ?>
        <img src="/imagenes/<?php echo $articulo->imagen_dos ?>" class="imagen-small">
    <?php } ?>

    <!-- Imagen Tres -->

    <label for="imagen_tres">Imagen Tres:</label>
    <input type="file" id="imagen_tres" name="articulo[imagen_tres]" accept="image/jpeg, image/png" value="<?php echo $articulo->imagen_tres; ?>">
    <?php if ($articulo->imagen_tres) { ?>
        <img src="/imagenes/<?php echo $articulo->imagen_tres ?>" class="imagen-small">
    <?php } ?>

    <!-- Imagen Cuatro -->

    <label for="imagen_cuatro">Imagen Cuatro:</label>
    <input type="file" id="imagen_cuatro" name="articulo[imagen_cuatro]" accept="image/jpeg, image/png" value="<?php echo $articulo->imagen_cuatro; ?>">
    <?php if ($articulo->imagen_cuatro) { ?>
        <img src="/imagenes/<?php echo $articulo->imagen_cuatro ?>" class="imagen-small">
    <?php } ?>

    <!-- Modelo -->

    <label for="modelo">Modelo: </label>
    <input type="text" id="modelo" name="articulo[modelo]" placeholder="Modelo" value="<?php echo s($articulo->modelo) ?>">

    <!-- Codigo -->

    <label for="codigo">Codigo Barras:</label>
    <input type="number" id="codigo" name="articulo[codigo]" placeholder="Codigo Barras" value="<?php echo s($articulo->codigo) ?>">

    <label for="stock">Stock Disponible:</label>
    <input type="number" id="stock" name="articulo[stock]" placeholder="Stock" value="<?php echo s($articulo->stock) ?>">

</fieldset>

<fieldset>
    <legend>Medidas y Colores</legend>

    
        <!-- COLOR -->

        <?php if (isset($errores['color'])) { ?>
            <div class="alerta">
                <i class='bx bx-error-circle'></i>
                <div class="texto">
                    <?php echo $errores['color']; ?>
                </div>
            </div>
        <?php }; ?>

        <label for="color">Color: </label>
        <select name="articulo[color_id]">
            <option value="">-- Seleccione --</option>

            <?php foreach ($colores as $color) { ?>
                <!-- Inicia el bucle -->

                <option <?php echo s($articulo->color_id) === s($color->id) ? 'selected' : ''; ?> value="<?php echo s($color->id); ?>">

                    <?php echo s($color->colores); ?> </option>

            <?php }; ?>
            <!-- Fin del bucle -->

        </select>

        <!-- Tallas -->

        <?php if (isset($errores['talla'])) { ?>
            <div class="alerta">
                <i class='bx bx-error-circle'></i>
                <div class="texto">
                    <?php echo $errores['talla']; ?>
                </div>
            </div>
        <?php }; ?>

        <label for="talla">Tipo: </label>
        <select name="articulo[talla_id]">
            <option value="">-- Seleccione --</option>

            <?php foreach ($tallas as $talla) { ?>
                <!-- Inicia el bucle -->

                <option <?php echo s($articulo->talla_id) === s($talla->id) ? 'selected' : ''; ?> value="<?php echo s($talla->id); ?>">

                    <?php echo s($talla->talla); ?> </option>

            <?php }; ?>
            <!-- Fin del bucle -->

        </select>

    
</fieldset>