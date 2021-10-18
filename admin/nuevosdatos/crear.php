<section class="section bd-container">

        <form class="formulario" method="POST" action="/admin/productos/crear.php">
            <fieldset>
                <legend>Agregar Atributos</legend>

                <label for="tipos">Nuevo Tipo De Producto:
                    <input type="text" id="tipos" name="tipos" placeholder="Tipos" value="">
                </label>

                <label for="colores">Nuevo Color:
                    <input type="text" id="colores" name="colores" placeholder="Colores" value="">
                </label>

                <label for="tallas">Nueva Talla:
                    <input type="text" id="tallas" name="tallas" placeholder="Tallas" value="">
                </label>

            </fieldset>

            <input type="submit" value="Integrar Atributo" class="button botton__form">

        </form>

    </section>